<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\GunungModel;
use App\Models\JalurGunungModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class GunungController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {


        $key    = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');

        if (!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];
        try {

            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $model = new GunungModel();
            $data = $model->findAll();
            return $this->respond($data, 200);;
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
    }

    public function add()
    {
        // echo WRITEPATH;
        // die();
        // dd($this->request->getPost());
        helper(['auth']);
        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            if(getAuth()->role->id_role == 3) return $this->fail("Anda bukan admin atau pengelola gunung");
            $file = $this->request->getFile('gambar-gunung');
            $gambar_gunung = $file->getName();
            if(!$file->isValid()) return $this->fail("File tidak valid");
            $temp = explode(".",$gambar_gunung);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if ($file->move(FCPATH . "/images/gunung/", $newfilename)) {
                $model = new GunungModel();
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'url_gunung' => $newfilename,
                    'book_available' => $this->request->getPost('book_available'),
                    'harga_masuk' => $this->request->getPost('harga_masuk'),
                    'id_users' => getAuth()->id
                ];
                $model->insert($data);
            }
            //$data = json_decode(file_get_contents("php://input"));
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Saved'
                ]
            ];

            return $this->respond($response);
        } catch (\Throwable $th) {
            // exit($th->getMessage());
            return $this->fail('Gagal Menambahkan data gunung : ' . $th->getMessage());
        }
    }
    
    public function create()
    {
        helper(['auth']);
        return view('gunung/addgunung');
    }

    public function jalurgunung()
    {
        $key    = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');

        if (!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];
        try {

            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $model = new JalurGunungModel();
            $data = $model->findAll();
            return $this->respond($data, 200);;
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
    }
    public function list_antrian($id) {
        helper(['auth']);
        // return dd(getAuth());
        $db = \Config\Database::connect();
        if (getAuth()->role->id_role == 2) {
            $gunungCheck = $db->table("gunung")->where("id_users", getAuth()->id)->where("id_gunung", $id)->get()->getResultObject();
            if (sizeof($gunungCheck) == 0) {
                return redirect()->to(url_to("dashboard"));
            }
        }
        $builder = $db->table('booking');
        $builder->select("gunung.nama as nama_gunung, payment_history.*, gunung.id_gunung, gunung.nama as nama_gunung, users.nama_users");
        $builder->join("payment_history", "payment_history.id_booking = booking.id_booking");
        $builder->join("jalur", "booking.id_jalur = jalur.id_jalur");
        $builder->join("gunung", "gunung.id_gunung = jalur.id_gunung");
        $builder->join("users", "users.id_users = booking.id_users");
        // $builder->where("users.id_users", getAuth()->id);
        $builder->where("gunung.id_gunung", $id);
        // return dd($builder->get()->getResultObject());
        return view("gunung/list_antrian", ['antrians' => $builder->get()->getResultObject()]);
    }
    public function approve_antrian($id_gunung, $id_booking) {
        helper(['auth']);
        // return dd(getAuth());
        $db = \Config\Database::connect();
        if (getAuth()->role->id_role == 2) {
            $gunungCheck = $db->table("gunung")->where("id_users", getAuth()->id)->where("id_gunung", $id_gunung)->get()->getResultObject();
            if (sizeof($gunungCheck) == 0) {
                return redirect()->to(url_to("dashboard"));
            }
        }
        $booking = $db->table("payment_history");
        // $booking->join("payment_history", "payment_history.id_booking = booking.id_booking");
        $booking->where("payment_history.id_booking", $id_booking);
        // $booking->set("status", "In Progress");
        // dd($booking->get()->getResultObject());
        $data = [
            "status" => "In Progress"
        ];
        if ($booking->update($data)) {
            return redirect()->to(url_to("gunung.list_antrian", $id_gunung))->with("messages", ['status' => true, 'message' => "Konfirmasi booking berhasil!"]);
        } else {
            return redirect()->to(url_to("gunung.list_antrian", $id_gunung))->with("messages", ['status' => false, 'message' => "Konfirmasi booking gagal!"]);

        }
    }
    public function selesai_antrian($id_gunung, $id_booking) {
        $db = \Config\Database::connect();
        $booking = $db->table("booking");
        $booking->select("booking.*, gunung.*");
        $booking->join("jalur", "booking.id_jalur = jalur.id_jalur");
        $booking->join("gunung", "jalur.id_gunung = gunung.id_gunung");
        $booking->where("booking.id_booking", $id_booking);
        $booking->where("gunung.id_gunung", $id_gunung);
        $booking->where("gunung.id_users", getAuth()->id);
        // dd($booking->get()->getFirstRow());
        $result = $booking->get()->getFirstRow();
        $payment = $db->table("payment_history");
        $payment->where("id_booking", $result->id_booking);
        // dd($result);
        if (isset($result)) {
            if ($payment->get()->getFirstRow()->status == "In Progress") {
                $payment->set("status", "Complete");
                if ($payment->update()) {
                    return redirect()->to(url_to("gunung.list_antrian", $id_gunung))->with("messages", ['status' => true, 'message' => "Menyelesai booking berhasil!"]);
                } else {
                    return redirect()->to(url_to("gunung.list_antrian", $id_gunung))->with("messages", ['status' => false, 'message' => "Menyelesai booking gagal!"]);
                }
            } else {
                return redirect()->to(url_to("gunung.list_antrian", $id_gunung));
            }
        } else {
            return redirect()->to(url_to("gunung.list_antrian", $id_gunung));
        }
    }
}

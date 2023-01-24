<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\GunungModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class DashboardController extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('auth');
        if (isLogged()) {
            if (getAuth()->subs == null) {
                redirect()->to(url_to('subscription.index'));
            }
        }
    }
    public function index()
    {
        if (isLogged()) {
            if (getAuth()->subs == null) {
                return redirect()->to(url_to('subscription.index'));
            }
        }
        helper(['auth']);

        // dd(isLogged());
        return view('dashboard/index');
    }
    public function signup()
    {
        helper(['auth']);
        if (isLogged()) return redirect()->route('dashboard');
        return view('dashboard/signup');
    }
    public function signin()
    {
        helper(['auth']);
        if (isLogged()) return redirect()->route('dashboard');
        return view('dashboard/signin');
    }
    public function detailgunung($id)
    {
        helper(['auth']);
        $db = \Config\Database::connect();
        $gunung = (new GunungModel())->find($id);
        $check = $db->table('booking');
        $check->where('id_users', getAuth()->id);
        $isOngoing = false;
        $payment_history = $db->table("payment_history");
        $data_payment = $db->
        table("payment_history")->
        join("booking", "booking.id_booking = payment_history.id_booking")->
        join("users", "users.id_users = booking.id_users")->
        where("users.id_users", getAuth()->id)->
        where("status !=", "Complete")->
        get()->getResultObject();
        // dd($data_payment);
        $singduwegunung = false;
        if (getAuth()->role->id_role == 2) {
            $gunungCheck = $db->table("gunung")->where("id_users", getAuth()->id)->where("id_gunung", $id)->get()->getResultObject();
            if (sizeof($gunungCheck) > 0) {
                $singduwegunung = true;
            }
        }
        // dd($data_payment);

        if (sizeof($data_payment) > 0) $isOngoing = true;
        // dd($gunung);
        // dd(isLogged());
        return view('gunung/index', ['gunung' => $gunung, 'isOngoing' => $isOngoing, 'singduwegunung' => $singduwegunung]);
    }
    public function sop($id = false)
    {
        helper(['auth']);
        if (isLogged()) {
            if (getAuth()->subs == null) {
                return redirect()->to(url_to('subscription.index'));
            }
        }
        // dd(isLogged());
        $isGunung = false;
        if ($id > 0) {
            $isGunung = true;
        } else {
            $isGunung = false;
        }
        return view('dashboard/sop', ["isGunung" => $isGunung]);
    }
    public function logout()
    {
        helper('cookie');
        delete_cookie('jwt');

        // dd(isLogged());
        return redirect()->to('/')->withCookies();
    }
    public function entry($id)
    {
        helper(['auth']);
        // dd($id);
        return view('dashboard/entry', ['id' => $id]);
    }
    public function addgunung()
    {
        helper(['auth']);
        if (isLogged()) {
            if (getAuth()->subs == null) {
                return redirect()->to(url_to('subscription.index'));
            }
        }
        return view('gunung/addgunung');
    }
    public function history()
    {
        helper(['auth']);
        if (isLogged()) {
            if (getAuth()->subs == null) {
                return redirect()->to(url_to('subscription.index'));
            }
        }
        $db = \Config\Database::connect();
        $builder = $db->table('payment_history');
        $builder->select('payment_history.*, booking.*, gunung.nama as nama_gunung');
        $builder->where('booking.id_users', getAuth()->id);
        $builder->join('booking', 'payment_history.id_booking = booking.id_booking');
        $builder->join('gunung', 'gunung.id_gunung = booking.id_gunung');

        $data = $builder->get()->getResultObject();
        // dd($data);
        return view('history/index', ['payments' => $data]);
    }

    public function detail_history($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $tim = null;
        $anggota = array();
        $leader = null;
        $payment = null;
        $gunung = null;
        $result = $builder->where("id_booking", $id)->where("id_users", getAuth()->id)->get()->getFirstRow();
        if (sizeof($builder->where("id_booking", $id)->get()->getResultObject()) == 0) {
            // dd($result);
            if ($result == null) {
                return redirect()->to(url_to("dashboard"));
            }
        }
        if ($result->id_jalur != null) {
            $gunung = $db->table("jalur")->select("gunung.*, jalur.nama as nama_jalur")->join("gunung", "jalur.id_gunung = gunung.id_gunung")->where("jalur.id_jalur", $result->id_jalur)->get()->getFirstRow();
        }
        if ($result->id_tim != null) {
            $tim = $db->table("tim")->where("id_tim", $result->id_tim)->get()->getFirstRow();
            if($tim->id_pemimpin != null) {
                $leader = $db->table("pemimpin_tim")->where("id_pemimpin", $tim->id_pemimpin)->get()->getFirstRow();
            }
            $anggota = $db->table("anggota")->where("id_tim", $result->id_tim)->get()->getResultObject();
            $payment = $db->table("payment_history")->where("id_booking", $result->id_booking)->get()->getFirstRow();
        }
        
        // $builder->join('jalur', 'booking.id_jalur = jalur.id_jalur');
        // $builder->join('gunung', 'gunung.id_gunung = jalur.id_gunung');
        // $builder->select('payment_history.*, booking.*, jalur.nama, gunung.*');
        // $builder->join('tim', "booking.id_tim = tim.id_tim");
        // $builder->join('payment_history', 'payment_history.id_booking = booking.id_booking');
        // $builder->where('no_payment', $id);
        // if ($builder->get()->getFirstRow()->id_tim != null) {

        // }
        $data = $builder->get()->getResultObject();
        // dd($data[0], $tim, $anggota, $leader, $payment, $gunung);
        // helper(['auth']);
        return view('history/detail', ['data' => $data[0], "tim" => $tim, "anggotas" => $anggota, 'leader' => $leader, "payment" => $payment, "gunung" => $gunung]);
    }
    public function pricingplan()
    {
        helper(['auth']);
        return view("dashboard/pricingplan");
    }
    public function booknow($idgunung)
    {
        helper(['auth']);
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $data = [
            'tanggal_booking' => date('Y-m-d'),
            'id_users' => getAuth()->id,
            'id_gunung' => $idgunung
        ];
        $insert = $builder->insert($data);
        $id_booking = $db->insertID();
        $builder_payment = $db->table('payment_history');
        $data_payment = [
            'date' => date('Y-m-d'),
            'status' => 'Menunggu Entry',
            'id_booking' => $id_booking
        ];
        $insert_payment = $builder_payment->insert($data_payment);
        $response = [];
        if ($insert && $insert_payment) {
            $response = [
                'status'   => 201,
                'error'    => false,
                'url_redirect' => url_to("entry", $id_booking),
                'messages' => [
                    'success' => 'Data Saved'
                ]
            ];
        } else {
            $response = [
                'status'   => 500,
                'error'    => true,
                'messages' => [
                    'error' => 'Data Failed to saved'
                ]
            ];
        }
        return $this->respondCreated($response, $insert ? 201 : 500);
    }
    public function jalurgunung($idbooking)
    {
        helper(['auth']);
        $db = \Config\Database::connect();
        $booking = $db->table("booking")->where("id_booking", $idbooking)->where("id_users", getAuth()->id)->get()->getFirstRow();
        $builder = $db->table('jalur');
        $data = $builder->select('jalur.*')->join('gunung', 'jalur.id_gunung = gunung.id_gunung')->where('jalur.id_gunung', $booking->id_gunung)->get()->getResultObject();

        $response = [
            'status'   => 200,
            'error'    => false,
            'data'     => $data
        ];
        return $this->respondCreated($response, 200);
    }
    public function entry_schedule($id_booking)
    {

        helper(['auth']);
        try {

            $model = new BookingModel();
            $data = [
                'id_users' => getAuth()->id,
                'id_jalur' => $this->request->getPost('jalur'),
                'tanggal_naik' => $this->request->getPost('tanggal_naik'),
                'tanggal_turun' => $this->request->getPost('tanggal_turun'),
                'tanggal_booking' => date('Y-m-d')
            ];
            $db = \Config\Database::connect();
            $builder = $db->table('booking');
            $booking = $builder->where('id_users', getAuth()->id)->where("id_booking", $id_booking);
            // return $this->respondCreated($booking, 200);
            // return $this->respondCreated();
            $update = "";
            $idbooking = 0;
            if ($booking->countAll() > 0) {
                // $idbooking = $booking->get()->getFirstRow()->id_booking;
                $update = $builder->where('id_booking', $id_booking)->set('id_jalur', $this->request->getPost('jalur'))->set('tanggal_naik', $this->request->getPost('tanggal_naik'))->set('tanggal_turun', $this->request->getPost('tanggal_turun'))->update();
            }
            //$data = json_decode(file_get_contents("php://input"));
            //$data = $this->request->getPost();
            // var_dump($idbooking);
            // return $this->respondCreated($update, 200);
            // die();
            $response = [];
            if ($update == true) {
                $response = [
                    'status'   => 201,
                    'error'    => false,
                    'messages' => 'Data Schedule Updated'
                ];
            } else {
                $response = [
                    'status'   => 500,
                    'error'    => true,
                    'messages' => 'Data Not Updated'
                ];
            }
            return $this->respondCreated($response, 201);
        } catch (\Throwable $th) {
            return $this->respondCreated($th->getMessage(), 500);
        }
    }
    public function entry_schedule_get($id_booking)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $builder->select("booking.*")->join("payment_history", "payment_history.id_booking = booking.id_booking")->where('booking.id_users', getAuth()->id)->where("id_booking", $id_booking);
        // dd($builder->get()->getResultObject());
        $response = [];
        if ($builder->select("booking.*")->join("payment_history", "payment_history.id_booking = booking.id_booking")->where('booking.id_users', getAuth()->id)->where("id_booking", $id_booking)->countAll() > 0) {
            $data = $builder->select("booking.*")->join("payment_history", "payment_history.id_booking = booking.id_booking")->where('booking.id_users', getAuth()->id)->where("booking.id_booking", $id_booking)->get()->getResultObject();
            $response = [
                'status'   => 200,
                'error'    => false,
                'data'     => $data
            ];
        } else {
            $response = [
                'status'   => 404,
                'error'    => true,
                'messages' => 'Data Not Found'
            ];
        }
        return $this->respondCreated($response, $response['status']);
    }
    public function entry_leader($id_booking)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $booking = $builder->where('id_users', getAuth()->id)->where("id_booking", $id_booking);
        if ($booking->countAll() > 0) {
            $leader_data = [
                'nama_pemimpin_tim'     => $this->request->getPost('nama_pemimpin'),
                'no_identitas'          => $this->request->getPost('no_identitas'),
                'no_hp_pemimpin'        => $this->request->getPost('no_hp_pemimpin'),
                'jk'                    => $this->request->getPost('jenis_kelamin'),
                'tempat_lahir'          => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'         => $this->request->getPost('tanggal_lahir'),
                'desa_kelurahan'        => $this->request->getPost('desa_kelurahan'),
                'kecamatan'             => $this->request->getPost('kecamatan'),
                'kota'                  => $this->request->getPost('kota'),
                'provinsi'              => $this->request->getPost('provinsi'),
                'alamat_lengkap'        => $this->request->getPost('alamat_lengkap'),
            ];
            $data = $id_booking;
            $team_builder = $db->table('tim');
            $team = null;
            if ($db->table('booking')->where("id_booking", $id_booking)->get()->getFirstRow() != null) {
                $team = $db->table('booking')->where("id_booking", $id_booking)->get()->getFirstRow()->id_tim;
            }
            $teamid = 0;
            $teaminsert = null;
            $response = [];
            // return dd($team);

            if ($team == null) {
                // return dd("asdasdasd");
                $teaminsert = $team_builder->insert(["id_pemimpin" => null]);
                // return dd($teaminsert);
                if ($teaminsert) {
                    $teamid = $db->insertID();
                    // return $this->respondCreated($booking->set('id_tim', $teamid)->getCompiledInsert(), 500);
                    $bookingteaminsert = $booking->set('id_tim', $teamid)->where('id_booking', $id_booking)->update();
                    if ($bookingteaminsert) {
                        $leader_builder = $db->table('pemimpin_tim');
                        $leader_insert = $leader_builder->insert($leader_data);
                        if ($leader_insert) {
                            $leaderid = $db->insertID();
                            // $team_builder->set('id_pemimpin', $leaderid);
                            // $team_builder->where('id_tim', $teamid);
                            $bookingleaderupdate = $db->table("tim")->set('id_pemimpin', $leaderid)->where('id_tim', $teamid)->update();
                            // $teamleaderupdated = $team_builder->update();
                            if ($bookingleaderupdate) {
                                $response = [
                                    'status'   => 200,
                                    'error'    => false,
                                    'message'  => 'Pemimpin tim terupdate!'
                                ];
                            } else {
                                $response = [
                                    'status'   => 200,
                                    'error'    => true,
                                    'message'  => 'Pemimpin tim gagal update'
                                ];
                            }
                        } else {
                            $response = [
                                'status'   => 200,
                                'error'    => true,
                                'message'  => 'Pemimpin tim gagal update'
                            ];
                        }
                    } else {
                        $response = [
                            'status'   => 200,
                            'error'    => true,
                            'message'  => 'Pemimpin tim gagal update'
                        ];
                    }
                } else {
                    $response = [
                        'status'   => 500,
                        'error'    => true,
                        'data'     => $teamid
                    ];
                }
            } else {
                $booktim = $db->table("booking")->where("id_users", getAuth()->id)->where("id_booking", $id_booking)->get()->getFirstRow();
                $data_tim = $team_builder->where('id_tim', $booktim->id_tim);
                $leader_builder = $db->table('pemimpin_tim');
                $result = null;
                if ($data_tim->get()->getResultObject()[0]->id_pemimpin == null) {
                    $leader_insert = $leader_builder->insert($leader_data);
                    $teamrow = $team_builder->where('id_tim', $team)->update(['id_pemimpin' => $db->insertID()]);
                    $result = $teamrow;
                } else {
                    $teamrow = $team_builder->where('id_tim', $team)->select()->get()->getResultObject()[0];
                    $leader_builder->where('id_pemimpin', $teamrow->id_pemimpin);
                    $teamleaderupdated = $leader_builder->update($leader_data);
                    $result = $teamleaderupdated;
                }

                $response = [
                    'status'   => 200,
                    'error'    => $result == false,
                    'message'     => $result ? "Data Leader Updated" : "Data Leader Not Updated" 
                ];
            }

            return $this->respondCreated($response, $response['status']);
        } else {
            $response = [
                'status'   => 400,
                'error'    => true,
                'message'     => "Booking belum dibuat atau booking tidak bisa lebih dari 1"
            ];
            return $this->respondCreated($response, $response['status']);
        }
    }
    public function entry_leader_get($id_booking)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        // $builder->join("payment_history", "payment_history.id_booking = booking.id_booking")->where('id_users', getAuth()->id)->whereNotIn("payment_history.status", "Menunggu Entry");
        $response = [];
        if ($builder->where('id_users', getAuth()->id)->where("booking.id_booking", $id_booking)->countAll() > 0) {
            $builder
            ->join("payment_history", "payment_history.id_booking = booking.id_booking")
            ->join("tim", 'tim.id_tim = booking.id_tim')
            ->join("pemimpin_tim", "pemimpin_tim.id_pemimpin = tim.id_pemimpin")
            ->where('id_users', getAuth()->id)
            ->where("booking.id_booking", $id_booking)
            ->select("pemimpin_tim.*");
            $data = $builder->get()->getRowArray();
            $response = [
                'status'   => 200,
                'error'    => false,
                'data' => $data
            ];
        } else {
            $users = $db->table("users")->where("id_users", getAuth()->id)->get()->getResultObject();
            $user = $users[0];
            if (sizeof($users) > 0) {
                $data = [
                    'alamat_lengkap' => $user->alamat_users,
                    'nama_pemimpin_tim' => $user->nama_users,
                    'no_hp' => $user->no_hp_users,
                    'no_identitas' => $user->no_identitas_users,
                ];
                $response = [
                    'status'   => 200,
                    'error'    => false,
                    'data' => $data
                ];
            } else {
                $response = [
                    'status'   => 404,
                    'error'    => true,
                    'messages' => 'Data Not Found'
                ];
            }
        }
        return $this->respondCreated($response, $response['status']);
        // return $this->respondCreated($response, 200);
    }
    public function entry_member($id_booking)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $status = false;
        $booking = $builder->where('id_users', getAuth()->id)->where("id_booking", $id_booking)->get()->getFirstRow();
        $tableanggota = $db->table('anggota');
        if (sizeof($tableanggota->get()->getResultObject()) > 0) {
            foreach ($tableanggota->get()->getResultObject() as $book) {
                $tableanggota->delete(['id_tim' => $booking->id_tim]);
            }
        }
        $arr_member = json_decode($this->request->getPost('anggota'));
        foreach ($arr_member as $member) {
            $data = [
                'nama_anggota' => $member->nama,
                'no_identitas' => $member->no_identitas,
                'jk' => $member->jenis_kelamin ? "Laki-laki" : "Perempuan",
                'no_hp' => $member->no_hp,
                'id_tim' => $booking->id_tim
            ];
            $status = $tableanggota->insert($data);
        }
        return $this->respondCreated(['status' => $status, 'message' => 'Anggota Berhasil ditambah'], 200);
        // return $this->respondCreated($arr_member, 200);
    }
    public function entry_member_get($id_booking)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $builder->join("payment_history", "payment_history.id_booking = booking.id_booking");
        $booking = $builder->where('id_users', getAuth()->id)->where("booking.id_booking", $id_booking)->get()->getFirstRow();
        $tableanggota = $db->table('anggota');
        $data = [
            'anggota' => $tableanggota->where('id_tim', $booking->id_tim)->get()->getResultObject(),
            'status' => true
        ];
        return $this->respondCreated(['data' => $data], 200);
    }
    public function entry_proses($id_booking)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $booking = $builder->where('id_users', getAuth()->id)->where("id_booking", $id_booking)->get()->getFirstRow();
        $status = true;
        $tablepayment = $db->table('payment_history');
        $timbooking = $builder->select('*')->where('id_users', getAuth()->id)->join('tim', 'booking.id_tim = tim.id_tim');
        $leader = $timbooking->join('pemimpin_tim', 'pemimpin_tim.id_pemimpin = tim.id_pemimpin');
        $member = $db->table('anggota')->select('anggota.*')->join('tim', 'tim.id_tim = anggota.id_tim')->where('tim.id_tim', $booking->id_tim);
        // $member = $builder->select('*')->where('id_users', getAuth()->id)->join('tim', 'booking.id_tim = tim.id_tim');
        // dd([$booking, $timbooking->get()->getResultObject()[0], $leader->get()->getResultObject()[0], $member->get()->getResultObject()]);
        $message = "";
        if ($builder->where('id_users', getAuth()->id)->get() == false) {
            if ($status != false) {
                $status = false;
                $message = "Booking tidak ditemukan";
            }
        }
        if ($timbooking->get() == false) {
            if ($status != false) {
                $status = false;
                $message = "Team tidak ditemukan";
            }
        }
        if ($leader->get() == false) {
            if ($status != false) {
                $status = false;
                $message = "Pemimpin tim tidak ditemukan";
            }
        }
        if ($status) {
            if ($tablepayment->where('id_booking', $booking->id_booking)->update(['status' => 'Menunggu Pembayaran'])) {
            } else {
                $status = false;
                $message = "Database gagal update";
            }
        } else {
        }
        if ($status) {
            return redirect()->to(url_to("history"));
        } else {
            return redirect()->to(url_to('entry', $id_booking))->with("error_message", [$message, $status]);
        }
    }
    public function pay_history($id)
    {
        \Midtrans\Config::$serverKey = "SB-Mid-server-KTnpvcIdaLvQZ5RP15t8KF5j";
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;

        $db = \Config\Database::connect();
        $builder = $db->table('payment_history');
        // $builder->select('payment_history.*');
        $builder->join('booking', 'payment_history.id_booking = booking.id_booking');
        $builder->join('jalur', 'booking.id_jalur = jalur.id_jalur');
        $builder->join('gunung', 'gunung.id_gunung = booking.id_gunung');
        // $builder->join('tim', 'tim.id_tim = booking.id_tim');
        // $builder->join('pemimpin_tim', 'pemimpin_tim.id_pemimpin = tim.id_pemimpin');
        $builder->where('payment_history.no_payment', $id);
        $data = $builder->get()->getFirstRow();
        // dd($data);
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data->harga_masuk,
            ),
            'items_details' => array(
                'id' => $data->id_booking,
                'price' => $data->harga_masuk,
                'quantity' => 1,
                'name' => $data->nama
            )
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($data[0], $params, $snapToken);
        return view("history/snap", ['snapToken' => $snapToken, 'data' => $data, 'id' => $id]);
    }
    public function retrieve_payment($id)
    {
        // return $this->respondCreated($this->request->getJSON());
        $json = $this->request->getJSON();
        $db = \Config\Database::connect();
       
        
            // return $this->respondCreated($middb->get()->getResultObject());
            $builder = $db->table('payment_history');
            $builder->where("payment_history.no_payment", $id);
            $middb = $db->table("mid_tiket");
            // return $this->respondCreated($builder->get()->getFirstRow());
            // $middb->join("booking", "booking.id_booking = mid_tiket.id_booking");
            // $middb->where("booking.id_booking", );
            $middata = [
                "orderid_tiket" => $json->order_id,
                "gross_amount_tiket" => $json->gross_amount,
                "transaction_id_tiket" => $json->transaction_id,
                "id_booking" => $builder->get()->getFirstRow()->id_booking
            ];
            if ($middb->insert($middata)) {
                if ($builder->where("payment_history.no_payment", $id)->update(["status" => 'Menunggu Administrator'])) {
                    // return $this->respondCreated($builder->get()->getResultObject());
                    return url_to("history");
                }
            }            
    }
    public function done_history($id_booking) {
        $db = \Config\Database::connect();
        $booking = $db->table("booking");
        $booking->where("id_booking", $id_booking);
        $booking->where("id_users", getAuth()->id);
        // dd($booking->get()->getFirstRow());
        $result = $booking->get()->getFirstRow();
        $payment = $db->table("payment_history");
        $payment->where("id_booking", $result->id_booking);
        // dd($result);
        if (isset($result)) {
            if ($payment->get()->getFirstRow()->status == "In Progress") {
                $payment->set("status", "Complete");
                if ($payment->where("id_booking", $result->id_booking)->update()) {
                    return redirect()->to(url_to("history"))->with("messages", ['status' => true, 'message' => "Menyelesai booking berhasil!"]);
                } else {
                    return redirect()->to(url_to("history"))->with("messages", ['status' => false, 'message' => "Menyelesai booking gagal!"]);
                }
            } else {
                return redirect()->to(url_to("history"));
            }
        } else {
            return redirect()->to(url_to("history"));
        }
    }
}

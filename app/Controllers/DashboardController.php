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
    }
    public function index()
    {
        if (getAuth()->subs == null) {
            return redirect('subscription.index');
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
        if ($check->countAll() > 0) $isOngoing = true;
        // dd($gunung);
        // dd(isLogged());
        return view('gunung/index', ['gunung' => $gunung, 'isOngoing' => $isOngoing]);
    }
    public function sop($id = false)
    {
        helper(['auth']);
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

        return view('dashboard/entry', ['id' => $id]);
    }
    public function addgunung()
    {
        helper(['auth']);
        return view('gunung/addgunung');
    }
    public function history()
    {
        helper(['auth']);
        $db = \Config\Database::connect();
        $builder = $db->table('payment_history');
        $builder->select('payment_history.*, booking.*, jalur.nama, gunung.*');
        $builder->where('booking.id_users', getAuth()->id);
        $builder->join('booking', 'payment_history.id_booking = booking.id_booking');
        $builder->join('jalur', 'booking.id_jalur = jalur.id_jalur');
        $builder->join('gunung', 'gunung.id_gunung = jalur.id_gunung');
        $data = $builder->get()->getResultObject();
        // dd($data);
        return view('history/index', ['payments' => $data]);
    }

    public function detail_history($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('payment_history');
        $builder->select('payment_history.*, booking.*, jalur.nama, gunung.*');
        $builder->join('booking', 'payment_history.id_booking = booking.id_booking');
        $builder->join('jalur', 'booking.id_jalur = jalur.id_jalur');
        $builder->join('gunung', 'gunung.id_gunung = jalur.id_gunung');
        $builder->where('no_payment', $id);
        $data = $builder->get()->getResultObject();
        // dd($data[0]);
        helper(['auth']);
        return view('history/detail', ['data' => $data[0]]);
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
            'id_users' => getAuth()->id
        ];
        $insert = $builder->insert($data);
        $builder_payment = $db->table('payment_history');
        $data_payment = [
            'date' => date('Y-m-d'),
            'status' => 'In Progress',
            'id_booking' => $db->insertID()
        ];
        $insert_payment = $builder_payment->insert($data_payment);
        $response = [];
        if ($insert && $insert_payment) {
            $response = [
                'status'   => 201,
                'error'    => false,
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
    public function jalurgunung($idgunung)
    {
        helper(['auth']);
        $db = \Config\Database::connect();
        $builder = $db->table('jalur');
        $data = $builder->select('jalur.*')->join('gunung', 'jalur.id_gunung = gunung.id_gunung')->where('jalur.id_gunung', $idgunung)->get()->getResultObject();

        $response = [
            'status'   => 200,
            'error'    => false,
            'data'     => $data
        ];
        return $this->respondCreated($response, 200);
    }
    public function entry_schedule($id)
    {

        helper(['auth']);
        try {

            $model = new BookingModel();
            $data = [
                'id_users' => getAuth()->id,
                'id_jalur' => $this->request->getPost('jalur'),
                'tanggal_naik' => $this->request->getPost('tanggal_naik'),
                'tanggal_turun' => $this->request->getPost('tanggal_turun')
            ];
            $db = \Config\Database::connect();
            $builder = $db->table('booking');
            $booking = $builder->where('id_users', getAuth()->id);
            // return $this->respondCreated($booking, 200);
            // return $this->respondCreated();
            $update = "";
            $idbooking = 0;
            if ($booking->countAll() > 0) {
                $idbooking = $booking->get()->getFirstRow()->id_booking;
                $update = $builder->where('id_booking', $idbooking)->set('id_jalur', $this->request->getPost('jalur'))->set('tanggal_naik', $this->request->getPost('tanggal_naik'))->set('tanggal_turun', $this->request->getPost('tanggal_turun'))->update();
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
                    'error'    => null,
                    'messages' => [
                        'success' => 'Data Updated'
                    ]
                ];
            } else {
                $response = [
                    'status'   => 500,
                    'error'    => true,
                    'messages' => [
                        'success' => 'Data Not Updated'
                    ]
                ];
            }
            return $this->respondCreated($response, 201);
        } catch (\Throwable $th) {
            return $this->respondCreated($th->getMessage(), 500);
        }
    }
    public function entry_schedule_get($idgunung)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $booking = $builder->where('id_users', getAuth()->id);
        $response = [];
        if ($booking->countAll() > 0) {
            $data = $booking->get()->getResultObject();
            $response = [
                'status'   => 200,
                'error'    => false,
                'data'     => $data
            ];
        } else {
            $response = [
                'status'   => 404,
                'error'    => true,
                'messages' => 'Data Not Updated'
            ];
        }
        return $this->respondCreated($response, $response['status']);
    }
    public function entry_leader($idgunung)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $booking = $builder->where('id_users', getAuth()->id);
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
            $data = $booking->get()->getResultObject()[0]->id_booking;
            $team_builder = $db->table('tim');
            $team = $booking->get()->getResultObject()[0]->id_tim;
            $teamid = 0;
            $teaminsert = null;
            $response = [];

            if ($team == null) {
                $teaminsert = $team_builder->set('id_pemimpin', null)->insert();
                if ($teaminsert == true) {
                    $teamid = $db->insertID();
                    // return $this->respondCreated($booking->set('id_tim', $teamid)->getCompiledInsert(), 500);
                    $bookingteaminsert = $booking->set('id_tim', $teamid)->where('id_booking', $data)->update();
                    $leader_builder = $db->table('pemimpin_tim');
                    $leader_insert = $leader_builder->insert($leader_data);
                    if ($leader_insert) {
                        $leaderid = $db->insertID();
                        $team_builder->set('id_pemimpin', $leaderid);
                        $team_builder->where('id_tim', $teamid);
                        $bookingleaderupdate = $booking->set('id_pemimpin', $leaderid)->where('id_booking', $data)->update();
                        $teamleaderupdated = $team_builder->update();
                        if ($teamleaderupdated == true) {
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
                        'status'   => 500,
                        'error'    => true,
                        'data'     => $teamid
                    ];
                }
            } else {
                $data_tim = $team_builder->where('id_tim', $team);

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
                    'error'    => false,
                    'data'     => $result
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
    public function entry_leader_get($idgunung)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $booking = $builder->where('id_users', getAuth()->id);
        $response = [];
        if ($booking->countAll() > 0) {
            $booking->join("tim", 'tim.id_tim = booking.id_tim');
            $booking->join("pemimpin_tim", "pemimpin_tim.id_pemimpin = tim.id_pemimpin");
            $booking->select("pemimpin_tim.*");
            $data = $booking->get()->getRowArray();
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
        return $this->respondCreated($response, $response['status']);
        // return $this->respondCreated($response, 200);
    }
    public function entry_member($id) {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $booking = $builder->where('id_users', getAuth()->id)->get()->getFirstRow();
        $tableanggota = $db->table('anggota');
        if (sizeof($tableanggota->get()->getResultObject()) > 0) {
            foreach($tableanggota->get()->getResultObject() as $book) {
                $tableanggota->delete(['id_tim' => $booking->id_tim]);
            }
        }
        $arr_member = json_decode($this->request->getPost('anggota'));
        foreach($arr_member as $member) {
            $data = [
                'nama_anggota' => $member->nama,
                'no_identitas' => $member->no_identitas,
                'jk' => $member->jenis_kelamin ? "Laki-laki" : "Perempuan",
                'no_hp' => $member->no_hp,
                'id_tim' => $booking->id_tim
            ];
            $tableanggota->insert($data);
        }
        return $this->respondCreated(['status' => true, 'message' => 'Anggota Berhasil ditambah'], 200);
        // return $this->respondCreated($arr_member, 200);
    }
    public function entry_member_get($id) {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $booking = $builder->where('id_users', getAuth()->id)->get()->getFirstRow();
        $tableanggota = $db->table('anggota');
        $data = [
            'anggota' => $tableanggota->where('id_tim', $booking->id_tim)->get()->getResultObject(),
            'status' => true
        ];
        return $this->respondCreated(['data' => $data], 200);
    }
    public function entry_proses($id) {
        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $booking = $builder->where('id_users', getAuth()->id)->get()->getFirstRow();
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
            if ($tablepayment->where('id_booking', $booking->id_booking)->update(['status' =>'Menunggu Pembayaran'])) {

            } else {
                $status = false;
                $message = "Database gagal update";
            }
        } else {

        }
        if($status) {
            return redirect()->to(url_to("history"));
        } else {
            return redirect()->to(url_to('entry', $id))->with("error_message", [$message, $status]);
        }

    }
    public function pay_history($id) {
        \Midtrans\Config::$serverKey = "SB-Mid-server-KTnpvcIdaLvQZ5RP15t8KF5j";
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;

        $db = \Config\Database::connect();
        $builder = $db->table('payment_history');
        $builder->select('payment_history.*, booking.*, jalur.nama, gunung.*, tim.*, pemimpin_tim.*');
        $builder->join('booking', 'payment_history.id_booking = booking.id_booking');
        $builder->join('jalur', 'booking.id_jalur = jalur.id_jalur');
        $builder->join('gunung', 'gunung.id_gunung = jalur.id_gunung');
        $builder->join('tim', 'tim.id_tim = booking.id_tim');
        $builder->join('pemimpin_tim', 'pemimpin_tim.id_pemimpin = tim.id_pemimpin');
        $builder->where('no_payment', $id);
        $data = $builder->get()->getResultObject();
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data[0]->harga_masuk,
            ),
            'items_details' => array(
                'id' => $data[0]->id_booking,
                'price' => $data[0]->harga_masuk,
                'quantity' => 1,
                'name' => $data[0]->nama
            )
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($data[0], $params, $snapToken);
        return view("history/snap", ['snapToken' => $snapToken, 'data' => $data[0]]);

    }
}

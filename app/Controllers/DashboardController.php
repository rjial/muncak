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
        // helper('auth');
    }
    public function index()
    {
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
        return view('history/index');
    }

    public function detail_history()
    {
        helper(['auth']);
        return view('history/detail');
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
        $response = [];
        if ($insert) {
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
            $booking = $builder->where('id_users', getauth()->id);
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
        $booking = $builder->where('id_users', getauth()->id);
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
        $booking = $builder->where('id_users', getauth()->id);
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
                $leader_builder = $db->table('pemimpin_tim');
                $teamrow = $team_builder->where('id_tim', $team)->select()->get()->getResultObject()[0];
                $leader_builder->where('id_pemimpin', $teamrow->id_pemimpin);
                $teamleaderupdated = $leader_builder->update($leader_data);

                $response = [
                    'status'   => 200,
                    'error'    => false,
                    'data'     => $teamleaderupdated
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
        $booking = $builder->where('id_users', getauth()->id);
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
}

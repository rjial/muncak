<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
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
        $gunung = (new GunungModel())->find($id);
        // dd($gunung);
        // dd(isLogged());
        return view('gunung/index', ['gunung' => $gunung]);
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

        return view('dashboard/entry');
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
    public function pricingplan() {
        helper(['auth']);
        return view("dashboard/pricingplan");
    }

    // public function entryschedule($id)
    // {
    
    //     $key    = getenv('TOKEN_SECRET');
    //     $header = $this->request->getServer('HTTP_AUTHORIZATION');

    //     if (!$header) return $this->failUnauthorized('Token Required');
    //     $token = explode(' ', $header)[1];
    //     try {
    //         $model = new GunungModel();
    //         $data = $model->findAll();
    //         return $this->respond($data, 200);;
    //     } catch (\Throwable $th) {
    //         return $this->fail('Invalid Token');
    //     }

    // }

}

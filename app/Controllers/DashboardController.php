<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GunungModel;
use CodeIgniter\Cookie\Cookie as CookieCookie;
use CodeIgniter\Cookie\CookieStore;
use Config\Cookie;

class DashboardController extends BaseController
{
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
    public function sop()
    {
        helper(['auth']);
        // dd(isLogged());
        return view('dashboard/sop');
    }
    public function logout()
    {
        helper('cookie');
        delete_cookie('jwt');

        // dd(isLogged());
        return redirect()->to('/')->withCookies();
    }
    public function entry()
    {
        helper(['auth']);

        return view('dashboard/entry');
    }
}

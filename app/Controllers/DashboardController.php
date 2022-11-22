<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
    public function detailgunung()
    {
        helper(['auth']);
        // dd(isLogged());
        return view('gunung/index');
    }
}

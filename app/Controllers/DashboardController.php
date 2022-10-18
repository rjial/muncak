<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function signup()
    {
        return view('dashboard/signup');
    }
    public function signin() {
        return view('dashboard/signin');
    }
}

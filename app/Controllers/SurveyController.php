<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SurveyController extends BaseController
{
    public function index()
    {
        return view("survey/index");
    }
    public function hasil() {
        return view("survey/hasil");
    }
}

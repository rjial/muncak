<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DebugController extends BaseController
{
    public function index()
    {
        //
    }
    public function bootstrap() {
        if ($_SERVER['CI_ENVIRONMENT'] == "development") {
            echo command('migrate:refresh') . "<br/>";
            echo command('db:seed AllSeeder');
        }
    }
}

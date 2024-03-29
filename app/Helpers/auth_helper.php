<?php

use App\Models\RoleModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use \App\Models\UsersModel;
use \CodeIgniter\HTTP\Response;

function isLogged()
{
    // dd($_COOKIE);
    helper('cookie');
    $cookie = get_cookie('jwt');
    $key    = getenv('TOKEN_SECRET');
    $data   = new stdClass();
    // var_dump($cookie);
    if ($cookie != "") {
        $jwt = $cookie;
        if (checkJWT($jwt) == false) return false;
        $data = checkJWT($cookie);
        // $user = (new UsersModel())->where('id_users', $data->id)->where('email', $data->email)->first();
    } else {
        $request = \Config\Services::request();
        $header = $request->getServer('HTTP_AUTHORIZATION');
        if($header != null) {
            $token = explode(' ', $header)[1];
            $data = checkJWT($token);
        }  
    }
    try {
        $user = (new UsersModel())->where('id_users', $data->id)->where('email', $data->email)->first();
        if ($user == null || $user == 0) return false;
        return true;
    } catch (\Exception $err) {
        return false;
    }
}
function getAuth()
{
    helper('cookie');
    $db = \Config\Database::connect();
    $cookie = get_cookie('jwt');
    if (isLogged() == false) {
        if ($cookie != null) {
            return redirect()->route('logout');
        }
        return false;
    }
    
    $data = new stdClass();
    $key    = getenv('TOKEN_SECRET');
    if ($cookie != "") {
        $jwt = $cookie;
        if (checkJWT($jwt) == false) return false;
        $data = checkJWT($cookie);
    } else {
        $request = \Config\Services::request();
        $header = $request->getServer('HTTP_AUTHORIZATION');
        $token = explode(' ', $header)[1];
        $data = checkJWT($token);
    }
    $user = (new UsersModel())->where('id_users', $data->id)->where('email', $data->email)->first();
    $role = (new RoleModel())->where('id_role', $user['id_role'])->first();
    $subs = $db->table("subscription")->where('id_subs', $user['id_subs'])->get()->getResultObject();
    if (empty($subs) || sizeof($subs) == 0) {
        $subs = null;
    }
    $return = new stdClass();
    // dd($user);
    if ($user != null) {
        $return->id = $user['id_users'];
        $return->username = $user['username'];
        $return->nama = $user['nama_users'];
        $return->email = $user['email'];
        $return->role = $role;
        if ($user['id_subs'] != null || $subs != null) {
            $return->subs = $subs;
        } else {
            // die();
            $return->subs = [];

        }
        return $return;
    } else {
        return redirect()->route('logout');
        delete_cookie('jwt');
        redirect()->route('signin');
        $return->id = "";
        $return->nama = "";
        $return->username = "";
        $return->email = "";
        $return->role = array();
        $return->subs = [];
        return redirect()->route('signin');
    }
}
function checkJWT($jwt)
{
    $key    = getenv('TOKEN_SECRET');
    try {
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        // var_dump($decoded);
        return $decoded;
    } catch (\Throwable $err) {
        var_dump($err->getMessage());
        return false;
    }
}

function checkJWTAuth($jwt)
{
    if (checkJWT($jwt) == false) {
        return false;
    } else {
        return true;
    }
}


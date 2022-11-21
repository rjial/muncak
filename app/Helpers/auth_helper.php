<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use \App\Models\UsersModel;

function isLogged() {
    // dd($_COOKIE);
    helper('cookie');
    $cookie = get_cookie('jwt');
    // var_dump($cookie);
    if ($cookie != "") {
        $jwt = $cookie;
        if (checkJWT($jwt) == false) return false;
        return true;
    } else {
        return false;
    }
}
function getAuth() {
    if(isLogged() == false) return false;
    helper('cookie');
    $cookie = get_cookie('jwt');
    $data = checkJWT($cookie);
    $user = (new UsersModel())->where('id_users', $data->id)->where('email', $data->email)->first();
    $return = new stdClass();
    $return->username = $user['username'];
    $return->email = $user['email'];
    return $return;
}
function checkJWT($jwt) {
    $key    = getenv('TOKEN_SECRET');
    try {
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        // var_dump($decoded);
        return $decoded;
    }catch(\Throwable $err) {
        var_dump($err->getMessage());
        return false;
    }
}
?>
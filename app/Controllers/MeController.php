<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class MeController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $key    = getenv('TOKEN_SECRET');
        
    
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        
        if (!$header) return $this->failUnauthorized('Token Required');
       $token = explode(' ', $header)[1];
        
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $response = [
                'id_users'  => $decoded->id,
                'username'  => $decoded->username,
                'email'     => $decoded->email
            ];
            return $this->respond($response);
        }
        catch (\Throwable $th){
            return $this->fail('Invalid Token');
        }
    }

}

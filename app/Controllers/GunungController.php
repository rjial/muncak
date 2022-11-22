<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\GunungModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class GunungController extends ResourceController
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
            $model = new GunungModel();
            $data = $model->findAll();
            return $this->respond($data, 200);;
        }
        catch (\Throwable $th){
            return $this->fail('Invalid Token');
        }
        
        // $response = [
        //     'status'    => 200,
        //     'error'     => null,
        //     'messages'  => [
        //     'success'   => 'User Login Successfully!'
        //     ],
        //     'Token'     => $token
        // ];
        // return $this->respond($response);
    }

}

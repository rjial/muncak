<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UsersModel;
use Firebase\JWT\JWT;


class LoginController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        helper(['form']);
        $rules =[
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model = new UsersModel();
        $users = $model->where("email", $this->request->getVar('email'))->first();
        // var_dump($users['password']);
        // var_dump(password_verify($this->request->getVar('password'), $users['password']));
        if (!$users) return $this->failNotFound('Email Not Found, Please Input Correct Address!');
        
        $verify = password_verify($this->request->getVar('password'), $users['password']);
        // var_dump($verify);
        if(!$verify) return $this->fail('Wrong Password, Please Input Correct Password!');

        $key    = getenv('TOKEN_SECRET');
        $payload = array(
            "id" => $users['id_users'],
            "username" => $users['username'],
            "email" => $users['email']
        );

        $token = JWT::encode($payload, $key, 'HS256');
        
        $response = [
            'status'    => 200,
            'error'     => null,
            'messages'  => [
            'success'   => 'User Login Successfully!'
            ],
            'Token'     => $token
        ];
        return $this->respond($response);

    }

}

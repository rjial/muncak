<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;

class RegisterController extends ResourceController
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
        $rules = [
            'username'      => 'required|min_length[4]',
            'email'         => 'required|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[8]',
            'confpassword'  => 'matches[password]'
        ];
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $data = [
            'username'         => $this->request->getVar('username'),
            'email'         => $this->request->getVar('email'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        ];
        $model = new UsersModel();
        $registered = $model->save($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
            'success' => 'User Registered Successfully!'
            ]
        ];
        return $this->respondCreated($response);


    }

}

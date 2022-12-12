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
        
    }
    public function add()
    {
        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->failUnauthorized('Token Required');
       $token = explode(' ', $header)[1];
       try {
            $model = new GunungModel();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'url_gunung' => $this->request->getPost('url_gunung'),
                'book_available' => $this->request->getPost('book_available')
            ];
            //$data = json_decode(file_get_contents("php://input"));
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Saved'
                ]
            ];
             
            return $this->respond($response);

       }
       catch (\Throwable $th){
        return $this->fail('Invalid Token');
        }
    }
    public function create ()
    {
        helper(['auth']);
        return view('gunung/addgunung');
    }

}

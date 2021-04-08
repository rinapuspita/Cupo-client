<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class User_model extends CI_Model {
    private $_user;
    public function __construct(){
        $this->_user = new Client([ // guzzle not found in this line code
            'base_uri' => 'https://rest-server-cupo.000webhostapp.com/'
        ]);
    }

    public function getUser()
    {
        $response = $this->_user->request('GET', 'users/get',[
            'query' => [
                'X-API-KEY' => 'apikey'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function getCust()
    {
        $response = $this->_user->request('GET', 'api/customer/',[
            'query' => [
                'X-API-KEY' => 'apikey'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function getUserByID($id)
    {
        $response = $this->_user->request('GET', 'users/get',[
            'query' => [
                'X-API-KEY' => 'apikey',
                'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function userRegister()
    {
        try{
            $fullname= $this->input->post('fullname', true);
            $username= $this->input->post('username', true);
            $email= $this->input->post('email', true);
            $password= $this->input->post('password', true); 
            $data = [
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                "X-API-KEY" => 'apikey'
            ];
    
            // $this->db->insert('mahasiswa', $data);
            $response = $this->_user->request('POST', 'users/register',[
                'form_params' => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function custRegister()
    {
        $data = [
            "fullname" => $this->input->post('fullname', true),
            "username" => $this->input->post('username', true),
            "email" => $this->input->post('email', true),
            "password" => $this->input->post('password', true),
            "X-API-KEY" => 'apikey'
        ];

        // $this->db->insert('mahasiswa', $data);
        $response = $this->_user->request('POST', 'api/customer/',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    public function userLogin()
    {
        $data = [
            "username" => htmlspecialchars($this->input->post('username')),
            "password" => htmlspecialchars($this->input->post('password')),
            "X-API-KEY" => 'apikey'
        ];
        try{
            $res = $this->_user->request('POST', 'users/login',[
                'form_params' => $data
            ]);
            $result = json_decode($res->getBody()->getContents(), true);
            return $result['data'];
        } catch(\GuzzleHttp\Exception\ClientException $e){
            // echo $e->getResponse()->getBody()->getContents();
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username atau Password salah</div>');
        }
    }

    public function getLogin($token)
    {
        try{
            $res = $this->_user->request('GET', 'users/get', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                  'authorization' => "bearerHeader " . $token
                ]
              ]);
              return json_decode($res->getBody()->getContents(), true);
        } catch(\GuzzleHttp\Exception\ClientException $e){
            echo $e->getResponse()->getBody()->getContents();
        }
    }

}
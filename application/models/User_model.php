<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class User_model extends CI_Model
{
    private $_user;
    public function __construct()
    {
        $this->_user = new Client([ // guzzle not found in this line code
            'base_uri' => 'https://server-cupo.xyz/'
            // 'base_uri' => 'http://localhost/rest-server-cupo/'
        ]);
    }

    public function getUser()
    {
        try{
            $response = $this->_user->request('GET', 'api/users/user', [
                'query' => [
                    'X-API-KEY' => 'apikey'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function getUserActive()
    {
        try{
            $response = $this->_user->request('GET', 'api/users/userActive', [
                'query' => [
                    'X-API-KEY' => 'apikey'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function hitung()
    {
        try{
            $response = $this->_user->request('GET', 'api/users/getRows', [
                'headers' => [
                    'X-API-KEY' => 'apikey'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            // echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function aktivasiAcc($id)
    {
        try{
            $response = $this->_user->request('GET', 'api/users/changeActive', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'query' => [
                    'id' => $id,
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function getCust()
    {
        try {
            $response = $this->_user->request('GET', 'api/customer/', [
                'query' => [
                    'X-API-KEY' => 'apikey'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function getCustActive()
    {
        try{
            $response = $this->_user->request('GET', 'api/customer/custActive', [
                'query' => [
                    'X-API-KEY' => 'apikey'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function aktivasiCust($id)
    {
        try{
            $response = $this->_user->request('GET', 'api/customer/changeActive', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'query' => [
                    'id_cust' => $id,
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function hitungCust()
    {
        try {
            $response = $this->_user->request('GET', 'api/customer/getRows', [
                'headers' => [
                    'X-API-KEY' => 'apikey'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function getUserByID($id)
    {
        $response = $this->_user->request('GET', 'users/get', [
            'query' => [
                'X-API-KEY' => 'apikey',
                'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function getCustByID($id)
    {
        $response = $this->_user->request('GET', 'api/customer', [
            'query' => [
                'X-API-KEY' => 'apikey',
                'id_cust' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function userRegister()
    {
        try {
            $fullname = $this->input->post('fullname', true);
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $data = [
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                "X-API-KEY" => 'apikey'
            ];

            $response = $this->_user->request('POST', 'users/register', [
                'form_params' => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
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
        $response = $this->_user->request('POST', 'customer/register', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function userLogin()
    {
        $data = [
            "username" => htmlspecialchars($this->input->post('username')),
            "password" => htmlspecialchars($this->input->post('password')),
            "X-API-KEY" => 'apikey'
        ];
        try {
            $res = $this->_user->request('POST', 'users/login', [
                'form_params' => $data
            ]);
            $result = json_decode($res->getBody()->getContents(), true);
            return $result['data'];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // echo $e->getResponse()->getBody()->getContents();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password salah</div>');
        }
    }

    public function getLogin()
    {
        try {
            $res = $this->_user->request('GET', 'users/get', [
                'headers' => [
                    'X-API-KEY' => 'apikey'
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function editMitra()
    {
        try {
            $id = $this->input->post('id');
            $fullname = $this->input->post('fullname', true);
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $res = $this->_user->request('PUT', 'users/update', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                "form_params" => [
                    'id' => $id,
                    'fullname' => $fullname,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function editCust()
    {
        try {
            $id = $this->input->post('id_cust');
            $fullname = $this->input->post('fullname', true);
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $hp = $this->input->post('no_hp', true);
            $res = $this->_user->request('PUT', 'customer/update/', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'form_params' => [
                    'id_cust' => $id,
                    'fullname' => $fullname,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'no_hp' => $hp,
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function hapusMitra($id)
    {
        try {
            $res = $this->_user->request('DELETE', 'api/users/', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'form_params' => [
                    'id' => $id
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function hapusCust($id)
    {
        try {
            $res = $this->_user->request('DELETE', 'api/customer/', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'form_params' => [
                    'id_cust' => $id
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Produk_model extends CI_Model {
    private $_produk;
    public function __construct(){
        $this->_produk = new Client([
            'base_uri' => 'https://server-cupo.xyz/'
        ]);
    }

    public function getProduk()
    {
        try{
            $response = $this->_produk->request('GET', 'api/produk', [
                'headers' => [
                    'X-API-KEY' => 'apikey'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function hitungProduk()
    {
        try{
            $response = $this->_produk->request('GET', 'api/produk/getRows', [
                'headers' => [
                    'X-API-KEY' => 'apikey'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function getProdukKotor()
    {
        try{
            $response = $this->_produk->request('GET', 'api/produk/cupKotor', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            // echo $e->getResponse()->getBody()->getContents();
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Produk Kosong</div>');
        }
    }

    public function getCuci($id)
    {
        try{
            $response = $this->_produk->request('GET', 'api/produk/cleanProduct?', [
                'query' => [
                    'X-API-KEY' => 'apikey',
                    'id_produk' => $id
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function getM_Produk($id)
    {
        try{
            $response = $this->_produk->request('GET', 'api/produk/mProd',[
                'query' => [
                    'X-API-KEY' => 'apikey',
                    'id_mitra' => $id
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            // echo $e->getResponse()->getBody()->getContents();
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Produk Kosong</div>');
        }
    }

    public function updateLokasi($lokasi, $id)
    {
        try{
            $response = $this->_produk->request('PUT', 'api/produk/changeLokasi/', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'form_params' => [
                    'id_mitra' => $lokasi,
                    'id_produk' => $id,
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function getProdukByID($id)
    {
        try{
            $response = $this->_produk->request('GET', 'api/produk',[
                'query' => [
                    'X-API-KEY' => 'apikey',
                    'id_produk' => $id
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'][0];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function getProdukID($id)
    {
        try{
            $response = $this->_produk->request('GET', 'api/produk',[
                'query' => [
                    'X-API-KEY' => 'apikey',
                    'id_produk' => $id
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function addProduk()
    {
        try{
            $nama_produk=  $this->input->post('nama_produk', true);
            $data = [
                'nama_produk' => $nama_produk,
                "X-API-KEY" => 'apikey'
            ];
            $response = $this->_produk->request('POST', 'api/produk',[
                'form_params' => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }

    }

    public function delete($id)
    {
        try {
            $res = $this->_produk->request('DELETE', 'api/produk', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'form_params' => [
                    'id_produk' => $id,
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
          } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
          }
    }

    public function editProduk()
    {
        try {
            $id = $this->input->post('id_produk');
            $nama = $this->input->post('nama_produk');
            $res = $this->_produk->request('PUT', 'api/produk/edit', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'form_params' => [
                    'id_produk' => $id,
                    'nama_produk' => $nama,
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
          } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
          }
    }

}
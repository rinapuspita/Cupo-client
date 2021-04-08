<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Produk_model extends CI_Model {
    private $_produk;
    public function __construct(){
        $this->_produk = new Client([
            'base_uri' => 'https://rest-server-cupo.000webhostapp.com/'
        ]);
    }

    public function getProduk($token)
    {
        try{
            $response = $this->_produk->request('GET', 'api/produk', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                  'authorization' => "bearerHeader " . $token
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
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

}
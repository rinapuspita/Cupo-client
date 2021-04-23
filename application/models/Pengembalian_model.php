<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Pengembalian_model extends CI_Model {
    private $_kembali;
    public function __construct(){
        $this->_kembali = new Client([
            'base_uri' => 'https://server-cupo.xyz/'
        ]);
    }

    public function getKembali()
    {
        try{
            $response = $this->_kembali->request('GET', 'api/pengembalian', [
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

    public function getKembaliByID($id)
    {
        try{
            $response = $this->_kembali->request('GET', 'api/pengembalian',[
                'query' => [
                    'X-API-KEY' => 'apikey',
                    'id_kembali' => $id
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'][0];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
        
    }

    public function hitungKembali()
    {
        try{
            $response = $this->_kembali->request('GET', 'api/pengembalian/getRows', [
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

    public function getKembaliMitra($id)
    {
        try{
            $response = $this->_kembali->request('GET', 'api/pengembalian/mKembali',[
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

    public function update()
    {
        try {
            $id = $this->input->post('id_kembali');
            $tanggal_kembali = $this->input->post('tanggal_kembali', true);
            $status = $this->input->post('status', true);
            $res = $this->_kembali->request('PUT', 'api/pengembalian', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'form_params' => [
                    'id_kembali' => $id,
                    'tanggal_kembali' => $tanggal_kembali,
                    'status' => $status
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function delete($id){
    try {
        $res = $this->_kembali->request('DELETE', 'api/pengembalian/' . $id . ')');
        return json_decode($res->getBody()->getContents(), true);
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        echo $e->getResponse()->getBody()->getContents();
    }

  }
}
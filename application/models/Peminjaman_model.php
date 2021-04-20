<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Peminjaman_model extends CI_Model {
    private $_pinjam;
    public function __construct(){
        $this->_pinjam = new Client([
            'base_uri' => 'https://server-cupo.xyz/'
        ]);
    }

    public function getPinjam()
    {
        try{
            $response = $this->_pinjam->request('GET', 'peminjaman/get', [
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

    public function getPinjamByID($id)
    {
        try{
            $response = $this->_pinjam->request('GET', 'api/peminjaman',[
                'query' => [
                    'X-API-KEY' => 'apikey',
                    'id_pinjam' => $id
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'][0];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
        
    }

    public function getMitraPinjam($id)
    {
        try{
            $response = $this->_pinjam->request('GET', 'api/peminjaman/mPinjam',[
                'query' => [
                    'X-API-KEY' => 'apikey',
                    'id_mitra' => $id
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            // echo $e->getResponse()->getBody()->getContents();
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Peminjaman Kosong</div>');
        }
        
    }

    public function delete($id){
    try {
        $res = $this->_pinjam->request('DELETE', 'api/peminjaman/' . $id . ')');
        return json_decode($res->getBody()->getContents(), true);
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        echo $e->getResponse()->getBody()->getContents();
    }

  }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Pengembalian_model extends CI_Model {
    private $_kembali;
    public function __construct(){
        $this->_kembali = new Client([
            'base_uri' => 'https://rest-server-cupo.000webhostapp.com/'
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

    public function delete($id){
    try {
        $res = $this->_kembali->request('DELETE', 'api/pengembalian/' . $id . ')');
        return json_decode($res->getBody()->getContents(), true);
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        echo $e->getResponse()->getBody()->getContents();
    }

  }
}
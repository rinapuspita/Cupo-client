<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Lokasi_model extends CI_Model {
    private $_lokasi;
    public function __construct(){
        $this->_lokasi = new Client([
            'base_uri' => 'https://server-cupo.xyz/'
        ]);
    }

    public function getLokasi()
    {
        try{
            $response = $this->_lokasi->request('GET', 'api/lokasi', [
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

    public function addLokasi($id)
    {
        try{
            $id_mitra =  $this->input->post('id_mitra', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $latitude = $this->input->post('latitude', TRUE);
            $longtitude = $this->input->post('longitude', TRUE);
            $data = [
                'id_mitra' => $id,
                'alamat' => $alamat,
                'latitude' => $latitude,
                'longitude' => $longtitude,
                "X-API-KEY" => 'apikey'
            ];
            $response = $this->_lokasi->request('POST', 'api/lokasi',[
                'form_params' => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }
}
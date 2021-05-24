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

    public function getLokasibyID($id)
    {
        try{
            $response = $this->_lokasi->request('GET', 'api/lokasi', [
                'query' => [
                    'X-API-KEY' => 'apikey',
                    'id_lokasi' => $id
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'][0];
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function addLokasi()
    {
        try{
            $id_mitra =  $this->input->post('id_mitra', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $latitude = $this->input->post('latitude', TRUE);
            $longtitude = $this->input->post('longitude', TRUE);
            $data = [
                'id_mitra' => $id_mitra,
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

    public function editLokasi()
    {
        try {
            $id = $this->input->post('id_lokasi');
            $id_mitra = $this->input->post('id_mitra');
            $alamat = $this->input->post('alamat');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $res = $this->_lokasi->request('PUT', 'api/lokasi/edit', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'form_params' => [
                    'id_lokasi' => $id,
                    'id_mitra' => $id_mitra,
                    'alamat' => $alamat,
                    'latitude' => $latitude,
                    'longitude' => $longitude
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
          } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
          }
    }

    public function hapusLokasi($id)
    {
        try {
            $res = $this->_lokasi->request('DELETE', 'api/lokasi/', [
                'headers' => [
                    'X-API-KEY' => 'apikey',
                ],
                'form_params' => [
                    'id_lokasi' => $id
                ]
            ]);
            return json_decode($res->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    public function hitung()
    {
        try{
            $response = $this->_lokasi->request('GET', 'api/lokasi/getRows', [
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
}
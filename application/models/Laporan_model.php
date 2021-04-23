<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Laporan_model extends CI_Model {
    private $_laporan;
    public function __construct(){
        $this->_laporan = new Client([
            'base_uri' => 'https://server-cupo.xyz/'
        ]);
    }

    public function laporanProduk()
    {
        try{
            $response = $this->_laporan->request('GET', 'api/produk/getRows', [
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
}
?>
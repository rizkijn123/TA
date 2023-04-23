<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function index()
    {
        $devnm = $this->input->get('Devnm');
        $btn = $this->input->get('Btn');
        $lon = $this->input->get('Lon');
        $lat = $this->input->get('Lat');

        $data = [
            'long' => $lon,
            'lat' => $lat,
            'device_name' => $devnm,
            'btn' => $btn
        ];
        $this->db->insert('location', $data);
        echo "data berhasil di input";
    }
}

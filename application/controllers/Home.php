<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        // $this->db->where('role_id !=', 1);
        $this->db->where('deviceName !=', '-');
        $this->db->where('api_device !=', '-');
        $data['deviceuser'] = $this->db->get('user')->result_array();
        $data['title'] = 'Panic Button Home';

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/home_footer');
    }
    public function getinfo($id)
    {
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['title'] = 'Info Device';

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/info');
        $this->load->view('templates/home_footer');
    }
    public function getlog($id)
    {
        // Memuat model dan mengambil data dari database
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['title'] = 'Log Track Device';

        // Memuat tampilan dan mengirimkan data ke tampilan
        $this->load->view('templates/home_header_log', $data);
        $this->load->view('home/log', $data);
        $this->load->view('templates/home_footer_log');
    }
    public function getjson($id)
    {
        // Memuat model dan mengambil data dari database
        $locations = $this->db->get_where('location', ['device_name' => $id])->result_array();

        // Memuat tampilan dan mengirimkan data ke tampilan
        echo json_encode($locations);
    }
}

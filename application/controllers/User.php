<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard User';
        $data['page'] = 'User';
        $data['page_title'] = 'Dashboard';

        $this->load->view('templates/head_default', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My profile';
        $data['page'] = 'User';
        $data['page_title'] = 'My profile';
        $this->load->view('templates/head_default', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function listdevice()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Input Device';
        $data['page'] = 'User';
        $data['page_title'] = 'Input Device';
        $data['device'] = $this->db->get_where('device', ['is_active' => 1])->result_array();


        $this->load->view('templates/head_default', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('user/listdevice', $data);
        $this->load->view('templates/footer');
    }
    public function inputdevice($id)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $device = $this->db->get_where('device', ['id' => $id])->row_array();

        if ($user['deviceName'] == '-' and $user['api_device'] == '-') {
            $dataUpdateUser = [
                'deviceName' => $device['device_name'],
                'api_device' => $device['api']
            ];
            $dataUpdateDevice = [
                'is_active' => 0
            ];
            $this->db->update('user', $dataUpdateUser, ['id' => $user['id']]);
            $this->db->update('device', $dataUpdateDevice, ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white" role="alert">
            New device added!
          </div>');
            redirect('user/listdevice');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-white" role="alert">
            User already have a device
          </div>');
            redirect('user/listdevice');
        }
    }
    public function deletedevice($id)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $device = $this->db->get_where('device', ['device_name' => $id])->row_array();

        $dataUpdateUser = [
            'deviceName' => '-',
            'api_device' => '-'
        ];
        $dataUpdateDevice = [
            'is_active' => 1
        ];
        $this->db->update('user', $dataUpdateUser, ['id' => $user['id']]);
        $this->db->update('device', $dataUpdateDevice, ['device_name' => $device['device_name']]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger text-white" role="alert">
            Device deleted!
          </div>');
        redirect('user');
    }
    public function getinfo($id)
    {
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['title'] = 'Info Device';
        $data['page'] = 'User';
        $data['page_title'] = 'Info Device';

        $this->load->view('templates/head_api_track', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('user/info');
        $this->load->view('templates/footer');
    }
    public function getlog($id)
    {
        // Memuat model dan mengambil data dari database
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['title'] = 'Log Track Device';
        $data['page'] = 'User';
        $data['page_title'] = 'Log Track Device';

        // Memuat tampilan dan mengirimkan data ke tampilan
        $this->load->view('templates/head_api_log', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('user/log');
        $this->load->view('templates/footer_log');
    }
    public function getjson($id)
    {
        // Memuat model dan mengambil data dari database
        $locations = $this->db->get_where('location', ['device_name' => $id])->result_array();

        // Memuat tampilan dan mengirimkan data ke tampilan
        echo json_encode($locations);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard Admin';
        $data['page'] = 'Admin';
        $data['page_title'] = 'Dashboard';
        $this->db->where('role_id !=', 1);
        $data['deviceuser'] = $this->db->get('user')->result_array();

        $this->load->view('templates/head_default', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function device()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Add Device';
        $data['page'] = 'Admin';
        $data['page_title'] = 'Add Device';
        $data['device'] = $this->db->get('device')->result_array();


        $this->form_validation->set_rules('device_name', 'Device Name', 'required|trim');
        $this->form_validation->set_rules('api', 'API Device', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_default', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/header', $data);
            $this->load->view('admin/device', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('is_active') == null) {
                $isActive = 0;
            } else {
                $isActive = 1;
            }
            $data = [
                'device_name' => $this->input->post('device_name'),
                'api' => $this->input->post('api'),
                'is_active' => $isActive
            ];
            $this->db->insert('device', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white" role="alert">
            New device added!
          </div>');
            redirect('admin/device');
        }
    }

    public function deletedevice($id)
    {
        $this->db->delete('device', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-white" role="alert">
        New device added!
      </div>');
        redirect('admin/device');
    }
    public function activate($id)
    {
        $data = [
            'is_active' => 1
        ];
        $this->db->update('device', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-white" role="alert">
        Device can be used!
      </div>');
        redirect('admin/device');
    }
    public function nonactivate($id)
    {
        $data = [
            'is_active' => 0
        ];
        $this->db->update('device', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-white" role="alert">
        Device cannot be used!
      </div>');
        redirect('admin/device');
    }
    public function deleteuserdevice($id)
    {
        $data = [
            'deviceName' => '-',
            'api_device' => '-'
        ];
        $this->db->update('user', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-white" role="alert">
        Device deleted from user!
      </div>');
        redirect('admin/device');
    }
}

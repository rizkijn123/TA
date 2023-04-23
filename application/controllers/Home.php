<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'PTA Lorawan';
        $this->load->view('templates/home_header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/home_footer');
    }
}
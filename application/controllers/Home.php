<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DonateModel');
    }

    public function index()
    {
        $data['title'] = 'Donations';
        $data['data'] = $this->DonateModel->get();
        $this->load->view('templates/body/header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/body/footer');
    }
}
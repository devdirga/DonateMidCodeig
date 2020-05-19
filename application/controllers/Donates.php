<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donates extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DonateModel');
        $this->load->library('upload', array('upload_path' => './assets/img/', 'allowed_types' => 'gif|jpg|png|jpeg|bmp', 'encrypt_name' => true));
    }

    public function index()
    {
        $data['title'] = 'Donates';
        $data['data'] = $this->DonateModel->get();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('donates', $data);
        $this->load->view('templates/admin/footer');
    }

    public function add()
    {
        $data['title'] = 'Add donates';
        $this->load->view('templates/admin/header', $data);
        $this->load->view('donatesAdd', $data);
        $this->load->view('templates/admin/footer');
    }

    public function insert()
    {

        if (!empty($_FILES['file']['name'])) {
            if ($this->upload->do_upload('file')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 400;
                $config['height'] = 400;
                $config['new_image'] = './assets/img/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $gbr['file_name']; //ambil nama file yang terupload enkripsi
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                //Create slug
                $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $title); //filter karakter unik dan replace dengan kosong ('')
                $trim = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
                $pre_slug = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
                $slug = $pre_slug . '.html'; // tambahkan ektensi .html pada slug
                $this->DonateModel->insert($title, $slug, $description, $gambar); //simpan artikel ke
                redirect('Donates');
            } else {
                redirect('Donates');
            }
        } else {
            redirect('Donates');
        }
        //
    }

    public function edit()
    {
        //
    }
    public function update()
    {
        //
    }

    public function detail($slug)
    {
        $data = $this->DonateModel->get_by_slug($slug);
        if ($data) { // validasi jika data ditemukan
            $datas['title'] = 'Detail donate';
            $datas['data'] = $data;
            $this->load->view('templates/admin/header', $datas);
            $this->load->view('donatesDetail', $datas);
            $this->load->view('templates/admin/footer');
        } else {
            //jika data tidak ditemukan, maka kembali ke blog
            redirect('blog');
        }
    }

    public function delete()
    {
        //
    }
}
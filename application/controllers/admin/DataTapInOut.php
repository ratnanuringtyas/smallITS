<?php

class DataTapInOut extends CI_Controller{

  public function __construct(){
    parent::__construct();
    
    if($this->session->userdata('hak_akses') != '1'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda belum login!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('welcome');
    }
  }

  public function index(){
    $data['title'] = "Data Tap In - Tap Out";
    $data['tap_in_out'] = $this->penggajianModel->get_data_in_out()->result();

    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dataTapInOut', $data);
    $this->load->view('templates_admin/footer');
    
  }




}
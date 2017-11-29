<?php
class Daftar_Barang extends CI_Controller{
function __construct(){
parent::__construct();
$this->load->model('m_data2');
}
function barang(){
$data['barang']=$this->m_data2->tampil_data()->result();
$this->load->view('v_barang',$data);
}
}
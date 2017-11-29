<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('mdata_pengeluaran');
	$this->load->helper('url');
	}
	public function index()
	{
		//$this->header();
		$_GET['aksi']='beranda';
		$this->load->view('header_view');
		$this->load->view('footer_view');
	}
	
	public function data_barang(){
		$_GET['aksi']='barang';
		$this->load->view('header_view');
		$this->load->view('vdata_barang');
		$this->load->view('footer_view');
	}
		public function data_penjualan(){
		$_GET['aksi']='penjualan';
		$this->load->view('header_view');
		$this->load->view('footer_view');
	}
		public function laporan_penjualan(){
		$_GET['aksi']='laporan penjualan';
		$this->load->view('header_view');
		$this->load->view('footer_view');
	}
	public function daftar_retur()
	{
		$data['product']=$this->mdata_pengeluaran->daftar_retur()->result();
		//$this->header();	
		$_GET['aksi']='daftar retur';
		$this->load->view('header_view');
		$this->load->view('daftar_retur', $data);
		$this->load->view('footer_view');
	}
}

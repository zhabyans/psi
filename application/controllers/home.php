<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('mdata_pengeluaran');
	$this->load->model('m_data2');
	$this->load->helper('url');
	//$this->mdata_pengeluaran->cek_retur();
	}
	public function index()
	{
		$_GET['aksi']='Beranda';
		$this->load->view('header_view');
		$this->load->view('grafik');
		$this->load->view('footer_view');
	}
	public function data_barang()
	{
		//$this->header();
		$_GET['aksi']='Data Barang';
		$data['barang']=$this->mdata_pengeluaran->nama_barang()->result();
		$data['list']=$this->m_data2->tampil_data()->result();
		$this->load->view('header_view');
		$this->load->view('input', $data);
		$this->load->view('footer_view');
	}
	public function laporan()
	{
		//$this->header();
		$_GET['aksi']='Laporan Penjualan';
		$this->load->view('header_view');
		if(isset($_POST['submit'])){
			$data['product']=$this->mdata_pengeluaran->daftar_retur()->result();
			$this->load->view('laporan',$data);
		}else{
			$this->load->view('cari_laporan');
		}
		$this->load->view('footer_view');
	}
	public function input_barang()
	{
		if(isset($_POST['submit'])){
			$nama=$this->input->post('barang');
			//buat id barang
			$row=$this->mdata_pengeluaran->cari_id();
			$id=$row->ID_BARANG;
			$check=$this->m_data2->cari_data($id);
			if ($check == TRUE){
			$this->session->set_flashdata("pesan", " <i class='fa fa-warning'></i>&nbspData yang Anda masukkan sudah ada");
			echo $check->TANGGAL_MASUK;
			redirect('home/data_barang');
			}
			else{
				//buat id_pendataan
				$q = $this->db->query("SELECT MAX(RIGHT(id_pendataan,3)) AS idmax FROM pendataan_barang");
				$kd = ""; //kode awal
				if($q->num_rows()>0){ //jika data ada
					foreach($q->result() as $k){
						$tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
						$kd = sprintf('%03s', $tmp); //kode ambil 3 karakter terakhir
					}
				}else{ //jika data kosong diset ke kode awal
					$kd = "001";
				}
				$kar = "PROD"; //karakter depan kodenya
				$id_data=$kar.$kd;
				//input id user
				$id_user=$_SESSION['id'];
				$this->mdata_pengeluaran->input_barang($id, $id_data, $id_user);
				redirect('home/data_barang');
			}
		}
	}

	public function data_penjualan(){
		$_GET['aksi']='penjualan';
		$this->load->view('header_view');
		$this->load->view('footer_view');
	}
	public function daftar_retur()
	{
		$data['product']=$this->mdata_pengeluaran->daftar_retur()->result();
		//$this->header();	
		$_GET['aksi']='Daftar Retur';
		$this->load->view('header_view');
		$this->load->view('daftar_retur', $data);
		$this->load->view('footer_view');
	}
}

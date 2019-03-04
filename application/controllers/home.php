<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('mdata_pengeluaran');
	$this->load->model('m_data2');
	$this->load->helper('url');
	$this->mdata_pengeluaran->cek_retur();
	}
	public function header(){
		$this->load->view('header_view');
	}
	public function index()
	{
		//$this->header();
		$_GET['aksi']='Beranda';		
		
		$this->header();
		$this->load->view('home');
		$this->load->view('footer_view');
	}
	public function data_barang()//vivin
	{
		//$this->header();
		$_GET['aksi']='Data Barang';
		$data['barang']=$this->mdata_pengeluaran->nama_barang()->result();
		$data['list']=$this->m_data2->tampil_data()->result();
		//$this->load->view('header_view');
		$this->header();
		$this->load->view('input', $data);
		$this->load->view('footer_view');
	}
	public function input_barang()//vivin
	{
		if(isset($_POST['submit'])){
			//$nama=$this->input->post('barang');
			//buat id barang
			$row=$this->mdata_pengeluaran->cari_nama();
			$id=$row->ID_BARANG;
			$check=$this->m_data2->cari_data($id);
			if ($check == TRUE){
				$this->session->set_flashdata("pesan", " <div class='alert alert-danger text-center'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-warning'></i>&nbspData yang Anda masukkan sudah ada.</div>");
				echo $check->TANGGAL_MASUK;
				redirect('home/data_barang');
			}
			else{
			//buat tanggal exp
				$tgl=$this->input->post('tgl');
				$newtgl=strtotime($tgl);
				$cariexp=$row->EXPIRED;
				$newexp=86400 * $cariexp;
				$hasiltgl=$newtgl+$newexp;
				$exp=date('Y-m-d', $hasiltgl);
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
				$this->mdata_pengeluaran->input_barang($id, $id_data, $id_user, $exp);
				$this->session->set_flashdata("pesan", " <div class='alert alert-success text-center'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i>&nbspData berhasil ditambahkan.</div>");
				redirect('home/data_barang');
			}
		}
	}
	public function input_nama_barang()//vivin
	{
		if(isset($_POST['tambah'])){
			//buat id barang
			$row=$this->mdata_pengeluaran->cek_nama()->num_rows();
			echo $row;
			if ($row >= 1){
				$this->session->set_flashdata("pesan", " <div class='alert alert-danger text-center'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-warning'></i>&nbspData yang Anda masukkan sudah ada.</div>");
				redirect('home/data_barang');
			}
			else{
				$this->mdata_pengeluaran->input_nama_barang();
				$this->session->set_flashdata("pesan", " <div class='alert alert-success text-center'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i>&nbspData berhasil ditambahkan.</div>");
				redirect('home/data_barang');
			}
		}
	}
	public function edit_barang(){//vivin
		$this->mdata_pengeluaran->edit_barang();
		$this->session->set_flashdata("pesan", " <div class='alert alert-success text-center'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i>&nbspStok berhasil diubah.</div>");
		redirect('home/data_barang');
	}
	public function daftar_retur()//jafar
	{
		$data['hitung']=$this->mdata_pengeluaran->daftar_retur()->num_rows();
		$data['product']=$this->mdata_pengeluaran->daftar_retur()->result();
		$data['jlh']=$this->m_data2->pagination();
		//$this->header();
		$_GET['aksi']='Daftar Retur';
		$this->header();
		$this->load->view('daftar_retur', $data);
		$this->load->view('footer_view');
	}
	
	public function hapus_barang(){//vivin
		$id=$this->input->post('id_data');
		$this->mdata_pengeluaran->hapus_barang($id);
		redirect('home/data_barang');
	}
	public function hapus_transaksi(){//zhafran
		$row1=$this->m_data2->cari_id_data();
		$stok_ahir=$row1->STOK + $this->input->post('jumlah');
		$this->m_data2->balik_stok($stok_ahir);
		$this->m_data2->hapus_transaksi();
		$this->session->set_flashdata("pesan", " <div class='alert alert-success text-center'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i>&nbspData berhasil dihapus.</div>");
		redirect('home/data_penjualan');
	}
	
	
   
}

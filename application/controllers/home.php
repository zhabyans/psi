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
	public function laporan()//elma
	{
		//$this->header();
		$_GET['aksi']='Laporan Penjualan';
		$this->header();
		if(isset($_POST['submit'])){
			$hari=$_POST['hari'];
			$bln=$_POST['bln'];
			if($hari!=0){
				$data['c_hari']=$this->mdata_pengeluaran->laporan_harian()->num_rows();
				$data['laporan_harian']=$this->mdata_pengeluaran->laporan_harian()->result();
				$this->load->view('laporan_harian',$data);
			}elseif($bln!=0){
				$data['c_bln']=$this->mdata_pengeluaran->laporan()->num_rows();
				$data['laporan']=$this->mdata_pengeluaran->laporan()->result();
				$this->load->view('laporan',$data);
			}
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
			$this->session->set_flashdata("pesan", " <i class='fa fa-warning'></i>&nbspData yang Anda masukkan sudah ada.");
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
	
	public function input_terjual()
	{
		if(isset($_POST['submit'])){
			$nama=$this->input->post('barang');
			//buat id barang
			$row=$this->mdata_pengeluaran->cari_id();
			$id=$row->ID_BARANG;
			$row1=$this->mdata_pengeluaran->cari_id_data($id);
			$id_pendataan=$row1->ID_PENDATAAN;
			echo $id_pendataan;
			echo $this->input->post('tgl');
			$harga=$row->HARGA;
			$stok=$row1->STOK;
			echo $stok;
			$total=$this->input->post('stok')*$harga;
			$barang_akhir=$stok-$this->input->post('stok');
			$tgl=$this->input->post('tgl');
			//buat id_pendataan
			$q = $this->db->query("SELECT MAX(RIGHT(id_transaksi,3)) AS idmax FROM data_pengeluaran");
			$kd = ""; //kode awal
			if($q->num_rows()>0){ //jika data ada
				foreach($q->result() as $k){
					$tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
					$kd = sprintf('%03s', $tmp); //kode ambil 3 karakter terakhir
				}
			}else{ //jika data kosong diset ke kode awal
				$kd = "001";
			}
			$kar = "TRAN"; //karakter depan kodenya
			$id_trans=$kar.$kd;
			//input id user
			$id_user=$_SESSION['id'];
			$this->mdata_pengeluaran->update_stok($id_pendataan,$barang_akhir);
			$this->mdata_pengeluaran->input_terjual($id, $id_trans, $id_user,$harga,$total,$id_pendataan);
			redirect('home/data_penjualan');
		}
	}

	public function data_penjualan(){
		$_GET['aksi']='Data Penjualan';
		$data['barang']=$this->mdata_pengeluaran->nama_barang()->result();
		$data['list']=$this->m_data2->tampil_data()->result();
		$data['data']=$this->m_data2->tampil_data_juga()->result();
		$this->load->view('header_view');
		$this->load->view('vdata_penjualan', $data);
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

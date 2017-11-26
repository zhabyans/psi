<?php
 class mdata_pengeluaran extends CI_Model{

	 function daftar_retur(){
	 	$this->db->select('barang.*, pendataan_barang.*');
		$this->db->from('pendataan_barang');
		$this->db->join('barang','pendataan_barang.ID_BARANG = barang.ID_BARANG');
		$this->db->where('pendataan_barang.STATUS_RETUR', 'retur');
		return $this->db->get();
 	}
 	
 }
 ?>
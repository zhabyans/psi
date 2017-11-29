<?php
class M_data2 extends CI_Model{
function tampil_data(){
	$this->db->select('barang.*, pendataan_barang.*');
	$this->db->from('pendataan_barang');
	$this->db->join('barang','pendataan_barang.id_barang=barang.id_barang');
	//$this->db->where('pendataan_barang.status_retur','retur');
	return $this->db->get();

//return $this->db->get('pendataan_barang');
}
}
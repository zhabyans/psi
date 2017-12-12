<?php
class M_data2 extends CI_Model{
function tampil_data(){
	$this->db->select('barang.*, user.*, pendataan_barang.*');
	$this->db->from('pendataan_barang');
	$this->db->join('barang','pendataan_barang.id_barang=barang.id_barang');
	$this->db->join('user','pendataan_barang.id_user=user.id_user');
	$this->db->limit(10);
	$this->db->order_by('id_pendataan','DESC');
	return $this->db->get();

//return $this->db->get('pendataan_barang');
}

function cari_data($id){
	$query=$this->db->get_where('pendataan_barang', array('id_barang'=> $id,'tanggal_masuk'=>$this->input->post('tgl')));
		return $query->row();
}


function tampil_data_juga(){
	$this->db->select('barang.*, user.*, pendataan_barang.*, data_pengeluaran.*');
	$this->db->from('data_pengeluaran');
	$this->db->join('barang','data_pengeluaran.id_barang=barang.id_barang');
	$this->db->join('user','data_pengeluaran.id_user=user.id_user');
	$this->db->limit(10);
	$this->db->order_by('id_transaksi','DESC');
	return $this->db->get('pendataan_barang');

//return $this->db->get('pendataan_barang');
}
}
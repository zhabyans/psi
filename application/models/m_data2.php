<?php
class M_data2 extends CI_Model{
function tampil_data(){//vivin
	$this->db->select('barang.*, user.*, pendataan_barang.*');
	$this->db->from('pendataan_barang');
	$this->db->join('barang','pendataan_barang.id_barang=barang.id_barang');
	$this->db->join('user','pendataan_barang.id_user=user.id_user');
	//$this->db->limit(10);
	$this->db->order_by('id_pendataan','DESC');
	return $this->db->get();
}
function cari_data($id){//vivin
	$query=$this->db->get_where('pendataan_barang', array('id_barang'=> $id,'tanggal_masuk'=>$this->input->post('tgl')));
		return $query->row();
}
function cari_id_data(){//zhafran
	$query=$this->db->get_where('pendataan_barang', array('id_pendataan'=> $this->input->post('id')));
	return $query->row();
}
function balik_stok($stok_ahir){//zhafran
	$this->db->where('id_pendataan', $this->input->post('id'));
	$this->db->update('pendataan_barang', array('stok'=>$stok_ahir));
}
function hapus_transaksi(){//zhafran
	$query=$this->db->delete('data_pengeluaran', array('id_transaksi'=> $this->input->post('id_trans')));
	return $query;
}
function tampil_data_juga(){//zhafran
	$this->db->select('barang.*, user.*, data_pengeluaran.*');
	$this->db->from('data_pengeluaran');
	$this->db->join('barang','data_pengeluaran.id_barang=barang.id_barang');
	$this->db->join('user','data_pengeluaran.id_user=user.id_user');
	$this->db->limit(10);
	$this->db->order_by('id_transaksi','DESC');
	return $this->db->get();
}
function pagination(){//vivin
	$this->db->select('COUNT(id_pendataan) AS jlh');
	$this->db->from('pendataan_barang');
	return $this->db->get()->row();
}
}
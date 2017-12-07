<?php
 class mdata_pengeluaran extends CI_Model{
	function daftar_retur(){
	 	$this->db->select('barang.*, pendataan_barang.*');
		$this->db->from('pendataan_barang');
		$this->db->join('barang','pendataan_barang.ID_BARANG = barang.ID_BARANG');
		$this->db->where('pendataan_barang.STATUS_RETUR', 'retur');
		return $this->db->get();
 	}
	function laporan(){
	 	$this->db->select('barang.*, data_pengeluaran.*');
		$this->db->from('data_pengeluaran');
		$this->db->join('barang','data_pengeluaran.ID_BARANG = barang.ID_BARANG');
		$this->db->where('data_pengeluaran.TANGGAL_TERJUAL', '');
		return $this->db->get();
 	}
	function nama_barang(){
		return $this->db->get('barang');
 	}
	function input_barang($id, $id_data, $id_user){
		$data=array(
					'id_pendataan'=>$id_data,
					'id_barang'=>$id,
					'id_user'=>$id_user,
					'tanggal_masuk'=>$this->input->post('tgl'),
					'stok'=>$this->input->post('stok')
		);
		return $this->db->insert('pendataan_barang', $data);
 	}
	
	function input_terjual($id, $id_trans, $id_user,$harga,$total,$id_pendataan){
		$date=date('Y-m-d');
		$data=array(
					'id_pendataan'=>$id_pendataan,
					'id_barang'=>$id,
					'id_user'=>$id_user,
					'id_transaksi'=>$id_trans,
					'tanggal_terjual'=>$date,
					'jumlah_terjual'=>$this->input->post('stok'),
					'total_terjual'=>$total
					);
		return $this->db->insert('data_pengeluaran', $data);
 	}
	
	function cari_id(){
		$query=$this->db->get_where('barang', array('nama_barang'=> $this->input->post('barang')));
		return $query->row();
 	}
	function cari_id_data($id){
		$query=$this->db->get_where('pendataan_barang', array('id_barang'=> $id,'tanggal_masuk'=> $this->input->post('tgl')));
		return $query->row();
 	}
 }
 ?>
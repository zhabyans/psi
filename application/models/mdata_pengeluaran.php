<?php
 class mdata_pengeluaran extends CI_Model{
	function daftar_retur(){
	 	$this->db->select('barang.*, pendataan_barang.*');
		$this->db->from('pendataan_barang');
		$this->db->join('barang','pendataan_barang.ID_BARANG = barang.ID_BARANG');
		$this->db->where('pendataan_barang.STATUS_RETUR', 'retur');
		return $this->db->get();
 	}
	function cari_laporan(){//elma
	 	$this->db->select('barang.*, data_pengeluaran.*');
		$this->db->from('data_pengeluaran');
		$this->db->join('barang','data_pengeluaran.ID_BARANG = barang.ID_BARANG');
		//$this->db->where('data_pengeluaran.TANGGAL_TERJUAL', $this->input->post('bln'));
		$this->db->like('data_pengeluaran.TANGGAL_TERJUAL', '-'.$this->input->post('bln').'-');
		return $this->db->get();
 	}
	function laporan_harian(){//elma
		$this->db->select('barang.*, data_pengeluaran.*');
	 	$this->db->select('SUM(data_pengeluaran.jumlah_terjual) AS jlh');
	 	$this->db->select('SUM(data_pengeluaran.total_terjual) AS ttl');
		$this->db->from('data_pengeluaran');
		$this->db->join('barang','data_pengeluaran.ID_BARANG = barang.ID_BARANG');
		$this->db->where('data_pengeluaran.TANGGAL_TERJUAL', $this->input->post('hari'));
		$this->db->group_by('barang.nama_barang');
		return $this->db->get();
 	}
	function laporan(){//elma
	 	$this->db->select('barang.*, data_pengeluaran.*');
	 	$this->db->select('SUM(data_pengeluaran.jumlah_terjual) AS jlh');
	 	$this->db->select('SUM(data_pengeluaran.total_terjual) AS ttl');
		$this->db->from('data_pengeluaran');
		$this->db->join('barang','data_pengeluaran.ID_BARANG = barang.ID_BARANG');
		//$this->db->where('data_pengeluaran.TANGGAL_TERJUAL', $this->input->post('bln'));
		$this->db->like('data_pengeluaran.TANGGAL_TERJUAL', '-'.$this->input->post('bln').'-');
		$this->db->group_by('barang.nama_barang');
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
	
	function update_stok($id_pendataan,$barang_akhir){
		$data2=array(
					'stok'=>$barang_akhir
		);
		$this->db->where('id_pendataan',$id_pendataan);
		return $this->db->update('pendataan_barang',$data2);
		
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
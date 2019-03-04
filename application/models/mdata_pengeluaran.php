<?php
 class mdata_pengeluaran extends CI_Model{
	function notif_retur(){
	 	$date=date('Y-m-d');
		$this->db->select('barang.NAMA_BARANG, pendataan_barang.TANGGAL_MASUK');
		$this->db->from('pendataan_barang');
		$this->db->join('barang','pendataan_barang.ID_BARANG = barang.ID_BARANG');
		$this->db->where('pendataan_barang.STATUS_RETUR', 'retur');
		$this->db->where('pendataan_barang.TANGGAL_RETUR', $date);
		$this->db->group_by('barang.id_barang');
		return $this->db->get();
 	}
	function daftar_retur(){//jafar
		$date=date('2017-12-06');
	 	$this->db->select('barang.*, pendataan_barang.*');
		$this->db->from('pendataan_barang');
		$this->db->join('barang','pendataan_barang.ID_BARANG = barang.ID_BARANG');
		$this->db->where('pendataan_barang.STATUS_RETUR', 'retur');
		//$this->db->where('pendataan_barang.TANGGAL_RETUR', $date);
		//$this->db->group_by('barang.id_barang');
		$this->db->order_by('pendataan_barang.TANGGAL_RETUR','DESC');
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
		$year=$this->input->post('thn');
	 	$this->db->select('barang.*, data_pengeluaran.*');
	 	$this->db->select('SUM(data_pengeluaran.jumlah_terjual) AS jlh');
	 	$this->db->select('SUM(data_pengeluaran.total_terjual) AS ttl');
		$this->db->from('data_pengeluaran');
		$this->db->join('barang','data_pengeluaran.ID_BARANG = barang.ID_BARANG');
		//$this->db->where('data_pengeluaran.TANGGAL_TERJUAL', $this->input->post('bln'));
		$this->db->like('data_pengeluaran.TANGGAL_TERJUAL', $year.'-'.$this->input->post('bln').'-');
		$this->db->group_by('barang.nama_barang');
		return $this->db->get();
 	}
	function nama_barang(){
		return $this->db->get('barang');
 	}
	function cek_retur(){//jafar
		$date=date('Y-m-d');
		$this->db->where('tanggal_retur <=', $date);
		$this->db->update('pendataan_barang', array('status_retur'=>'retur'));
 	}
	function input_barang($id, $id_data, $id_user, $exp){//vivin
		$data=array(
					'id_pendataan'=>$id_data,
					'id_barang'=>$id,
					'id_user'=>$id_user,
					'tanggal_masuk'=>$this->input->post('tgl'),
					'tanggal_retur'=>$exp,
					'stok'=>$this->input->post('stok')
		);
		return $this->db->insert('pendataan_barang', $data);
 	}
	function input_nama_barang(){//vivin
		$data=array(
					'id_barang'=>'',
					'nama_barang'=>$this->input->post('nama'),
					'harga'=>$this->input->post('harga'),
					'expired'=>$this->input->post('exp')
		);
		return $this->db->insert('barang', $data);
 	}
	function edit_barang(){//jafar
		$this->db->where('id_pendataan', $this->input->post('id'));
		$this->db->update('pendataan_barang', array('stok'=>$this->input->post('stok')));
 	}
	function cari_id(){
		$query=$this->db->get_where('barang', array('id_barang'=> $this->input->post('barang')));
		return $query->row();
 	}
	function cari_nama(){
		$query=$this->db->get_where('barang', array('nama_barang'=> $this->input->post('barang')));
		return $query->row();
 	}
	function cek_nama(){
		$query=$this->db->get_where('barang', array('nama_barang'=> $this->input->post('nama')));
		return $query;
 	}
	function cari_id2($id, $tgl){
		$this->db->select('*');
		$this->db->from('pendataan_barang');
		$this->db->where('id_barang', $id);
		$this->db->where('tanggal_masuk', $tgl);
		$query=$this->db->get();
		return $query;
 	}
	function input_terjual($id, $id_trans, $id_user,$harga,$total,$id_pendataan){//zhafran
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
	function update_stok($id_pendataan,$barang_akhir){//vivin
		$data2=array(
					'stok'=>$barang_akhir
		);
		$this->db->where('id_pendataan',$id_pendataan);
		return $this->db->update('pendataan_barang',$data2);
		
	}
	function cari_id_data($id){
		$query=$this->db->get_where('pendataan_barang', array('id_barang'=> $id,'tanggal_masuk'=> $this->input->post('tgl')));
		return $query->row();
 	}
	function hitung_retur(){//jafar
		$date=date('Y-m-d');
		$this->db->select('COUNT(id_pendataan) as jlh');
		$this->db->from('pendataan_barang');
		$this->db->where('STATUS_RETUR', 'retur');
		$this->db->where('TANGGAL_RETUR', $date);
		$query=$this->db->get();
		return $query;
 	}
	function hapus_barang($id){//vivin
		$query=$this->db->delete('pendataan_barang', array('id_pendataan'=> $id));
		return $query;
 	}
 }
 ?>
<?php
	class Login extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('m_login');
			$this->load->library('session');
			$this->load->helper('url');
		}
		public function index(){
			$this->load->view('login');
		}
		public function pro_login(){
				$user=$_POST['user'];
				$row=$this->m_login->login();
				$id=$row->ID_USER;
				if($row==TRUE){
					/*if($row->sell_status == 'blokir'){
						$this->session->set_flashdata("pesan", "<div class='alert alert-danger text-center'>
					<span class='glyphicon glyphicon-warning-sign'></span> &nbsp; anda diblokir</div>");
					redirect('home');
					}else{*/
					$this->session->set_userdata('id',$id);
					$this->session->set_userdata('user',$user);
					redirect('home');
					//}
				}else{
					$this->session->set_flashdata("pesan", " <i class='fa fa-warning'></i>&nbspPeriksa kembali email dan passwordmu");
					redirect('login');
				}
		}
		public function logout(){
			if($this->session->has_userdata('user')){
				$this->session->sess_destroy();
				redirect('login');
			}
		}
	}
?>
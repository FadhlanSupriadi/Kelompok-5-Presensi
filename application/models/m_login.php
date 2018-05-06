
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class M_login extends CI_Model {	

	public function __construct()
	{
		parent::__construct();
		
	}

	function proses_login(){
		
        //set variabel
		$nama_user = $this->input->post('nama_user');
		$nama = $this->input->post('nama');
		$pass_user=($_POST['pass_user']);
		
        //ambil database
		$query = $this->db->query("Select * from tb_user Where nama_user = '$nama_user' and (pass_user = '$pass_user' or nama = '$nama')");
		if ($query->num_rows() > 0){
			
			$row = $query->row();
			$id_user = $row->id_user;
			$pass_user = $row->pass_user;
			$nama = $row->nama;
			$nip=$row->nip;
		}
		else{
			$info='<div style="color:red">PERIKSA KEMBALI NAMA PENGGUNA DAN PASSWORD ANDA!</div>';
			$this->session->set_userdata('info',$info);

			redirect(base_url().'login');
		}       
	}



}

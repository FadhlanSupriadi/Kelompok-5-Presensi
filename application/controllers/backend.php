<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');


class Backend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_login();
	}

	private function cek_login()
	{
		if ($this->session->userdata('useradmin')) {
			//login sebagai admin
			redirect(base_url().'dashboard');
		}
		// elseif ($this->session->userdata('useradmin')) {
		// 	//login sebagai admin
		// 	redirect(base_url().'kategori');
		// }

		else{
			//kembali ke halaman login
			redirect(base_url().'login');
		}
		
	}

}


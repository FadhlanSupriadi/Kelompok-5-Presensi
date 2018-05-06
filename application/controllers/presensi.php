<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Presensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('useradmin')){            
			redirect(base_url().'backend');
		}
	}

	public function index()
	{
		$data = array(
			'data_presensi' => $this->model->GetPegawaiDivAbs("order by id_presensi desc")->result_array(),
			'nama' => $this->session->userdata('nama'),	
		);
		
		$this->load->view('presensi/data_presensi', $data);
	}
}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

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
            'data_presensi' => $this->adminhr_model->GetPegawaiDivAbs("order by id_presensi desc")->result_array(),
            'nama' => $this->session->userdata('nama'),
        );

        $this->load->view('presensi/data_presensi', $data);
    }

    // hapus presensi
    public function hapuspr($kode = 1){

        $result = $this->adminhr_model->Hapus('tb_presensi', array('id_presensi' => $kode));
        if($result == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'presensi');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'presensi');
        }
    }
}


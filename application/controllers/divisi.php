<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divisi extends CI_Controller {

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
			'nama' => $this->session->userdata('nama'),	
			'status' => 'baru',
			'divisi' => '',
			'id_div' => '',
			'tgl_input_div' => '',
			'data_divisi' => $this->model->GetDiv("order by id_div desc")->result_array(),
		);

		$this->load->view('divisi/data_divisi', $data);
	}

	function editdivisi($kode = 0){
		$tampung = $this->model->GetDiv("where id_div = '$kode'")->result_array();
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'status' => 'lama',
			'tgl_input_div' => $tampung[0]['tgl_input_div'],
			'divisi' => $tampung[0]['divisi'],
			'id_div' => $tampung[0]['id_div'],
			'data_divisi' => $this->model->GetDiv("where id_div != '$kode' order by id_div desc")->result_array()
			);
		$this->load->view('divisi/data_divisi', $data);
	}

	function savedata(){
		if($_POST){
			$status = $_POST['status'];
			$id_div = $_POST['id_div'];
			$divisi = $_POST['divisi'];
			$tgl_input_div = $_POST['tgl_input_div'];
			if($status == "baru"){
				$data = array(
					'id_div' => $id_div,
					'divisi' => $divisi,
					'tgl_input_div' => date("Y-m-d H:i:s"),
					);
				$result = $this->model->Simpan('tb_divisi', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'divisi');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'divisi');
				}
			}else{
				$data = array(
					'divisi' => $divisi
					);
				$result = $this->model->Update('tb_divisi', $data, array('id_div' => $id_div));
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'divisi');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'divisi');
				}
			}
		}else{
			echo('handak baapa nyawa tong!!!');
		}
	}

	function hapuskat($kode = 1){
		
		$result = $this->model->Hapus('tb_divisi', array('id_div' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'divisi');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'divisi');
		}
	}
}

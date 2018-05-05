<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
		$this->load->helper('currency_format_helper');
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
			'data_karyawan' => $this->model->GetKaryawanDiv("order by id_kar desc")->result_array(),
		);

		$this->load->view('karyawan/data_karyawan', $data);
	}

	function addkaryawan()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'optdivisi' => $this->model->GetDiv()->result_array(),
		);
		
		$this->load->view('karyawan/add_karyawan', $data);
	}

	function savedata(){
		$config = array(
			'upload_path' => './assets/upload',
			'allowed_types' => 'gif|jpg|JPG|png',
			'max_size' => '2048',

		);
		$this->load->library('upload', $config);	
		$this->upload->do_upload('file_upload');
		$upload_data = $this->upload->data();

		$id_kar = '';
		$nama_kar = $_POST['nama_kar'];
		$nik = $_POST['nik'];
		$nohp = $_POST['nohp'];
		$pekerjaan = $_POST['pekerjaan'];
		$id_div = $_POST['id_div'];
		$tgl_input_kar = $_POST['tgl_input_kar'];
		$file_name = $upload_data['file_name'];

		$data = array(	
			'id_kar'=> $id_kar,
			'nama_kar' => $nama_kar,
			'nik' => $nik,
			'nohp' => $nohp,
			'pekerjaan' => $pekerjaan,
			'id_div' => $id_div,
			'tgl_input_kar' => date("Y-m-d H:i:s"),
			'foto' => $file_name,
			);
		
		$result = $this->model->Simpan('tb_karyawan', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'karyawan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'karyawan');
		}		
	}

	function editkaryawan($kode = 0){
		$data_karyawan = $this->model->GetKaryawan("where id_kar = '$kode'")->result_array();

		/*menjadikan kategori ke array*/
		$kategori_post_array = array();
		foreach($this->model->GetKaryawan("where id_kar = '$kode'")->result_array() as $kat){
			$kategori_post_array[] = $kat['id_div'];
		}

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'id_kar' => $data_karyawan[0]['id_kar'],
			'nik' => $data_karyawan[0]['nik'],
			'nama_kar' => $data_karyawan[0]['nama_kar'],
			'pekerjaan' => $data_karyawan[0]['pekerjaan'],
			'nohp' => $data_karyawan[0]['nohp'],
			'foto' => $data_karyawan[0]['foto'],
			'tgl_input_kar' => $data_karyawan[0]['tgl_input_kar'],
			'divisi' => $this->model->GetDiv()->result_array(),
			'label_post' => $kategori_post_array,
			);
		$this->load->view('karyawan/edit_karyawan', $data);
	}

	function hapuskar($kode = 1){
		
		$result = $this->model->Hapus('tb_karyawan', array('id_kar' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'karyawan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'karyawan');
		}
	}

	function updatekaryawan(){
		if($_FILES['file_upload']['error'] == 0):
			$config = array(
				'upload_path' => './assets/upload',
				'allowed_types' => 'gif|jpg|JPG|png',
				'max_size' => '2048',
				
				);
		$this->load->library('upload', $config);      
		$this->upload->do_upload('file_upload');
		$upload_data = $this->upload->data();
		$file_name = $upload_data['file_name'];
		else:
			$file_name = $this->input->post('foto');
		endif;
		
		$data = array(
			'id_kar' => $this->input->post('id_kar'),
			'nama_kar' => $this->input->post('nama_kar'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'nohp' => $this->input->post('nohp'),
			'id_div' => $this->input->post('id_div'),
			'tgl_input_kar' => $this->input->post('tgl_input_kar'),
			
			'foto' => $file_name,
			
			);
		
		$res = $this->model->UpdateKaryawan($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'karyawan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'karyawan');
		}
	}

}


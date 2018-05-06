<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
			'data_pegawai' => $this->model->GetPegawaiDiv("order by nip desc")->result_array(),
		);

		$this->load->view('pegawai/data_pegawai', $data);
	}

	function addpegawai()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'optdivisi' => $this->model->GetDiv()->result_array(),
		);
		
		$this->load->view('pegawai/add_pegawai', $data);
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

        $nip = $_POST['nip'];
		$nama_pg = $_POST['nama_pg'];
		$nohp = $_POST['nohp'];
		$pekerjaan = $_POST['pekerjaan'];
		$id_div = $_POST['id_div'];
		$tgl_input_pg = $_POST['tgl_input_pg'];
		$file_name = $upload_data['file_name'];

		$data = array(
            'nip' => $nip,
			'nama_pg' => $nama_pg,
			'nohp' => $nohp,
			'pekerjaan' => $pekerjaan,
			'id_div' => $id_div,
			'tgl_input_pg' => date("Y-m-d H:i:s"),
			'foto' => $file_name,
			);
		
		$result = $this->model->Simpan('tb_pegawai', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'pegawai');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'pegawai');
		}		
	}

	function editpegawai($kode = 0){
		$data_pegawai = $this->model->GetPegawai("where nip = '$kode'")->result_array();

		/*menjadikan kategori ke array*/
		$kategori_post_array = array();
		foreach($this->model->GetPegawai("where nip = '$kode'")->result_array() as $kat){
			$kategori_post_array[] = $kat['id_div'];
		}

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'nip' => $data_pegawai[0]['nip'],
			'nama_pg' => $data_pegawai[0]['nama_pg'],
			'pekerjaan' => $data_pegawai[0]['pekerjaan'],
			'nohp' => $data_pegawai[0]['nohp'],
			'foto' => $data_pegawai[0]['foto'],
			'tgl_input_pg' => $data_pegawai[0]['tgl_input_pg'],
			'divisi' => $this->model->GetDiv()->result_array(),
			'label_post' => $kategori_post_array,
			);
		$this->load->view('pegawai/edit_pegawai', $data);
	}

	function hapuspg($kode = 1){
		
		$result = $this->model->Hapus('tb_pegawai', array('nip' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'pegawai');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'pegawai');
		}
	}

	function updatepegawai(){
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
			'nip' => $this->input->post('nip'),
			'nama_pg' => $this->input->post('nama_pg'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'nohp' => $this->input->post('nohp'),
			'id_div' => $this->input->post('id_div'),
			'tgl_input_pg' => $this->input->post('tgl_input_pg'),
			'foto' => $file_name,
			);
		
		$res = $this->model->UpdatePegawai($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'pegawai');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'pegawai');
		}
	}

}


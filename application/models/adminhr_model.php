<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminhr_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data tabel user
	function GetUser($data) {
        $query = $this->db->get_where('tb_user', $data);
        return $query;
    }

	//ambil data tabel divisi
	public function GetDiv($where= "")
	{
		$data = $this->db->query('select * from tb_divisi '.$where);
		return $data;
	}

	//ambil data tabel pegawai
	public function GetPegawai($where= "")
	{
		$data = $this->db->query('select * from tb_pegawai '.$where);
		return $data;
	}

	//ambil data dari 3 tabel (Controller Presensi.php)
	public function GetPegawaiDivAbs($where= "") {
    $data = $this->db->query('SELECT p.*, q.divisi, r.*
                                FROM tb_pegawai p
                                INNER JOIN tb_presensi r
                                ON(p.nip = r.nip)
                                INNER JOIN tb_divisi q
                                ON(p.id_div = q.id_div)'.$where);
    return $data;
    }

	//ambil data dari 2 tabel (Controller Pegawai.php)
	public function GetPegawaiDiv($where= "") {
    $data = $this->db->query('SELECT p.*, q.divisi
                                FROM tb_pegawai p
                                LEFT JOIN tb_divisi q
                                ON(p.id_div = q.id_div)'.$where);
    return $data;
    }

	//batas crud data
	public function Simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Update($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	// khusus tabel pegawai
	public function UpdatePegawai($data){
        $this->db->where('nip',$data['nip']);
        $this->db->update('tb_pegawai',$data);
    }
	//batas crud data
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data user
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

	public function GetPegawai($where= "")
	{
		$data = $this->db->query('select * from tb_pegawai '.$where);
		return $data;
	}

	public function GetTotPegawai()
	{
		$data = $this->db->query('select * from tb_pegawai group by id_div ');
		return $data;
	}

	public function GetDetPresensi($where = ""){
		return $this->db->query("select tb_presensi.*, tb_pegawai.*, tb_divisi.* from tb_pegawai inner join tb_presensi on tb_presensi.nip=tb_pegawai.nip $where;");
	}

	public function count_all() {
		return $this->db->count_all('tb_pegawai');
	}

	//ambil data dari 3 tabel
	public function GetPegawaiDivAbs($where= "") {
    $data = $this->db->query('SELECT p.*, q.divisi, r.*
                                FROM tb_pegawai p
                                INNER JOIN tb_presensi r
                                ON(p.nip = r.nip)
                                INNER JOIN tb_divisi q
                                ON(p.id_div = q.id_div)'.$where);
    return $data;
    }

	//ambil data dari 2 tabel
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

	function UpdatePegawai($data){
        $this->db->where('nip',$data['nip']);
        $this->db->update('tb_pegawai',$data);
    }
	//batas crud data

    

	function TotalDiv(){
		return $this->db->query("select count(*) as totaldivisi from tb_divisi group by id_div; ");
	}
}

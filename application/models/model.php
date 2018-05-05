<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data user
	function GetUser($data) {
        $query = $this->db->get_where('tb_login', $data);
        return $query;
    }

	//ambil data tabel divisi
	public function GetDiv($where= "")
	{
		$data = $this->db->query('select * from tb_divisi '.$where);
		return $data;
	}
	//ambil data tabel produk
	public function GetKaryawan($where= "")
	{
		$data = $this->db->query('select * from tb_karyawan '.$where);
		return $data;
	}

	public function GetTotKaryawan()
	{
		$data = $this->db->query('select * from tb_karyawan group by id_div ');
		return $data;
	}

	public function GetDetPresensi($where = ""){
		return $this->db->query("select tb_presensi.*, tb_karyawan.*, tb_divisi.* from tb_karyawan inner join tb_presensi on tb_presensi.nik=tb_karyawan.nik $where;");
	}

	public function count_all() {
		return $this->db->count_all('tb_karyawan');
	}

	//ambil data dari 3 tabel
	public function GetKaryawanDivAbs($where= "") {
    $data = $this->db->query('SELECT p.*, q.divisi, r.*
                                FROM tb_karyawan p
                                INNER JOIN tb_presensi r
                                ON(p.nik = r.nik)
                                INNER JOIN tb_divisi q
                                ON(p.id_div = q.id_div)'.$where);
    return $data;
    }

	//ambil data dari 2 tabel
	public function GetKaryawanDiv($where= "") {
    $data = $this->db->query('SELECT p.*, q.divisi
                                FROM tb_karyawan p
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

	function UpdateKaryawan($data){
        $this->db->where('id_kar',$data['id_kar']);
        $this->db->update('tb_karyawan',$data);
    }
	//batas crud data

 //    //model untuk visitor/pengunjung
 //    function GetVisitor($where = ""){
	// 	return $this->db->query("select * from tb_visitor $where");		
	// }

	function GetProductView(){
		return $this->db->query("select sum(counter) as totalview from tb_karyawan where status = 'publish'");
	}
	//batas query pengunjung

	public function GetJabe($where= "")
	{
		$data = $this->db->query('select count(*) as totaldivisi from tb_divisi '.$where);
		return $data;
	}

	function TotalKat(){
		return $this->db->query("select count(*) as totaldivisi from tb_karyawan group by id_div; ");
	}
}

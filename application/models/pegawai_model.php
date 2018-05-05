<?php
class Pegawai_model extends CI_Model{ 

	function pegawai_model()
	{
		parent::__construct();
	}
	 
	/* GET DAT APEGAWAI */
		function cekNikPegawai(){
			$nik=$this->input->post('nik');
			$query=$this->db->query("select nik from tb_karyawan where nik='$nik'");
			return $query->num_rows();
		}
		function cekMasuk(){
			$nik=$this->input->post('nik');
			$datenow=date("Y-m-d");
			$jammasuk="";
			$ceknik=$this->cekNikPegawai();
			if($ceknik==0){
				echo'<hr><label style="font-size:40px;font-family:calibri">NIK TIDAK TERSEDIA </label>';
				return false;
			}
			$query=$this->db->query("select nik,jammasuk from tb_presensi where nik='$nik' and tanggal='$datenow' and kodepresensi='1'");
			if ($query->num_rows() > 0){
				foreach ($query->result() as $data) {
					$jammasuk=$data->jammasuk;
				}
				echo'<hr><label style="font-size:40px;font-family:calibri">Anda Sudah Melakukan Presensi Kedatangan Pada Pukul :</label>';
				echo'<label style="color:red;font-size:50px;font-family:calibri"><br>'.$jammasuk.' !!! </label><a href="#" class="more"></a>';
				return false;
			}	 else {
				 $data=array(
				 'nik'=>$nik,
				 'kodepresensi'=>'1',
				 'jammasuk'=>date("H:i:s"),
				 'tanggal'=>$datenow
				);
				$this->db->trans_start();
				$this->db->insert('tb_presensi',$data);
				$this->db->trans_complete(); 
				echo'<hr><label style="font-size:40px;font-family:calibri">Sukses Melakukan Presensi Kedatangan Pada Pukul:</label><br>';
				echo'<label style="color:green;font-size:50px;font-family:calibri"><br>'.date("H:i:s").'</label>';
			}
		}
		function cekdatang(){
			$nik=$this->input->post('nik');
			$query=$this->db->query("select nik from tb_karyawan where nik='$nik' and  kodepresensi='1'");
			return $query->num_rows();
		}
		function cekPulang(){
			$nik=$this->input->post('nik');
			$datenow=date("Y-m-d");
			$jammasuk="";
			$ceknik=$this->cekNikPegawai();
			if($ceknik==0){
				echo'<hr><label style="font-size:40px;font-family:calibri">NIK TIDAK TERSEDIA </label>';
				return false;
			}
			$query=$this->db->query("select nik,jammasuk from tb_presensi where nik='$nik' and tanggal='$datenow' and kodepresensi='2'");
			if ($query->num_rows() > 0){
				foreach ($query->result() as $data) {
					$jammasuk=$data->jammasuk;
				}
				echo'<hr><label style="font-size:40px;font-family:calibri">Anda Sudah Melakukan Presensi Kepulangan Pada Pukul :</label>';
				echo'<label style="color:red;font-size:50px;font-family:calibri"><br>'.$jammasuk.'</label>';
				return false;
			}	 else {
				 $data=array(
				 'nik'=>$nik,
				 'kodepresensi'=>'2',
				 'jammasuk'=>date("H:i:s"),
				 'tanggal'=>$datenow
				);
				$this->db->trans_start();
				$this->db->insert('tb_presensi',$data);
				$this->db->trans_complete(); 
				echo'<hr><label style="font-size:40px;font-family:calibri">Sukses Melakukan Presensi Kepulangan Pada Pukul:</label><br>';
				echo'<label style="color:green;font-size:50px;font-family:calibri"><br>'.date("H:i:s").'</label>';
			}
		}
		
		function getListpegawai($limit='',$offset=''){
			$query=$this->db->query("select *,tb_karyawan.nama from tb_presensi left join tb_karyawan on tb_presensi.nik=tb_karyawan.nik
			 LIMIT $limit,$offset
			");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$menus[]=$data;
				}
				return $menus;
			}
		}
		function count(){
			$query=$this->db->query("select count(1) as jumlah from tb_presensi");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$menus=$data->jumlah;
				}
				return $menus;
			}
		}
}

?>
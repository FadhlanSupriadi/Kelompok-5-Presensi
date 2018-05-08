<?php
date_default_timezone_set('Asia/Jakarta');

class Pegawai_model extends CI_Model{ 

	function pegawai_model()
	{
		parent::__construct();
	}
	 
	/* GET DATA PEGAWAI */
		function cekNipPegawai(){
			$nip=$this->input->post('nip');
			$query=$this->db->query("select nip from tb_pegawai where nip='$nip'");
			return $query->num_rows();
		}

		function cekMasuk(){
			$nip=$this->input->post('nip');
			$datenow=date("Y-m-d");
			$jampresensi="";
			$ceknip=$this->cekNipPegawai();
			if($ceknip==0){
				echo'<hr><label style="font-size:40px;font-family:calibri">NIP TIDAK TERSEDIA </label>';
				return false;
			}
			$query=$this->db->query("select nip,jampresensi from tb_presensi where nip='$nip' and tanggal='$datenow' and kodepresensi='1'");
			if ($query->num_rows() > 0){
				foreach ($query->result() as $data) {
					$jampresensi=$data->jampresensi;
				}
				echo'<hr><label style="font-size:40px;font-family:calibri">Anda Sudah Melakukan Presensi Kedatangan Pada Pukul :</label>';
				echo'<label style="color:red;font-size:50px;font-family:calibri"><br>'.$jampresensi.' !!! </label><a href="#" class="more"></a>';
				return false;
			}	 else {
				 $data=array(
				 'nip'=>$nip,
				 'kodepresensi'=>'1',
				 'jampresensi'=>date("H:i:s"),
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
			$nip=$this->input->post('nip');
			$query=$this->db->query("select nip from tb_pegawai where nip='$nip' and  kodepresensi='1'");
			return $query->num_rows();
		}

		function cekPulang(){
			$nip=$this->input->post('nip');
			$datenow=date("Y-m-d");
			$jampresensi="";
			$ceknip=$this->cekNipPegawai();
			if($ceknip==0){
				echo'<hr><label style="font-size:40px;font-family:calibri">NIP TIDAK TERSEDIA </label>';
				return false;
			}
			$query=$this->db->query("select nip,jampresensi from tb_presensi where nip='$nip' and tanggal='$datenow' and kodepresensi='2'");
			if ($query->num_rows() > 0){
				foreach ($query->result() as $data) {
					$jampresensi=$data->jampresensi;
				}
				echo'<hr><label style="font-size:40px;font-family:calibri">Anda Sudah Melakukan Presensi Kepulangan Pada Pukul :</label>';
				echo'<label style="color:red;font-size:50px;font-family:calibri"><br>'.$jampresensi.'</label>';
				return false;
			}	 else {
				 $data=array(
				 'nip'=>$nip,
				 'kodepresensi'=>'2',
				 'jampresensi'=>date("H:i:s"),
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
			$query=$this->db->query("select *,tb_pegawai.nama from tb_presensi left join tb_pegawai on tb_presensi.nip=tb_pegawai.nip
			 LIMIT $limit,$offset
			");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$menus[]=$data;
				}
				return $menus;
			}
		}
}

?>
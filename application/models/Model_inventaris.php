<?php
 	 class Model_inventaris extends CI_Model{
 	 	function __construct(){
 	 		parent:: __construct();
 	 	
	 	}
	 	function jenis(){
	 		return $this->db->get('jenis');
	 	}
	 	function qw($cel, $table, $prop){
	 		return $this->db->query("SELECT $cel FROM $table $prop");
	 	}
	 	function simpan_jenis($table,$value){
	 		return $this->db->insert($table,$value);
	 	}
	 	function edit_jenis($table,$where,$value){
	 		$this->db->where('id_jenis',$where);
	 		return $this->db->update($table,$value);
	 	}
	 	function hapus_jenis($table,$where,$value){
	 		$this->db->where('id_jenis',$where);
	 		return $this->db->delete($table);
	 	}
	 	function ruang(){
	 		return $this->db->get('ruang');
	 	}
	 	function simpan_ruang($table,$value){
	 		return $this->db->insert($table,$value);
	 	}
	 	function edit_ruang($table,$where,$value){
	 		$this->db->where('id_ruang',$where);
	 		return $this->db->update($table,$value);
	 	}
	 	function hapus_ruang($table,$where,$value){
	 		$this->db->where('id_ruang',$where);
	 		return $this->db->delete($table);
	 	}
	 	function level(){
	 		return $this->db->get('level');
	 	}
	 	function petugas(){
	 		return $this->db->get('petugas');
	 	}
	 	function simpan_petugas($table,$value){
	 		return $this->db->insert($table,$value);
	 	}
	 	function edit_petugas($table,$where,$value){
	 		$this->db->where('id_petugas',$where);
	 		return $this->db->update($table,$value);
	 	}
	 	function hapus_petugas($table,$where,$value){
	 		$this->db->where('id_petugas',$where);
	 		return $this->db->delete($table);
	 	}
	 	function pegawai(){
	 		return $this->db->get('pegawai');
	 	}
	 	function simpan_pegawai($table,$value){
	 		return $this->db->insert($table,$value);
	 	}
	 	function edit_pegawai($table,$where,$value){
	 		$this->db->where('id_pegawai',$where);
	 		return $this->db->update($table,$value);
	 	}
	 	function hapus_pegawai($table,$where,$value){
	 		$this->db->where('id_pegawai',$where);
	 		return $this->db->delete($table);
	 	}
	 	function inventaris(){
	 		return $this->db->get('inventaris');
	 	}
	 	function simpan_inventaris($table,$value){
	 		return $this->db->insert($table,$value);
	 	}
	 	function edit_inventaris($table,$where,$value){
	 		$this->db->where('id_inventaris',$where);
	 		return $this->db->update($table,$value);
	 	}
	 	function hapus_inventaris($table,$where,$value){
	 		$this->db->where('id_inventaris',$where);
	 		return $this->db->delete($table);
	 	}
		function hapus_detail($table,$where){
	 		$this->db->where('id_detail_pinjam',$where);
	 		return $this->db->delete($table);
	 	}

	 	public function check_login($table,$data)
	 	{
	 		return $this->db->get_where($table,$data);
	 	}

	 	public function nomat_pinjam()
	 	{
	 		$qw=$this->model_inventaris->qw('*','peminjaman','ORDER BY id_peminjaman DESC');
			$data=$qw->row_array();
			$kd=$data['id_peminjaman'];
			$ambil=substr($kd,5,8 );
			$jml=$ambil + 1;
			if($jml < 10){
			$nomot="PNJM-00".$jml;
			}elseif($jml > 9 && $jml <=99){
			$nomot = "PNJM-0".$jml;
			}else{
			$nomot = "PNJM-".$jml;
			}
			return $nomot;
	 	}

	 	public function simpandetailpinjam($data)
	 	{
	 		return $this->db->insert("detail_pinjam",$data);
	 	}

	 	public function simpanpinjamtran($data)
	 	{
	 		return $this->db->insert("peminjaman",$data);
	 	}	
 	 }
?>
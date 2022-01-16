<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_inventaris');
	}

	public function index()
	{
		
		$data=array(
			"home"=>"laporan_pinjam",
			"judul"=>"Laporan Peminjaman",
		);
		$this->load->view('index',$data);
	}

	public function lapin(){
		$this->load->view('content/tabel_lap_pinjam');
	}

	public function laporan()
	{
		$data=array(
			'qw'=>$this->db->query(" SELECT peminjaman.*,pegawai.*,inventaris.* FROM peminjaman INNER JOIN detail_pinjam ON peminjaman.id_peminjaman=detail_pinjam.id_peminjaman INNER JOIN inventaris ON inventaris.id_inventaris=detail_pinjam.id_inventaris INNER JOIN pegawai ON peminjaman.id_pegawai=pegawai.id_pegawai WHERE peminjaman.status_peminjaman='Pinjam'")->result(),
			);
		$this->load->view('content/tabel_lap_pinjam',$data);
	}

}

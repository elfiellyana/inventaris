
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanharikem extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_inventaris');
	}
	public function index()
	{
		
		$data=array(
			"home"=>"content/laporan_haripinjam",
			"judul"=>"Laporan peminjaman Hari",
		);
		$this->load->view('index',$data);
	}
	public function lapinhari(){
		$har=$this->input->post('tanggal_awal');
		$hari=$this->input->post('tanggal_akhir');
		$data['qw']=$this->Model_inventaris->qw("peminjaman.*,pegawai.*,detail_pinjam.*,inventaris.*","peminjaman","INNER JOIN detail_pinjam ON peminjaman.id_peminjaman=detail_pinjam.id_peminjaman INNER JOIN inventaris ON inventaris.id_inventaris=detail_pinjam.id_inventaris INNER JOIN pegawai ON peminjaman.id_pegawai=pegawai.id_pegawai WHERE peminjaman.status_peminjaman='Pinjam' AND peminjaman.tanggal_pinjam BETWEEN '$har' AND '$hari'
")->result();
		$this->load->view('content/tabel_lap_pinjamhari',$data);
	}

	public function laporan1()
	{
		$data=array(
			'qw'=>$this->Model_inventaris->qw("peminjaman.*,pegawai.*,detail_pinjam.*,inventaris.*","peminjaman","INNER JOIN detail_pinjam ON peminjaman.id_peminjaman=detail_pinjam.id_peminjaman INNER JOIN inventaris ON inventaris.id_inventaris=detail_pinjam.id_inventaris INNER JOIN pegawai ON peminjaman.id_pegawai=pegawai.id_pegawai WHERE peminjaman.status_peminjaman='XXXXXX'
")->result(),
			);
		$this->load->view('content/tabel_lap_pinjamhari',$data);
	}

}

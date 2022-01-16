<?php
 	 class Control extends CI_Controller{
 	 	function __construct(){
 	 		parent:: __construct();
 	 		$this->load->model('model_inventaris');

 	 		
 	 	}
 	 	function page(){
 	 		if ($this->session->userdata('user')=="") {
 	 			redirect("control/login");
 	 		}else{
 	 		$page=$this->uri->segment(3);
 	 		if(empty($page)){
 	 			$page='home';
 	 		}
 	 		$data['home']=$page;
 	 		if($page=="jenis_barang"){
 	 			$data['tamp_jen']=$this->model_inventaris->qw('*','jenis','')->result();
 	 			$this->load->view('index',$data);
 	 		}elseif($page=="home"){
 	 			$data['home']='home';
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="pengembalian") {
 	 			$data['pengembalian']='pengembalian';
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="laporan_pinjam") {
 	 			$data['laporan_pinjam']='laporan_pinjam';
 	 			$this->load->view('index',$data);
 	 		}
 	 		elseif ($page=="laporan_kembali") {
 	 			$data['laporan_kembali']='laporan_kembali';
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="laporan_pinjamhari") {
 	 			$data['laporan_pinjamhari']='laporan_pinjamhari';
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="laporan_kembalihari") {
 	 			$data['laporan_kembalihari']='laporan_kembalihari';
 	 			$this->load->view('index',$data);
 	 		}
 	 		elseif($page=="f_jenis"){
 	 			$id_jenis=$this->uri->segment(4);
 	 			if (empty($id_jenis)) {
 	 				$data['judul']='Form Input Jenis Barang';
 	 				$data['open']='Control/simpan_jenis';
 	 				$data['value']='Simpan';
 	 				$data['status']='simpan';
 	 				$data['hsl']=$this->model_inventaris->qw('*','jenis',"WHERE id_jenis=''");
 	 			}else{
 	 				$data['judul']='Form Edit Jenis Barang';
 	 				$data['open']='Control/edit_jenis';
 	 				$data['value']='Edit';
 	 				$data['status']='edit';
 	 				$data['hsl']=$this->model_inventaris->qw('*','jenis',"WHERE id_jenis='$id_jenis'");
 	 			}
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="ruang") {
 	 			$data['tamp_rung']=$this->model_inventaris->qw('*','ruang','')->result();
 	 			$this->load->view('index',$data);
 	 		}elseif($page=="f_ruang"){
 	 			$id_ruang=$this->uri->segment(4);
 	 			if (empty($id_ruang)) {
 	 				$data['judul']='Form Input Ruang';
 	 				$data['open']='Control/simpan_ruang';
 	 				$data['value']='Simpan';
 	 				$data['status']='simpan';
 	 				$data['hsl']=$this->model_inventaris->qw('*','ruang',"WHERE id_ruang=''");
 	 			}else{
 	 				$data['judul']='Form Edit Ruang';
 	 				$data['open']='Control/edit_ruang';
 	 				$data['value']='Edit';
 	 				$data['status']='edit';
 	 				$data['hsl']=$this->model_inventaris->qw('*','ruang',"WHERE id_ruang='$id_ruang'");
 	 			}
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="level") {
 	 			$data['tamp_lev']=$this->model_inventaris->qw('*','level','')->result();
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="pinjam") {
 	 			$data['tamp_pin']=$this->model_inventaris->qw('*','peminjaman','')->result();
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="petugas") {
 	 			$data['tamp_pet']=$this->model_inventaris->qw('petugas.id_petugas,petugas.username,petugas.password,petugas.nama_petugas,level.nama_level','petugas','inner join level on petugas.id_level=level.id_level')->result();
 	 			$this->load->view('index',$data);
 	 		}elseif($page=="f_petugas"){
 	 			$id_petugas=$this->uri->segment(4);
 	 			if (empty($id_petugas)) {
 	 				$data['judul']='Form Input Petugas';
 	 				$data['open']='Control/simpan_petugas';
 	 				$data['value']='Simpan';
 	 				$data['status']='simpan';
 	 				$data['hsl']=$this->model_inventaris->qw('*','petugas',"WHERE id_petugas=''");
 	 			}else{
 	 				$data['judul']='Form Edit Petugas';
 	 				$data['open']='Control/edit_petugas';
 	 				$data['value']='Edit';
 	 				$data['status']='edit';
 	 				$data['hsl']=$this->model_inventaris->qw('*','petugas',"WHERE id_petugas='$id_petugas'");
 	 			}
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="pegawai") {
 	 			$data['tamp_peg']=$this->model_inventaris->qw('*','pegawai','')->result();
 	 			$this->load->view('index',$data);
 	 		}
 	 		elseif($page=="f_pegawai"){
 	 			$id_pegawai=$this->uri->segment(4);
 	 			if (empty($id_pegawai)) {
 	 				$data['judul']='Form Input Pegawai';
 	 				$data['open']='Control/simpan_pegawai';
 	 				$data['value']='Simpan';
 	 				$data['status']='simpan';
 	 				$data['hsl']=$this->model_inventaris->qw('*','pegawai',"WHERE id_pegawai=''");
 	 			}else{
 	 				$data['judul']='Form Edit Pegawai';
 	 				$data['open']='Control/edit_pegawai';
 	 				$data['value']='Edit';
 	 				$data['status']='edit';
 	 				$data['hsl']=$this->model_inventaris->qw('*','pegawai',"WHERE id_pegawai='$id_pegawai'");
 	 			}
 	 			$this->load->view('index',$data);
 	 		}elseif($page=="laporan_pinjam"){
			$data['tamp_laporan']=$this->model_inventaris->qw('peminjaman')->result();
			$this->load->view('index',$data);
			}elseif ($page=="inventaris") {
 	 			$data['tamp_inven']=$this->model_inventaris->qw('inventaris.id_inventaris,inventaris.nama,inventaris.kondisi,inventaris.keterangan,inventaris.jumlah,jenis.nama_jenis,inventaris.tanggal_register,ruang.nama_ruang,inventaris.kode_inventaris,petugas.nama_petugas','inventaris','inner join jenis on inventaris.id_jenis=jenis.id_jenis inner join ruang on inventaris.id_ruang=ruang.id_ruang inner join petugas on inventaris.id_petugas=petugas.id_petugas')->result();
 	 			$this->load->view('index',$data);
 	 		}elseif($page=="f_inventaris"){ 
 	 			$id_inventaris=$this->uri->segment(4);
 	 			if (empty($id_inventaris)) {
 	 				$data['judul']='Form Input Inventaris';
 	 				$data['open']='Control/simpan_inventaris';
 	 				$data['value']='Simpan';
 	 				$data['status']='simpan';
 	 				$data['hsl']=$this->model_inventaris->qw('*','inventaris',"WHERE id_inventaris=''");
 	 			}else{
 	 				$data['judul']='Form Edit Inventaris';
 	 				$data['open']='Control/edit_inventaris';
 	 				$data['value']='Edit';
 	 				$data['status']='edit';
 	 				$data['hsl']=$this->model_inventaris->qw('*','inventaris',"WHERE id_inventaris='$id_inventaris'");
 	 			}
 	 			$this->load->view('index',$data);
 	 		}elseif ($page=="peminjaman") {
 	 			$data=array(
 	 				'home'=>'peminjaman',
 	 			);
 	 			$this->load->view('index',$data);
 	 			}	
 	 		}
 	 		
	 	}
	 	function simpan_jenis(){
	 		$ar=array(
	 			'id_jenis'=>$this->input->post('id_jenis'),
	 			'nama_jenis'=>$this->input->post('nama_jenis'),
	 			'kode_jenis'=>$this->input->post('kode_jenis'),
	 			'keterangan'=>$this->input->post('keterangan')
	 		);
	 		$this->model_inventaris->simpan_jenis('jenis',$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Simpan !!!');
	 		redirect('Control/page/jenis_barang');
	 	}
	 	function edit_jenis(){
	 		$id=$this->input->post('id');
	 		$ar=array(
	 			'id_jenis'=>$this->input->post('id_jenis'),
	 			'nama_jenis'=>$this->input->post('nama_jenis'),
	 			'kode_jenis'=>$this->input->post('kode_jenis'),
	 			'keterangan'=>$this->input->post('keterangan')
	 		);
	 		$this->model_inventaris->edit_jenis('jenis',$id,$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Edit !!!');
	 		redirect('Control/page/jenis_barang');
	 	}
	 	function hapus_jenis(){
	 		$id_jenis=$this->uri->segment(3);
	 		$this->model_inventaris->hapus_jenis('jenis',$id_jenis);
	 		$this->session->set_flashdata('pesan','Berhasil di Hapus !!!');
	 		redirect('Control/page/jenis_barang');	
	 	}
	 	function simpan_ruang(){
	 		$ar=array(
	 			'id_ruang'=>$this->input->post('id_ruang'),
	 			'nama_ruang'=>$this->input->post('nama_ruang'),
	 			'kode_ruang'=>$this->input->post('kode_ruang'),
	 			'keterangan'=>$this->input->post('keterangan')
	 		);
	 		$this->model_inventaris->simpan_ruang('ruang',$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Simpan !!!');
	 		redirect('Control/page/ruang');
	 	}
	 	function edit_ruang(){
	 		$id=$this->input->post('id');
	 		$ar=array(
	 			'id_ruang'=>$this->input->post('id_ruang'),
	 			'nama_ruang'=>$this->input->post('nama_ruang'),
	 			'kode_ruang'=>$this->input->post('kode_ruang'),
	 			'keterangan'=>$this->input->post('keterangan')
	 		);
	 		$this->model_inventaris->edit_ruang('ruang',$id,$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Edit !!!');
	 		redirect('Control/page/ruang');
	 	}
	 	function hapus_ruang(){
	 		$id_ruang=$this->uri->segment(3);
	 		$this->model_inventaris->hapus_ruang('ruang',$id_ruang);
	 		redirect('Control/page/ruang');	
	 	}
	 	function simpan_petugas(){
	 		$ar=array(
	 			'id_petugas'=>$this->input->post('id_petugas'),
	 			'username'=>$this->input->post('username'),
	 			'password'=>$this->input->post('password'),
	 			'nama_petugas'=>$this->input->post('nama_petugas'),
	 			'id_level'=>$this->input->post('id_level')
	 		);
	 		$this->model_inventaris->simpan_petugas('petugas',$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Simpan !!!');
	 		redirect('Control/page/petugas');
	 	}
	 	function edit_petugas(){
	 		$id=$this->input->post('id');
	 		$ar=array(
	 			'id_petugas'=>$this->input->post('id_petugas'),
	 			'username'=>$this->input->post('username'),
	 			'password'=>$this->input->post('password'),
	 			'nama_petugas'=>$this->input->post('nama_petugas'),
	 			'id_level'=>$this->input->post('id_level')
	 		);
	 		$this->model_inventaris->edit_petugas('petugas',$id,$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Edit !!!');
	 		redirect('Control/page/petugas');
	 	}
	 	function hapus_petugas(){
	 		$id_petugas=$this->uri->segment(3);
	 		$this->model_inventaris->hapus_petugas('petugas',$id_petugas);
	 		redirect('Control/page/petugas');	
	 	}
	 	function simpan_pegawai(){
	 		$ar=array(
	 			'id_pegawai'=>$this->input->post('id_pegawai'),
	 			'nama_pegawai'=>$this->input->post('nama_pegawai'),
	 			'nip'=>$this->input->post('nip'),
	 			'alamat'=>$this->input->post('alamat')
	 		);
	 		$this->model_inventaris->simpan_pegawai('pegawai',$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Simpan !!!');
	 		redirect('Control/page/pegawai');
	 	}
	 	function edit_pegawai(){
	 		$id=$this->input->post('id');
	 		$ar=array(
	 			'id_pegawai'=>$this->input->post('id_pegawai'),
	 			'nama_pegawai'=>$this->input->post('nama_pegawai'),
	 			'nip'=>$this->input->post('nip'),
	 			'alamat'=>$this->input->post('alamat')
	 		);
	 		$this->model_inventaris->edit_pegawai('pegawai',$id,$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Edit !!!');
	 		redirect('Control/page/pegawai');
	 	}
	 	function hapus_pegawai(){
	 		$id_pegawai=$this->uri->segment(3);
	 		$this->model_inventaris->hapus_pegawai('pegawai',$id_pegawai);
	 		redirect('Control/page/pegawai');	
	 	}
	 	function simpan_inventaris(){
	 		$ar=array(
	 			'id_inventaris'=>$this->input->post('id_inventaris'),
	 			'nama'=>$this->input->post('nama'),
	 			'kondisi'=>$this->input->post('kondisi'),
	 			'keterangan'=>$this->input->post('keterangan'),
	 			'jumlah'=>$this->input->post('jumlah'),
	 			'id_jenis'=>$this->input->post('id_jenis'),
	 			'tanggal_register'=>$this->input->post('tanggal_register'),
	 			'id_ruang'=>$this->input->post('id_ruang'),
	 			'kode_inventaris'=>$this->input->post('kode_inventaris'),
	 			'id_petugas'=>$this->input->post('id_petugas')
	 		);
	 		$this->model_inventaris->simpan_inventaris('inventaris',$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Simpan !!!');
	 		redirect('Control/page/inventaris');
	 	}
	 	function edit_inventaris(){
	 		$id=$this->input->post('id');
	 		$ar=array(
	 			'id_inventaris'=>$this->input->post('id_inventaris'),
	 			'nama'=>$this->input->post('nama'),
	 			'kondisi'=>$this->input->post('kondisi'),
	 			'keterangan'=>$this->input->post('keterangan'),
	 			'jumlah'=>$this->input->post('jumlah'),
	 			'id_jenis'=>$this->input->post('id_jenis'),
	 			'tanggal_register'=>$this->input->post('tanggal_register'),
	 			'id_ruang'=>$this->input->post('id_ruang'),
	 			'kode_inventaris'=>$this->input->post('kode_inventaris'),
	 			'id_petugas'=>$this->input->post('id_petugas')
	 		);
	 		$this->model_inventaris->edit_inventaris('inventaris',$id,$ar);
	 		$this->session->set_flashdata('pesan','Berhasil di Edit !!!');
	 		redirect('Control/page/inventaris');
	 	}
	 	function hapus_inventaris(){
	 		$id_inventaris=$this->uri->segment(3);
	 		$this->model_inventaris->hapus_inventaris('inventaris',$id_inventaris);
	 		redirect('Control/page/inventaris');	
	 	}
	 	public function hapus_detail()
	 	{
	 		$id=$this->input->post("id_detail");
	 		$this->model_inventaris->hapus_detail('detail_pinjam',$id);
	 		echo"ok";
	 	}
	 	function simpan_pengembalian(){
		$ar=array(
			'id_peminjaman'=>$this->input->post('id_peminjaman'),
			'tanggal_pinjam'=>$this->input->post('tgl_pinjam'),
			'tanggal_kembali'=>$this->input->post('tgl_kembali'),
			'status_peminjaman'=>$this->input->post('status_peminjaman'),
			'id_pegawai'=>$this->input->post('id_pegawai')
		);
		$this->model_inventaris->simpan_peminjaman('peminjaman',$ar);
		redirect('Control/page/peminjaman');
	
	}
function edit_pengembalian(){
	$id=$this->input->post('id');
		$ar=array(
			'id_peminjaman'=>$this->input->post('id_peminjaman'),
			'tanggal_pinjam'=>$this->input->post('tgl_pinjam'),
			'tanggal_kembali'=>$this->input->post('tgl_kembali'),
			'status_peminjaman'=>$this->input->post('status_peminjaman'),
			'id_pegawai'=>$this->input->post('id_pegawai')
		);
		$this->model_inventaris->edit_peminjaman('peminjaman',$id,$ar);
		redirect('Control/page/peminjaman');
	}
	function hapus_pengembalian($nis){
		$this->model_inventaris->hapus_pengembalian('peminjaman',$nis);
		redirect('Control/page/pengembalian');
	}
function kembalikan(){
            $id_peminjaman=$this->uri->segment(3);
            $lol=$this->db->query("SELECT * FROM detail_pinjam WHERE id_peminjaman='$id_peminjaman'");
            $lol->row_array();
            foreach ($lol->result() as $data) {
                $cari=$this->db->query("SELECT * FROM inventaris WHERE id_inventaris='$data->id_inventaris'")->row_array();
                $id['id_inventaris']=$data->id_inventaris;
                $data=array(
                    'jumlah'=>intval($cari['jumlah']+$data->jumlah_pinjam),
                );
                $this->db->update("inventaris",$data,$id);
            }
            $ar=array(
                'status_peminjaman'=>'Kembali'
            );
            $this->db->where('id_peminjaman',$id_peminjaman);
            $simpan=$this->db->update('peminjaman',$ar);
            $this->session->set_flashdata("Berhasil","Berhasil Di Kembalikan");
  			redirect('Control/page/pengembalian');
        }
             function laporan(){
                $bulan=$this->uri->segment(3);
                $tahun=$this->uri->segment(4);
                $data['qw']=$this->model_inventaris->qw("peminjaman.id_peminjaman,peminjaman.tanggal_pinjam,peminjaman.tanggal_kembali,pegawai.nama_pegawai,peminjaman.status_peminjaman","peminjaman","inner join pegawai on peminjaman.id_pegawai=pegawai.id_pegawai WHERE month(peminjaman.tanggal_pinjam)='$bulan' and year(peminjaman.tanggal_pinjam)='$tahun'")->result();
                $this->load->view('content/laporan',$data);
            }




	 	public function login()
	 	{
	 		$this->load->view('content/login');
	 	}

	 	public function aksi_lol()
	 	{
	 		$username=$this->input->post('username');
	 		$password=$this->input->post('password');
	 		$datalogin=array(
	 			'username'=>$username,
	 			'password'=>$password,
	 		);

	 		$check=$this->db->query("SELECT petugas.*,level.nama_level FROM petugas inner join level on petugas.id_level=level.id_level WHERE petugas.username='$username' AND petugas.password='$password'");
	 		
	 		if ($check->num_rows() <= 0) {
	 			$this->session->set_flashdata("Gagal","Username atau Password Salah !!!");
	 			return redirect('Control/login');
	 		}else{
	 			$data_load=$check->row_array();
	 			$data_sesi=array(
	 				'user'=>$data_load['username'],
	 				'nama'=>$data_load['nama_petugas'],
	 				'id_level'=>$data_load['nama_level'],
	 				'id_petugas'=>$data_load['id_petugas'],
	 			);
	 			$data=array(
	 				'home'=>'home',
	 			);
	 			$this->session->set_userdata($data_sesi);
	 			$this->load->view('index',$data);
	 		}
	 	}
	 	public function logout()
	 	{
	 		$this->session->sess_destroy();
	 		$this->session->set_flashdata("Keluar","Anda Sudah Keluar");
	 		$this->load->view("content/login");
	 	}
	 	public function panggil_kotak()
	 	{
	 		$id=$this->model_inventaris->nomat_pinjam();
	 		$data=array(
	 			'database'=>$this->db->query("SELECT detail_pinjam.*,inventaris.* FROM detail_pinjam INNER JOIN inventaris ON detail_pinjam.id_inventaris=inventaris.id_inventaris WHERE detail_pinjam.id_peminjaman='$id'")->result(),
	 		);
	 		$this->load->view('content/tabel_detail',$data);
	 	}
	 	public function tabel()
	 	{
	 		$data=array(
	 					'tampil_pinjam'=> $this->db->query("SELECT peminjaman.*,detail_pinjam.*,inventaris.* FROM peminjaman INNER join detail_pinjam on peminjaman.id_peminjaman=detail_pinjam.id_peminjaman inner join inventaris on detail_pinjam.id_inventaris=inventaris.id_inventaris")->result(),
	 				);
	 		$this->load->view("content/tabel_kembali",$data);
	 	}
	 	public function simpandetailpinjam()
	 	{
	 		$lol=$this->input->post('id_peminjaman');
	 	 	$in=$this->input->post('id_inventaris');
	 	 	$kueri=$this->db->query("SELECT * FROM detail_pinjam WHERE id_peminjaman='$lol' AND id_inventaris='$in'")->row_array();
	 	 	if ($kueri['id_inventaris']!="") {
	 	 		echo"ada";
	 	 	}else{
	 		$data=array(
	 			'id_peminjaman'=>$this->input->post('id_peminjaman'),
	 			'jumlah_pinjam'=>$this->input->post('jumlah_pinjam'),
	 			'id_inventaris'=>$this->input->post('id_inventaris'),
	 		);	
	 		$d=$this->model_inventaris->simpandetailpinjam($data);
	 		if ($d) {
	 			echo"ok";
	 		}else{
	 			echo"ggl";
	 		}
	 		}
	 	}
	 	public function simpanpinjamtran()
	 	{
	 		$data=array(
	 			'id_peminjaman'=>$this->input->post("id_peminjaman"),
	 			'id_pegawai'=>$this->input->post("id_pegawai"),
	 			'tanggal_pinjam'=>$this->input->post("tanggal_pinjam"),
	 			'tanggal_kembali'=>$this->input->post("tanggal_kembali"),
	 			'status_peminjaman'=>$this->input->post("status_peminjaman"),
	 		);
	 		$d=$this->model_inventaris->simpanpinjamtran($data);
	 		if ($d) {
	 			echo"ok";
	 			$this->session->set_flashdata('pesan','Berhasil di Simpan !!!');
	 		}else{
	 			echo"ggl";
	 		};

	 	}

 	 }
?>
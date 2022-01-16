<?php 
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
?>
<div class="card">
	<div class="card-body">
		<div style="text-align: center; font-family: times;" class="col-md-12">
	<h2>Laporan Pengembalian Hari</h2>
	<h3>SMK Wikrama 1 Jepara</h3>	
</div>
<table class="table table-bordered" style="border-collapse: collapse; text-align: center" border="1">
	<tr>
		<th>No.</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>ID Peminjaman</th>
		<th>Nama</th>
		<th>Tanggal Pinjam</th>
		<th>Tanggal Kembali</th>
		<th>Kondisi</th>
		<th>Status</th>
	</tr>
	<?php
	$no=1;
	
		foreach($qw as $tampil){
	?>
	<tr>
		<td><?php echo$no++ ?></td>
		<td><?php echo$tampil->nip; ?></td>
		<td><?php echo$tampil->nama_pegawai; ?></td>
		<td><?php echo$tampil->id_peminjaman; ?></td>
		<td><?php echo$tampil->nama; ?></td>
		<td><?php echo$tampil->tanggal_pinjam; ?></td>
		<td><?php echo$tampil->tanggal_kembali; ?></td>
		<td><?php echo$tampil->kondisi; ?></td>
		<td><?php echo$tampil->status_peminjaman; ?></td>
	</tr>
	<?php 
		}
	 ?>
</table>
<br>
<div class="kotak">
	<div style="width:50%;float: left; font-family: times;">
		<div style="text-align: center; font-family: times;">
		</div>
	</div>
	<div style="width:50%;float: right">
		<div style="text-align: center;">
			<div class="form-group">
			<p><?php echo tanggal_indo(date('Y-m-d'),true) ?></p>
			<p><?php echo$this->session->userdata('id_level') ?></p>
			<br>
			<br>
			<p><b><?php echo$this->session->userdata('nama') ?></b></p>
		</div>
		</div>
	</div>
</div>
	</div>
</div>

<style type="text/css">
	.kotak::after{
		display: block;clear: both;content:''
	}
</style>
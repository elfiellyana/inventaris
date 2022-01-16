<table class="table table-bordered table-striped">
	<tr>
		<th>Id Peminjaman</th>
		<th>Nama Barang</th>
		<th>Jumlah Barang </th>
		<th>Jumlah Pinjam</th>
		<th>Kondisi</th>
		<th>#</th>
	</tr>
	<?php 
	foreach ($database as $data) {
	?>
	<tr>
		<td><?php echo$data->id_peminjaman ?></td>
		<td><?php echo$data->nama ?></td>
		<td><?php echo$data->jumlah ?></td>
		<td><?php echo$data->jumlah_pinjam ?></td>
		<td><?php echo$data->kondisi ?></td>
		<td>
			<button class="btn btn-danger hapus_jajal" onclick="hapus_detail_pinjam('<?php echo $data->id_detail_pinjam ?>')"><span class="fa fa-trash"></span> Hapus</button>
		</td>
	</tr>
	<?php
	}
	 ?>
</table>

<script type="text/javascript">
		function hapus_detail_pinjam(kp){
			$.ajax({
			type:'POST',
			url:"<?php echo site_url('Control/hapus_detail') ?>",
			data:{
				"id_detail":kp,
			},
			success:function(hasil){
				$("#kotak-detail").load('<?php echo site_url("Control/panggil_kotak") ?>');
                console.log("ok tambah");
			}
			});
		}
</script>
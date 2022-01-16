<div class="card">
  <div class="card-body">
    <table class="table table-striped order-table">
  <tr>
    <th>Id Peminjaman</th>
    <th>Nama Barang</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
    <th>Id Pegawai</th>
    <th>Action</th>
  </tr>
  <?php 
foreach ($tampil_pinjam as $data){
   ?>
  <tr>
    <td><?php echo $data->id_peminjaman; ?></td>
    <td><?php echo $data->nama; ?></td>
    <td><?php echo $data->tanggal_pinjam; ?></td>
    <td><?php echo $data->tanggal_kembali; ?></td>
    <td><span class="badge badge-success"><?php echo $data->status_peminjaman; ?></span></td>
    <td><?php echo $data->id_pegawai; ?></td>
    <td>
      <a href="<?php echo site_url('Control/kembalikan');?>/<?php echo $data->id_peminjaman;?>" class="btn btn-sm btn-flat btn-info">Pilih</a>
    </td>
  </tr>
<?php } ?>
</table>
  </div>
</div>

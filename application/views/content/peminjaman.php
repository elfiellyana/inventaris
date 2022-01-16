<?php 
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
  };
 ?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form Peminjaman</h5>

            <div class="card-body">
                <div class="table-responsive table-responsive-data2">
                        <?php 
                        if (!empty($this->session->flashdata('pesan'))) {
                            echo '
                            <div class="alert alert-success">
                            '.$this->session->flashdata('pesan').'
                            </div>
                            ';
                        }
                        ?>
                    </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>ID Peminjaman</label>
                        <input type="text" readonly id="id_peminjaman_satu" class="form-control" value="<?php echo $nomot ?>">
                        <input type="" hidden="" id="id_peminjaman" value="<?php echo $nomot ?>">
                    </div>
                </div>   
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>ID Inventaris</label>
                        <input type="text" data-toggle="modal" data-target="#exampleModal" id="id_inventaris" name="id_inventaris" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama" id="nama" class="form-control" disabled="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Kondisi</label>
                        <input type="text" name="kondisi"  id="kondisi" class="form-control" disabled="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" disabled="">
                    </div>
                </div>   
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Ruang</label>
                        <input type="text" name="nama_ruang" id="nama_ruang" class="form-control" disabled="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>ID Pegawai</label>
                        <input type="text" id="id_pegawai" data-toggle="modal" data-target="#exampleModal1" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="nama_pegawai" class="form-control" disabled="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat" class="form-control" disabled="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Jumlah Pinjam</label>
                        <input type="number" value="" id="jumlah_pinjam" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <br>
                        <button class="btn btn-primary" id="tambah_detail">+</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="kotak-detail"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="text" disabled="" value="<?php echo date ('Y-m-d'); ?>" id="tanggal_pinjam" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" id="tanggal_kembali" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" id="status" class="form-control" readonly value="Pinjam">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <br>
                        <button class="btn btn-primary" id="simpan-transaksi">Simpan Transaksi</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Form Inventaris</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                    <table class="table table-striped order-table">
                                        <thead>
                                            <tr  class="table-primary">
                                                <th scope="col">Id</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kondisi</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Ruang</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tqw=$this->model_inventaris->qw("inventaris.id_inventaris,inventaris.nama,inventaris.kondisi,inventaris.keterangan,inventaris.jumlah,jenis.nama_jenis,inventaris.tanggal_register,ruang.nama_ruang,inventaris.kode_inventaris,petugas.nama_petugas","inventaris","inner join jenis on inventaris.id_jenis=jenis.id_jenis inner join ruang on inventaris.id_ruang=ruang.id_ruang inner join petugas on inventaris.id_petugas=petugas.id_petugas")->result();                         
                                            $no=1;
                                            foreach ($tqw as $tampil) {
                                                
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $tampil->id_inventaris;?></th>
                                                <td><?php echo $tampil->nama;?></td>
                                                <td><?php echo $tampil->kondisi;?></td>
                                                <td><?php echo $tampil->jumlah;?></td>
                                                <td><?php echo $tampil->nama_ruang;?></td>
                                                <td>
                                                    <button data-toggle="data" data-id="<?php echo $tampil->id_inventaris; ?>" data-nama="<?php echo $tampil->nama; ?>" data-kondisi="<?php echo $tampil->kondisi; ?>" data-jumlah="<?php echo $tampil->jumlah; ?>" data-nama_ruang="<?php echo $tampil->nama_ruang; ?>" class="btn btn-primary pilih-sama-sama" data-dismiss="modal">Pilih</button>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Form Pegawai</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                    <table class="table table-striped order-table">
                                        <thead>
                                            <tr class="table-primary">
                                                <th scope="col">No</th>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nama Pegawai</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $aqw=$this->model_inventaris->qw('*','pegawai','')->result();
                                            $no=1;
                                            foreach ($aqw as $tampil) {                    

                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no++ ?></th>
                                                <td><?php echo $tampil->id_pegawai;?></td>
                                                <td><?php echo $tampil->nama_pegawai;?></td>
                                                <td><?php echo $tampil->alamat;?></td>
                                                <td>
                                                    <button data-toggle="data" data-id="<?php echo $tampil->id_pegawai; ?>" data-nama_pegawai="<?php echo $tampil->nama_pegawai; ?>" data-alamat="<?php echo $tampil->alamat; ?>" class="btn btn-primary pilih-sama" data-dismiss="modal">Pilih</button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                            ?>
                                        </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                        </div>
                                    </div>
                                    </div>


<script type="text/javascript">
     $("#kotak-detail").load('<?php echo site_url("Control/panggil_kotak") ?>');
    $(".pilih-sama-sama").on("click",function(){
    $id=$(this).data('id');
    $nama=$(this).data('nama');
    $kondisi=$(this).data('kondisi');
    $jumlah=$(this).data('jumlah'); 
    $nama_ruang=$(this).data('nama_ruang');
    $("#id_inventaris").val($id);
    $("#nama").val($nama);
    $("#kondisi").val($kondisi);
    $("#jumlah").val($jumlah);
    $("#nama_ruang").val($nama_ruang);
      });

    $(".pilih-sama").on("click",function(){
    $("#id_pegawai").val($(this).data('id'));
    $("#nama_pegawai").val($(this).data('nama_pegawai'));
    $("#alamat").val($(this).data('alamat'));
      });
    $("#tambah_detail").click(function () {
        if ($("#jumlah").val()<=0 ){
            alert('Barang Habis')
            $("#nama").val("");
            $("#jumlah").val("");
            $("#kode_inventaris").val("");
            $("#kondisi").val("");
            $("#nama_ruang").val("");
            $("#id_inventaris").val("");
            $("#id_inventaris").focus();
        }
        else{
        $.ajax({
            url:"<?php echo site_url('Control/simpandetailpinjam') ?>",
            type:"POST",
            data:{
                "id_peminjaman":$("#id_peminjaman").val(),
                "jumlah_pinjam":$("#jumlah_pinjam").val(),
                "id_inventaris":$("#id_inventaris").val(),
            },
            success:function (data) {
                $(".alert-success");
                if (data=="ada") {
                    alert('inventaris sudah dimasukkan');
                }else if (data=="ok") {
                    $("#kotak-detail").load('<?php echo site_url("Control/panggil_kotak") ?>');
                }
            },
            error:function (argument) {
                console.log(argument);
            }
        })
        }
    })

    $("#simpan-transaksi").click(function () {
        $.ajax({
            url:"<?php echo site_url('Control/simpanpinjamtran') ?>",
            type:"POST",
            data:{
                "id_peminjaman":$("#id_peminjaman").val(),
                "tanggal_pinjam":$("#tanggal_pinjam").val(),
                "tanggal_kembali":$("#tanggal_kembali").val(),
                "tanggal_pinjam":$("#tanggal_pinjam").val(),
                "id_pegawai":$("#id_pegawai").val(),
                "status_peminjaman":$("#status").val(),
            },
            success:function (data) {
                if (data=="ok") {
                location.reload();
                console.log("ok tambah");
                }
            },
            error:function (argument) {
                console.log(argument);
            }
        })
    })
</script>



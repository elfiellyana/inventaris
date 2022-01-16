<?php 
if ($status=="edit") {
  $val=$hsl->row_array();
}else{
  $val=$hsl->row_array();
}
$qw=$this->model_inventaris->qw('*','pegawai','ORDER BY id_pegawai DESC');
$data=$qw->row_array();
$kd=$data['id_pegawai'];
  $ambil=substr($kd,4,7 );
  $jml=$ambil + 1;
  if($jml < 10){
    $nomot="PGW-00".$jml;
  }elseif($jml > 9 && $jml <=99){
    $nomot = "PGW-0".$jml;
  }else{
    $nomot = "PGW-".$jml;
  };
 ?>
<div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?php echo $judul; ?></h5>
                                <div class="card-body">
                                    <?php 
                                    echo form_open($open);
                                     ?>
                                    <form id="form" data-parsley-validate="" novalidate="">
                                        <div class="form-group row">
                                            <label for="id_pegawai" class="col-3 col-lg-2 col-form-label text-right">ID Pegawai</label>
                                            <?php 
                                              $id=$val['id_pegawai'];
                                                if ($id=='') {
                                                    $a=$nomot;
                                                }else{
                                                    $a=$val['id_pegawai'];
                                                }
                                               ?>
                                            <div class="col-9 col-lg-10">
                                                <input id="id_pegawai" name="id_pegawai" type="Text" data-parsley-type="Text" class="form-control" value="<?php echo $a; ?>">
                                                <input id="id" name="id" type="hidden" data-parsley-type="Text" class="form-control" value="<?php echo $a; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_pegawai" class="col-3 col-lg-2 col-form-label text-right">Nama Pegawai</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="nama_pegawai" name="nama_pegawai" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['nama_pegawai'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nip" class="col-3 col-lg-2 col-form-label text-right">NIP</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="nip" type="Text" name="nip" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['nip'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-3 col-lg-2 col-form-label text-right">Alamat</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="alamat" name="alamat" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['alamat'] ?>">
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="be-checkbox custom-control custom-checkbox">
                                                </label>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary"<?php echo $value ?>;>Simpan</button>
                                                     <a href="<?php echo site_url('control/page/pegawai');?>" class="btn btn-space btn-secondary">Batal</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                        </div>
<?php 
if ($status=="edit") {
  $val=$hsl->row_array();
}else{
  $val=$hsl->row_array();
}
$qw=$this->model_inventaris->qw('*','ruang','ORDER BY id_ruang DESC');
$data=$qw->row_array();
$kd=$data['id_ruang'];
  $ambil=substr($kd,4,7 );
  $jml=$ambil + 1;
  if($jml < 10){
    $nomot="RNG-00".$jml;
  }elseif($jml > 9 && $jml <=99){
    $nomot = "RNG-0".$jml;
  }else{
    $nomot = "RNG-".$jml;
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
                                            <label for="id_ruang" class="col-3 col-lg-2 col-form-label text-right">ID Ruang</label>
                                            <?php 
                                              $id=$val['id_ruang'];
                                                if ($id=='') {
                                                    $a=$nomot;
                                                }else{
                                                    $a=$val['id_ruang'];
                                                }
                                               ?>
                                            <div class="col-9 col-lg-10">
                                                <input id="id_ruang" name="id_ruang" type="Text" data-parsley-type="Text" class="form-control" value="<?php echo $a; ?>">
                                                <input id="id" name="id" type="hidden" data-parsley-type="Text" class="form-control" value="<?php echo $a; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_ruang" class="col-3 col-lg-2 col-form-label text-right">Nama Ruang</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="nama_ruang" name="nama_ruang" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['nama_ruang'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kode_ruang" class="col-3 col-lg-2 col-form-label text-right">Kode Ruang</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="kode_ruang" type="Text" name="kode_ruang" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['kode_ruang'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keterangan" class="col-3 col-lg-2 col-form-label text-right">Keterangan</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="keterangan" name="keterangan" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['keterangan'] ?>">
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
                                                    <a href="<?php echo site_url('control/page/ruang');?>" class="btn btn-space btn-secondary">Batal</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                        </div>
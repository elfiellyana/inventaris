<?php 
if ($status=="edit") {
  $val=$hsl->row_array();
}else{
  $val=$hsl->row_array();
}
$qw=$this->model_inventaris->qw('*','petugas','ORDER BY id_petugas DESC');
$data=$qw->row_array();
$kd=$data['id_petugas'];
  $ambil=substr($kd,4,7 );
  $jml=$ambil + 1;
  if($jml < 10){
    $nomot="PTG-00".$jml;
  }elseif($jml > 9 && $jml <=99){
    $nomot = "PTG-0".$jml;
  }else{
    $nomot = "PTG-".$jml;
  };
 ?>
<div class="row">
                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?php echo $judul; ?></h5>
                                <div class="card-body">
                                    <?php 
                                    echo form_open($open);
                                     ?>
                                    <form id="form" data-parsley-validate="" novalidate="">
                                        <div class="form-group row">
                                            <label for="id_petugas" class="col-3 col-lg-2 col-form-label text-right">ID Petugas</label>
                                            <?php 
                                              $id=$val['id_petugas'];
                                                if ($id=='') {
                                                    $a=$nomot;
                                                }else{
                                                    $a=$val['id_petugas'];
                                                }
                                               ?>
                                            <div class="col-9 col-lg-10">
                                                <input id="id_petugas" name="id_petugas" type="Text" data-parsley-type="Text" class="form-control" value="<?php echo $a; ?>">
                                                <input id="id" name="id" type="hidden" data-parsley-type="Text" class="form-control" value="<?php echo $a; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="username" class="col-3 col-lg-2 col-form-label text-right">Username</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="username" name="username" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['username'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-3 col-lg-2 col-form-label text-right">Password</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="password" type="Text" name="password" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['password'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_petugas" class="col-3 col-lg-2 col-form-label text-right">Nama Petugas</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="nama_petugas" name="nama_petugas" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['nama_petugas'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_level" class="col-3 col-lg-2 col-form-label text-right">Level</label>
                                            <div class="col-9 col-lg-10">
                                                <select class="form-control" name="id_level">
                                                    <option>--PILIH--</option>
                                                    <?php 
                                                    $qw=$this->model_inventaris->qw('*','level','')->result();
                                                    foreach ($qw as $tampil) {
                                                    ?>
                                                    <option value="<?php echo $tampil->id_level; ?>" <?php if ($val['id_level']==$tampil->id_level){echo "selected";}?>><?php echo $tampil->nama_level; ?>
                                                     </option>
                                                    <?php } ?>
                                                </select>
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
                                                     <a href="<?php echo site_url('control/page/petugas');?>" class="btn btn-space btn-secondary">Batal</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                        </div>
<?php 
if ($status=="edit") {
  $val=$hsl->row_array();
}else{
  $val=$hsl->row_array();
}
$qw=$this->model_inventaris->qw('*','inventaris','ORDER BY id_inventaris DESC');
$data=$qw->row_array();
$kd=$data['id_inventaris'];
  $ambil=substr($kd,5,8 );
  $jml=$ambil + 1;
  if($jml < 10){
    $nomot="INVN-00".$jml;
  }elseif($jml > 9 && $jml <=99){
    $nomot = "INVN-0".$jml;
  }else{
    $nomot = "INVN-".$jml;
  };
$iv=$data['kode_inventaris'];
$bil=substr($iv,5,8);
$jal=$bil + 1;
  if($jal < 10){
    $nomat="INVNT60".$jal;
  }elseif($jal > 9 && $jal <=99){
    $nomat = "INVNT6".$jal;
  }else{
    $nomat = "INVNT".$jal;
  }; ?>
<div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?php echo $judul; ?></h5>
                                <div class="card-body">
                                    <?php 
                                    echo form_open($open);
                                     ?>
                                    <form id="form" data-parsley-validate="" novalidate="">
                                        <div class="form-group row">
                                            <label for="id_inventaris" class="col-3 col-lg-2 col-form-label text-right">ID inventaris</label>
                                            <?php 
                                              $id=$val['id_inventaris'];
                                                if ($id=='') {
                                                    $a=$nomot;
                                                }else{
                                                    $a=$val['id_inventaris'];
                                                }
                                               ?>
                                            <div class="col-9 col-lg-10">
                                                <input id="id_inventaris" name="id_inventaris" type="Text" data-parsley-type="Text" class="form-control" value="<?php echo $a; ?>">
                                                <input id="id" name="id" type="hidden" data-parsley-type="Text" class="form-control" value="<?php echo $a; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-3 col-lg-2 col-form-label text-right">Nama</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="nama" name="nama" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['nama'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_kondisi" class="col-3 col-lg-2 col-form-label text-right">Kondisi</label>
                                            <div class="col-9 col-lg-10">
                                                <select class="form-control" name="kondisi" id="kondisi">
                                                    <option>--PILIH--</option>
                                                    <option value="Baik"<?php if ($val['kondisi']=='Baik') { echo"selected";} ?>>Baik</option>
                                                    <option value="Rusak"<?php if ($val['kondisi']=='Rusak') { echo"selected";} ?>>Rusak</option>
                                                    <option value="Sedang Diperbaiki"<?php if ($val['kondisi']=='Sedang Diperbaiki') { echo"selected";} ?>>Sedang Diperbaiki</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keterangan" class="col-3 col-lg-2 col-form-label text-right">Keterangan</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="keterangan" name="keterangan" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['keterangan'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah" class="col-3 col-lg-2 col-form-label text-right">jumlah</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="jumlah" name="jumlah" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo $val['jumlah'] ?>">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label for="nama_jenis" class="col-3 col-lg-2 col-form-label text-right">Jenis</label>
                                            <div class="col-9 col-lg-10">
                                                <select class="form-control" name="id_jenis">
                                                    <option>--PILIH--</option>
                                                    <?php 
                                                    $qw=$this->model_inventaris->qw('*','jenis','')->result();
                                                    foreach ($qw as $tampil) {
                                                    ?>
                                                    <option value="<?php echo $tampil->id_jenis; ?>" <?php if ($val['id_jenis']==$tampil->id_jenis){echo "selected";}?>><?php echo $tampil->nama_jenis; ?>
                                                     </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal_register" class="col-3 col-lg-2 col-form-label text-right">Tanggal Register</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="tanggal_register" name="tanggal_register" type="date" required="" data-parsley-type="Text" class="form-control" value="<?php echo date ('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_ruang" class="col-3 col-lg-2 col-form-label text-right">Ruang</label>
                                            <div class="col-9 col-lg-10">
                                                <select class="form-control" name="id_ruang">
                                                    <option>--PILIH--</option>
                                                    <?php 
                                                    $qw=$this->model_inventaris->qw('*','ruang','')->result();
                                                    foreach ($qw as $tampil) {
                                                    ?>
                                                    <option value="<?php echo $tampil->id_ruang; ?>" <?php if ($val['id_ruang']==$tampil->id_ruang){echo "selected";}?>><?php echo $tampil->nama_ruang; ?>
                                                     </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kode_inventaris" class="col-3 col-lg-2 col-form-label text-right">Kode Inventaris</label>
                                            <?php 
                                              $kode=$val['kode_inventaris'];
                                                if ($kode=='') {
                                                    $b=$nomat;
                                                }else{
                                                    $b=$val['kode_inventaris'];
                                                }
                                               ?>
                                            <div class="col-9 col-lg-10">
                                                <input id="kode_inventaris" name="kode_inventaris" type="Text" data-parsley-type="Text" class="form-control" value="<?php echo $b; ?>">
                                                <input id="kode" name="kode" type="hidden" data-parsley-type="Text" class="form-control" value="<?php echo $b; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_petugas" class="col-3 col-lg-2 col-form-label text-right">Petugas</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="id_petugas" name="id_petugas" type="Text" required="" data-parsley-type="Text" class="form-control" value="<?php echo$this->session->userdata('id_petugas') ?>">
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
                                                     <a href="<?php echo site_url('control/page/inventaris');?>" class="btn btn-space btn-secondary">Batal</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                        </div>
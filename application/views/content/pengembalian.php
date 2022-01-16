                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Pengembalian</h2>
                                    <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Transaksi</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-12">
                          <input type="text" name="cari_buku" id="tulisan" placeholder="Cari Menurut Id Pinjam" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                       <button id="cari_buton" value="Cari" class="btn btn-primary">Cari</button>
                      </div>
 
                  </div>
                  <div class="table-responsive table-responsive-data2">
                        <?php 
                        if (!empty($this->session->flashdata('Berhasil'))) {
                            echo '
                            <div class="alert alert-success">
                            '.$this->session->flashdata('Berhasil').'
                            </div>
                            ';
                        }
                        ?>
                    </div>
                 <div class="row">
                <div class="col-md-12 order-table">
                    <div id="kotak"></div>
                </div>
            </div>
                  
                        <script type="text/javascript">
                             $("#kotak").load('<?php echo site_url("Control/tabel") ?>');

                             $("#cari_buton").click(function () {
                               $.ajax({
                                  url:"<?php echo site_url('Pengembalian_Controller/cari') ?>",
                                  type:"POST",
                                  data:{
                                    "cari_id":$("#tulisan").val(),
                                  },
                                  success:function (argument) {
                                    $("#kotak").html(argument);
                                  }
                               })
                             })
                           
                        </script>
                        
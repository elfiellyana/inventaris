                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Jenis Barang</h2>
                                    <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Barang</a></li>
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Jenis</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Data Jenis</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            
                        </div>
                    </div>
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Tabel Jenis Barang</h5>
                                <div class="card-body">
                                   <table class="table table-striped order-table">
                                        <thead>
                                            <tr class="table-primary">
                                                <th scope="col">No</th>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kode</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            foreach ($tamp_jen as $tampil) {                           

                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no++ ?></th>
                                                <td><?php echo $tampil->id_jenis;?></td>
                                                <td><?php echo $tampil->nama_jenis;?></td>
                                                <td><?php echo $tampil->kode_jenis;?></td>
                                                <td><?php echo $tampil->keterangan;?></td>
                                                <td>
                                                    <a href="<?php echo site_url('control/page/f_jenis'); ?>/<?php echo $tampil->id_jenis; ?>" class="far fa-edit" title="Edit" data-toggle="tooltip" data-placement="left"></a>
                                                    <a href="#" class="fas fa-trash-alt" data-toggle="modal" data-target="#exampleModal" title="Hapus" data-placement="bottom"></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Anda Yakin Ingin Menghapus Data Ini ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Tidak</a>
                                                                <a href="<?php echo site_url('control/hapus_jenis'); ?>/<?php echo $tampil->id_jenis; ?>" class="btn btn-primary">Yakin</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
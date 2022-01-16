 <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Peminjaman</h2>
                                    <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-block">
                        
                            <a href="<?php echo site_url("Control/page/peminjaman") ?>" class="btn btn-primary">Tambah</a>
                        
                    </div>
                    
 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Tabel Peminjaman</h5>    
                                <div class="card-body">

                                    <table class="table table-striped order-table">
                                        <thead>
                                            <tr class="table-primary">
                                                <th scope="col">No</th>
                                                <th scope="col">Id Peminjaman</th>
                                                <th scope="col">Tanggal Pinjam</th>
                                                <th scope="col">Tanggal Kembali</th>
                                                <th scope="col">Id Pegawai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            foreach ($tamp_pin as $tampil) {                           

                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no++ ?></th>
                                                <td><?php echo $tampil->id_peminjaman;?></td>
                                                <td><?php echo $tampil->tanggal_pinjam;?></td>
                                                <td><?php echo $tampil->tanggal_kembali;?></td>
                                                <td><?php echo $tampil->id_pegawai;?></td>
                                            </tr>
                                            <?php
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
 <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Level</h2>
                                    <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Petugas</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Level</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Tabel Level</h5>    
                                <div class="card-body">

                                    <table class="table table-striped order-table">
                                        <thead>
                                            <tr class="table-primary">
                                                <th scope="col">No</th>
                                                <th scope="col">Id Level</th>
                                                <th scope="col">Nama Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            foreach ($tamp_lev as $tampil) {                           

                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no++ ?></th>
                                                <td><?php echo $tampil->id_level;?></td>
                                                <td><?php echo $tampil->nama_level;?></td>
                                            </tr>
                                            <?php
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
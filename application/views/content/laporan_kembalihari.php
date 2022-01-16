
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Laporan Pengembalian</h2>
                                    <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Laporan </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Laporan Pengembalian</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- Main s -->
<div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            <div class="box-header">
            <h3 class="box-title"></h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" id="tanggal_awal" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" id="tanggal_akhir" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                            <br>
                            <button class="btn btn-primary btn-md" id="klikasdas">Cari</button>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <a href="javascript:void(0)" class="btn btn-info btn-md" onclick="printDiv('kotak-laporan')">Cetak</a>
                        </div>
                    </div>

                    <div id="kotak-laporan"></div>

                </div><!-- /.box-body -->
            </div>
            </div><!-- /. box -->

                    
        </div><!-- ./col -->
    </div><!-- /.row -->
<textarea id="printing-css" style="display: none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
	$("#kotak-laporan").load("<?php echo site_url('Laporanhari/laporan1') ?>");
    $("#klikasdas").click(function () {
        $.ajax({
            url:"<?php echo site_url('Laporanhari/lakemhar') ?>",
            type:"POST",
            data:{
                "tanggal_awal":$("#tanggal_awal").val(),
                "tanggal_akhir":$("#tanggal_akhir").val(),
            },
            success:function (argument) {
                $("#kotak-laporan").html(argument);
                
            },
            error:function (argument) {
                alert(argument);
            }
        })
    })

    function printDiv(elemenId){
        var a = document.getElementById('printing-css').value;
        var b = document.getElementById(elemenId).innerHTML;
        window.frames["print_frame"].document.title = document.title;
        window.frames["print_frame"].document.body.innerHTML = '<style>' + a +'</style>' + b;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
</script>
<!-- Content Header (Page header) -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Laporan Peminjaman</h2>
                                    <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Laporan</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Laporan Peminjaman</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

<!-- Main content -->

<form action="<?php echo site_url('Laporan/laporan');?>" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            <div class="box-header">
            <h3 class="box-title"></h3>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Pilih Bulan</label>
                            <select class="form-control input-md" id="bulan" onchange="Load()" name="bulan">
                                <option value="0">--Pilih--</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="col-sm-2">
                       <br>
                         <a href="javascript:void(0)" class="btn btn-primary btn-md" onclick="printDiv('kotak-laporan')">Cetak</a>
                    </div>
                   <div class="col-sm-12">
                        <div id="kotak-laporan"></div>
                   </div>
            </div>
            </div><!-- /. box -->

                    
        </div><!-- ./col -->
    </div><!-- /.row -->
    <!-- top row -->
</form>
<textarea id="printing-css" style="display: none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
    

    

    function Load(){
         $.ajax({
            url:"<?php echo site_url('Laporan/lapin') ?>",
            type:"POST",
            data:{
                bulan:$("#bulan").val(),
            },
            success:function(loll){
                $("#kotak-laporan").html(loll);                
            }
         })
    }



    function printDiv(elemenId){
        Load()


        var a = document.getElementById('kotak-laporan').value;
        var b = document.getElementById(elemenId).innerHTML;
        window.frames["print_frame"].document.title = document.title;
        window.frames["print_frame"].document.body.innerHTML = '<style>' + a +'</style>' + b;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
       
    }
</script>
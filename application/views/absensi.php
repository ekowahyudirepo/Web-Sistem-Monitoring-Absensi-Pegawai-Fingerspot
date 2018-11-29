<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/dataTable4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/styles.css">
</head>

<body class="sidebar-hidden header-fixed sidebar-fixed">
<div class="page-wrapper">
    
    <?php echo $head; ?>

    <div class="main-container">
        
        <?php echo $navigasi; ?>

        <div class="content">

            <div class="row">
                <div class="col-md-12">
                    <h2>Home</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2"><?php echo $jml_pegawai; ?></span>
                                <span class="font-weight-light">Total Pegawai</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2"><?php echo $hadir; ?></span>
                                <span class="font-weight-light">Hadir</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="fa fa-calendar-check-o"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2"><?php echo $jml_pegawai-$hadir; ?></span>
                                <span class="font-weight-light">Tidak Hadir</span>
                            </div>
                            <div class="h2 text-muted">
                                <i class="fa fa-calendar-times-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-md-8">
                                    <button class="export btn btn-success"><i class="fa fa-file-excel-o"></i></button>
                                    
                                </div>
                                <div class="col-md-4">
                                    <form action="<?php echo base_url('absensi/filter') ?>" method="POST">
                                        <div class="input-group">
                                            <input type="date" name="tgl" class="form-control" value="<?php echo ( $_SESSION['filter_absensi'] != '' )? $_SESSION['filter_absensi'] : date('Y-m-d'); ?>" >
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>PIN</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach( $get_data_pegawai->result() as $row ){ ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->pin; ?></td>
                                        <td><?php echo $row->nik; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td><?php echo $row->kategori; ?></td>
                                        <td><?php echo $row->status; ?></td>
                                        <td><?php echo $masuk = $this->M_absensi->absensiMasuk($row->pin, $tgl_filter); ?></td>
                                        <td>
                                            <?php if( $masuk != '' ){ ?>
                                            <?php echo $this->M_absensi->absensiPulang($row->pin, $tgl_filter); ?>
                                            <?php } ?>
                                                
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>dist/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/excelexport.js"></script>

<script>
  $(function() {
    
    //excel export
    var $exp = $('.export');
  
    $exp.on('click', function () {
        $("#data").excelexportjs({
            containerid: "data", datatype: 'table'
        });
    });

  })
</script>
<script src="<?php echo base_url(); ?>dist/js/jquery.dataTable4.js"></script>
<script src="<?php echo base_url(); ?>dist/js/dataTable4.js"></script>
<script>
    $(function(){
        $("table").DataTable();
    })
</script>
<script src="<?php echo base_url(); ?>dist/vendor/popper.js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/carbon.js"></script>
</body>
</html>

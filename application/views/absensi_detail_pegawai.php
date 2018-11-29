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
                    <h2><a href="#" onclick="window.close()">Tutup</a> | Detail Absensi Pegawai</h2>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row">
                                
                            </div>
                        </div>

                        <div class="card-body">
                        	<p><i># Absensi Masuk</i></p>
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach( $get_absensi_masuk->result() as $row ){ ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->tanggal; ?></td>
                                        <td><?php echo $row->masuk; ?></td>
                                        <td>
                                            <a onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" href="<?php echo base_url('absensi/hapus_absensi?pin='.$this->uri->segment(3).'&tanggal='.$row->tanggal.'&mode=0') ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <br>
                            <br>
                            <p><i># Absensi Pulang</i></p>
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pulang</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach( $get_absensi_pulang->result() as $row2 ){ ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row2->tanggal; ?></td>
                                        <td><?php echo $row2->pulang; ?></td>
                                        <td>
                                            <a onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" href="<?php echo base_url('absensi/hapus_absensi?pin='.$this->uri->segment(3).'&tanggal='.$row2->tanggal.'&mode=1') ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

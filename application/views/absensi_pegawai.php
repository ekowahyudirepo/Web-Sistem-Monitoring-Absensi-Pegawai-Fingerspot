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
                            <button class="export btn btn-success"><i class="fa fa-file-excel-o"></i></button>
                            <a target="_blank" href="<?php echo base_url('pegawai/absensi_pegawai_pdf/'.$this->uri->segment(3).'') ?>" class="btn btn-secondary"><i class="fa fa-file-pdf-o"></i></a>
                        </div>

                        <div class="card-body">
                            <p><i># Identitas Pegawai</i></p>
                            <table style="font-size: 12px;width: 50%">
                                <tr>
                                    <td>Nama Pegawai</td>
                                    <td>:</td>
                                    <td><?php echo $nama_pegawai; ?></td>
                                </tr>
                                <tr>
                                    <td>NIP Pegawai</td>
                                    <td>:</td>
                                    <td><?php echo $nip_pegawai; ?></td>
                                </tr>
                            </table>
                            <br>
                            <br>
                        	<p><i># Absensi Pegawai</i></p>
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Masuk</th>
                                            <th>Pulang</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php $no = 1; ?>
                                        <?php for($i=0; $i<count($list);$i++ ){ ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($list[$i])); ?></td>
                                            <td><?php echo $this->M_pegawai->getAbsensiMasuk( $this->uri->segment(3), $list[$i]); ?></td>
                                            <td><?php echo $this->M_pegawai->getAbsensiPulang( $this->uri->segment(3), $list[$i]); ?></td>
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
        $("#data").DataTable();
    })
</script>
<script src="<?php echo base_url(); ?>dist/vendor/popper.js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/carbon.js"></script>
</body>
</html>

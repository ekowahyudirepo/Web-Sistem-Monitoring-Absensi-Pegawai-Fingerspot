<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/vendor/font-awesome/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
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
                    <h2>TUNJANGAN KINERJA (TUKIN) [ <?php echo $this->M_tukin->getLabelPeriode() ?> ]</h2>
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-md-8">
                                    <button class="export btn btn-success"><i class="fa fa-file-excel-o"></i></button>
                                    <a target="_blank" href="<?php echo base_url('tukin/pdf') ?>" class="btn btn-secondary"><i class="fa fa-file-pdf-o"></i></a>
                                </div>
                                <div class="col-md-4">
                                   
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>TL.1</th>
                                            <th>TL.2</th>
                                            <th>TL.3</th>
                                            <th>TL.4</th>
                                            <th>PSW.1</th>
                                            <th>PSW.2</th>
                                            <th>PSW.3</th>
                                            <th>PSW.4</th>
                                            <th>Tidak Masuk</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach( $get_data_pegawai->result() as $row ){ ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nik; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td align="center">
                                                <?php echo $this->M_tukin->getTl($list, $row->pin, 'TL.1'); ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $this->M_tukin->getTl($list, $row->pin, 'TL.2'); ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $this->M_tukin->getTl($list, $row->pin, 'TL.3'); ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $this->M_tukin->getTl($list, $row->pin, 'TL.4'); ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $this->M_tukin->getPa($list, $row->pin, 'PSW.1'); ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $this->M_tukin->getPa($list, $row->pin, 'PSW.2'); ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $this->M_tukin->getPa($list, $row->pin, 'PSW.3'); ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $this->M_tukin->getPa($list, $row->pin, 'PSW.4'); ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $this->M_tukin->mangkir($list, $row->pin); ?>
                                            </td>
                                            <td>
                                                <a target="_blank" href="<?php echo base_url('tukin/pegawai/'.$row->pin.'') ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                <a target="_blank" href="<?php echo base_url('tukin/pdf/'.$row->pin.'') ?>" class="btn btn-secondary" ><i class="fa fa-file-pdf-o"></i></a>
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
<script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.search').select2(
            {
                placeholder: "Cari nama pegawai",
                allowClear: true
            }
        );

    });

</script>
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
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
</body>
</html>

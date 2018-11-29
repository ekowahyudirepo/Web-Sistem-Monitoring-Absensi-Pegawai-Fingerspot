<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/vendor/font-awesome/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/dataTable4.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
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
                    <h2>Uang Makan [ <?php echo $this->M_uang_makan->getLabelPeriode() ?> ]</h2>
                    
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-md-8">
                                    <button class="export btn btn-success"><i class="fa fa-file-excel-o"></i></button>
                                    <a target="_blank" href="<?php echo base_url('uang_makan/pdf') ?>" class="btn btn-secondary"><i class="fa fa-file-pdf-o"></i></a>
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
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Jumlah</th>
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
                                            <td><?php echo $row->kategori; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            <td align="center">

                                            <?php 
                                            $jml_absensi = 0; 
                                            $jml_lembur  = 0;
                                            ?>
                                            <?php for($i=0; $i<count($list);$i++ ){ 
                                                // cek tgl libur
                                                if( ! $this->M_uang_makan->cekTglLibur($list[$i])){

                                                    if( $this->M_uang_makan->cekTugasPegawai($row->pin, $list[$i] ) )
                                                        

                                                        if ( $this->M_uang_makan->cekAbsensi( $row->pin, $list[$i])) { 
                                                            
                                                            if( $this->M_uang_makan->tdkAdaAturanUm() ){

                                                                // tampilkan absensi
                                                                foreach( $this->M_uang_makan->tampilAbsensi( $row->pin, $list[$i])->result() as $c ){

                                                                    $jml_absensi++;
                                                                    
                                                                }

                                                            } else {

                                                                // tampilkan absensi
                                                                foreach( $this->M_uang_makan->tampilAbsensi( $row->pin, $list[$i])->result() as $c ){
                                                                    if( $this->M_uang_makan->aturanMasuk( $c->jam_masuk ) && $this->M_uang_makan->aturanPulang( $c->jam_pulang )  ){
                                                                        $jml_absensi++;
                                                                    }
                                                                }

                                                            }

                                                        }
                                                  
                                                } else {

                                                    // kondisi lembur
                                                }

                                            } ?>
                                            <?php echo $jml_absensi; ?>
                                            
                                            </td>
                                            <td>
                                                <a target="_blank" href="<?php echo base_url('uang_makan/pegawai/'.$row->pin.'') ?>" class="btn btn-primary" ><i class="fa fa-eye"></i></a>
                                                <a target="_blank" href="<?php echo base_url('uang_makan/pdf/'.$row->pin.'') ?>" class="btn btn-secondary" ><i class="fa fa-file-pdf-o"></i></a>
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
</body>
</html>

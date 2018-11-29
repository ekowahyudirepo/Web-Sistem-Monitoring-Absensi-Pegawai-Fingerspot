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
                    <h2><a href="#" onclick="window.close()">Tutup</a> | Absensi Ganda Pegawai</h2>
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
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>PIN</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                        <th>Ganda</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach( $get_data_pegawai->result() as $row ){ ?>
                                    	<?php for($i=0; $i<count($list);$i++ ){ ?> 
                                    		<?php if ( $this->M_absensi->cekAbsensiGanda( $row->pin, $list[$i] ) ) { ?>
                                    			
			                                    <tr>
			                                        <td><?php echo $no++; ?></td>
			                                        <td><?php echo date('d-m-Y', strtotime($list[$i])); ?></td>
			                                        <td><?php echo $row->pin; ?></td>
			                                        <td><?php echo $row->nik; ?></td>
			                                        <td><?php echo $row->nama; ?></td>
			                                        <td><?php echo $row->kategori; ?></td>
			                                        <td><?php echo $row->status; ?></td>
			                                        <td><?php echo $masuk = $this->M_absensi->absensiMasuk($row->pin, $$list[$i]); ?></td>
			                                        <td>
			                                            <?php if( $masuk != '' ){ ?>
			                                            <?php echo $this->M_absensi->absensiPulang($row->pin, $$list[$i]); ?>
			                                            <?php } ?>
			                                                
			                                        </td>
			                                        <td>
			                                            <?php if( $this->M_absensi->cekAbsensiGanda($row->pin, $$list[$i])){ ?>
			                                                <a target="_blank" href="<?php echo base_url('absensi/detail_absensi_pegawai/'.$row->pin.'?scan_date='.$list[$i].'') ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
			                                            <?php }?>
			                                            
			                                        </td>
			                                    </tr>
			                              	<?php } ?>
		                                <?php } ?>
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

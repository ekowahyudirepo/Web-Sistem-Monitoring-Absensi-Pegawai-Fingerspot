<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/dataTable4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/styles.css">
</head>
<body class="s header-fixed sidebar-fixed">
<div class="page-wrapper">
    
    <?php echo $head; ?>

    <div class="main-container">
        
        <?php echo $navigasi; ?>

        <div class="content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php echo $this->session->flashdata('notifikasi'); ?>
                </div>
            </div>  
            <div class="row">
                <div class="col-md-12">
                    <h2>Upload File Absensi</h2>
                    <div class="card">
                        <div class="card-header bg-light">
                        </div>

                        <div class="card-body">
                        	
                            
                        	<?php if( ! file_exists('./xml/absensi.xml') ){ ?>
                        	Pilih File XML anda kemudian preview
							<form action="<?php echo base_url('upload/xml') ?>" method="POST" class="form-inline" role="form" enctype="multipart/form-data">
                            
                            	<div class="form-group" style="margin-right: 20px;">
                            		<label class="sr-only" for="">label</label>
                            		<input type="file" name="xml" class="form-control" placeholder="Hanya File XML" accept="text/xml" required="">
                            	</div>
                            
                            	<button type="submit" class="btn btn-primary">Preview</button>
                            	<a target="_blank" href="<?php echo base_url('xml/scema.xml') ?>" class="btn btn-warning">Download File Skema XML</a>
                                <a title="link ini digunakan untuk mengosongkan seluruh data absensi" onclick="return confirm('Apakah anda yakin untuk mengosongkan data?')" href="<?php echo base_url('upload/kosongkan') ?>" class="btn btn-danger">Kosongkan Data Absensi</a>
                            </form>

							<?php }else{ ?>
							<?php $xml = simplexml_load_file('./xml/absensi.xml'); ?>
							<a onclick="return confirm('Apakah anda yakin untuk menghapus file ?')" href="<?php echo base_url('upload/hapusXml') ?>" class="btn btn-danger">Hapus File</a>
							<a href="<?php echo base_url('upload/import') ?>" class="btn btn-primary">Import</a>
                            <br>
                            <p>Perhatian : Setelah sistem berhasil mengimport data ke database, file akan terhapus secara otomatis untuk menghindari file ganda saat pengunggahan berikutnya </p>
							<br>
						
							<div class="table-responsive">
                                <table id="data" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Sn</th>
                                            <th>Pin</th>
                                            <th>Scan Date</th>
                                            <th>Verifymode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach( $xml as $row ){ ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->sn; ?></td>
                                            <td><?php echo $row->pin; ?></td>
                                            <td><?php echo $row->scan_date; ?></td>
                                            <td><?php echo $row->verifymode; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>dist/vendor/jquery/jquery.js"></script>
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

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
                    <h2>Cadangkan dan Kembalikan
                        <div title="Mode Edit" class="toggle-switch" data-ts-color="danger">
                            <input id="ts7" name="mode" type="checkbox" <?php echo ($this->session->userdata('edit') == 'on')? 'checked' : ''; ?> hidden="hidden">
                            <label for="ts7" class="ts-helper"></label>
                            <label for="ts7" class="ts-label"></label>
                        </div>
                        <div class="clearfix"></div>
                    </h2>
                    <div class="card">
                        <div class="card-header bg-light">
                        	<a href="<?php echo base_url('backup/backup') ?>" class="btn btn-primary">CADANGKAN</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Berkas Backup</th>
                                            <th>Restore</th>
                                            <?php if( $this->session->userdata('edit') == 'on' ){ ?>
                                            <th>Opsi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php $folder = './dbbackup/'; ?>
	                                        <?php if ($hendle = opendir($folder)) { ?>
		                                        <?php while (($file = readdir($hendle)) !== false ) { ?>
			                                        <?php if(is_file($folder.$file)){ ?>
			                                        <tr>
			                                            <td><?php echo $no++; ?></td>
			                                            <td><?php echo str_replace('.sql', '', $file); ?></td>
			                                            <td>
			                                            	<a href="<?php echo base_url('backup/restore/'.$file.'') ?>" class="btn btn-secondary">KEMBALIKAN</a>
			                                            </td>
			                                            <?php if( $this->session->userdata('edit') == 'on' ){ ?>
			                                            <td>
			                                            	<a href="<?php echo base_url('backup/download/'.$file.''); ?>" class="btn btn-secondary"><i class="fa fa-download"></i></a>

			                                            	<a onclick="return confirm('Apakah anda yakin untuk menghapus baris ini ?')" href="<?php echo base_url('backup/hapusFile/'.$file.'') ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
			                                            </td>
			                                            <?php } ?>
			                                        </tr>
			                                        <?php } ?>
		                                        <?php } ?>
		                                        <?php closedir($handle); ?>
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
<script src="<?php echo base_url(); ?>dist/vendor/jquery/jquery.js"></script>
<script>
	$('input[name="mode"]').on('click', function(){
        var x = $('input[name="mode"]:checked').length;

        var url = window.location.href;

        function mode(mode){
            jQuery.ajax({
              url: '<?php echo base_url() ?>mode/'+mode+'',
              success: function() {
                window.location = window.location.href;
              },
              error: function() {
                alert('error');
              }
            });
            
        }

        if( x == 0 ){ mode('off') }else{ mode('on') }
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

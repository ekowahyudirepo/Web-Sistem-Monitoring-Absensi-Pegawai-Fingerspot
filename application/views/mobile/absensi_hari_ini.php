<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $nama_pegawai; ?></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('dist/css/materialize.min.css') ?>">
       
    </head>
    <style type="text/css">
    	h4{
    		font-weight: bold;
    	}
    </style>
    <body style="font-size: 10px">

        <div class="navbar-fixed">      
            <nav class="nav-extended">
                <div class="nav-wrapper truncate"">
                  <a href="#" class="brand-logo" style="font-size: 20px;"><?php echo $nama_pegawai; ?></a>
                </div>
                <div class="nav-content">
                  <ul class="tabs tabs-transparent">
                    <li class="tab"><a class="active" href="<?php echo base_url('mobile/absensi/'.$this->uri->segment(3).'') ?>">Absen Hari ini</a></li>
                    <li class="tab"><a href="<?php echo base_url('mobile/riwayat/'.$this->uri->segment(3).'') ?>">Riwayat Absensi</a></li>
                    <li class="tab"><a href="<?php echo base_url('mobile/uang_makan/'.$this->uri->segment(3).'') ?>">Uang Makan</a></li>
                    <li class="tab"><a href="<?php echo base_url('mobile/tukin/'.$this->uri->segment(3).'') ?>">Tukin</a></li>
                  </ul>
                </div>
            </nav>
        </div>

        <!-- tukin -->
        <div id="test2" class="col s12" style="margin-top: 70px;">
            <div class="container">
                Memuat ...
            </div>
        </div>

        <footer class="center">&copy; 2018 - <?php echo date('Y') ?> IAIN KEDIRI</footer>

        <script src="<?php echo base_url('dist/vendor/jquery/jquery.min.js'); ?>"></script>
        <script>
        	$(function() {

			    setInterval( function() {
			        jQuery.ajax({
			          url: '<?php echo base_url('mobile/ajaxAbsensi/'.$this->uri->segment(3).'') ?>',
			          success: function(rep) {
			            //called when successful
			            $('.container').html(rep)
			          },
			          error: function(xhr, textStatus, errorThrown) {
			            //called when there is an error
			            $('.container').html('error')
			          }
			        });
			    }, 3000);  
			})
        </script>

    </body>
</html>
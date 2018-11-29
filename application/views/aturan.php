<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/vendor/font-awesome/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/styles.css">
</head>
<body class="sidebar-hidden header-fixed sidebar-fixed">
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
                    <h2>Pengaturan Absensi
                        <div title="Mode Edit" class="toggle-switch" data-ts-color="danger">
                            <input id="ts7" name="mode" type="checkbox" <?php echo ($this->session->userdata('edit') == 'on')? 'checked' : ''; ?> hidden="hidden">
                            <label for="ts7" class="ts-helper"></label>
                            <label for="ts7" class="ts-label"></label>
                        </div>
                        <div class="clearfix"></div>
                    </h2>
                    <div class="card">
                        <div class="card-header bg-light">
                        </div>

                        <div class="card-body">
                            <div class="">
                                
                                <table class="table table-bordered">
                                    <?php $row = $get_aturan->row(); ?>
                                    <thead>
                                    <form method="POST">
                                        <tr>
                                            <th colspan="2">Pengaturan Tukin</th>
                                        </tr>
                                        
                                        <tr>
                                            <td>Periode</td>
                                            <td><input style="width: 200px" type="text" class="form-control" name="periode" value="<?php echo $row->periode; ?>" <?php echo $disabled; ?>>
                                                <small>Periode filter data absensi pegawai pada aplikasi </small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jam Masuk</td>
                                            <td><input style="width: 200px" type="time" class="form-control" name="jam_masuk" value="<?php echo $row->jam_masuk;?>" <?php echo $disabled; ?>>
                                            <small>Jam staff Muali Masuk</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Toleransi</td>
                                            <td><input style="width: 200px" type="time" class="form-control" name="toleransi" value="<?php echo $row->toleransi; ?>" <?php echo $disabled; ?>>
                                            <small>Batas waktu mulai terhitung telat</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jam Masuk *</td>
                                            <td><input style="width: 200px" id="jam_masuk" type="time" class="form-control" name="jam_masuk_set" value="<?php echo $row->jam_masuk_set; ?>" <?php echo $disabled; ?>>
                                            <small>Jam minimal terhitung masuk jam kerja</small>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>Jam Pulang</td>
                                            <td><input style="width: 200px" id="jam_pulang" type="time" class="form-control" name="jam_pulang" value="<?php echo $row->jam_pulang; ?>" <?php echo $disabled; ?>>
                                                <small>Standar waktu Staff untuk pulang</small></td>
                                        </tr>
                                        <tr>
                                            <td>Jam Pulang (Jum'at)</td>
                                            <td><input style="width: 200px" type="time" class="form-control" name="jam_pulang_jum" value="<?php echo $row->jam_pulang_jum; ?>" <?php echo $disabled; ?>>
                                                <small>Jam pulang khusus hari jum'at</small></td>
                                        </tr>
                                        <tr>
                                            <td>Lama Kerja</td>
                                            <td><input style="width: 200px" type="text" class="form-control" id="lama_kerja" name="lama_kerja" value="<?php echo $row->lama_kerja; ?>" readonly >
                                                <small>Lama kerja yang dihitung untuk acuan dalam satuan menit</small></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Pengaturan Uang Makan</th>
                                        </tr>
                                        <tr>
                                            <td>Minimal maximal masuk</td>
                                            <td><input style="width: 200px" type="time" name="um_max_masuk" class="form-control" value="<?php echo $row->um_max_masuk; ?>" <?php echo $disabled; ?> required="">
                                            <small>Jam maximal masuk untuk dapat uang makan, isi 00:00 untuk memberikan aturan bebas</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Minimal minimal pulang</td>
                                            <td><input style="width: 200px" type="time" name="um_min_pulang" class="form-control" value="<?php echo $row->um_min_pulang; ?>" <?php echo $disabled; ?> required="">
                                            <small>Jam minimal pulang untuk dapat uang makan, isi 00:00 untuk memberikan aturan bebas</small>
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td></td>
                                            <td><button formaction="<?php echo base_url('aturan/ubahAturan') ?>" type="submit" class="btn btn-primary" <?php echo $disabled; ?>>Simpan</button></td>
                                        </tr>
                                    <form>

                                    <form method="POST">
                                        <tr>
                                            <th colspan="2">Ganti Password</th>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td><input style="width: 200px" type="text" name="username" class="form-control" value="<?php echo $this->session->userdata('username'); ?>" <?php echo $disabled; ?> required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><input style="width: 200px" type="password" name="password" class="form-control" <?php echo $disabled; ?>>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ulangi Password</td>
                                            <td><input style="width: 200px" type="password" name="ulangi" class="form-control" <?php echo $disabled; ?>>
                                                <small id="ulangi" style="color: salmon"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button formmethod="POST" formaction="<?php echo base_url('aturan/ubahPassword') ?>" type="submit" class="btn btn-primary" <?php echo $disabled; ?>>Perbarui</button></td>
                                        </tr>
                                    </form>
                                    </thead>
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
<script src="<?php echo base_url(); ?>dist/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/daterangepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#jam_masuk').on('change', function(){

            jam_masuk  = $(this).val()
            jam_pulang = $('#jam_pulang').val()

            jQuery.ajax({
              url: '<?php echo base_url() ?>aturan/calLamaKerja/'+jam_masuk+'/'+jam_pulang+'',
              success: function(rep) {
                //called when successful
                $('#lama_kerja').val(rep)
              },
              error: function(xhr, textStatus, errorThrown) {
                //called when there is an error
                alert('error')
              }
            });
            
        })

        $('#jam_pulang').on('change', function(){

            jam_pulang  = $(this).val()
            jam_masuk = $('#jam_masuk').val()

            jQuery.ajax({
              url: '<?php echo base_url() ?>aturan/calLamaKerja/'+jam_masuk+'/'+jam_pulang+'',
              success: function(rep) {
                //called when successful
                $('#lama_kerja').val(rep)
              },
              error: function(xhr, textStatus, errorThrown) {
                //called when there is an error
                alert('error')
              }
            });
            
        })

        $('input[name=ulangi').on('keyup',function(){
            var password = $('input[name=password]').val();

            if( password != $(this).val() ){
                $('small#ulangi').html('Maaf! Tidak sesaui');
            } else {
                $('small#ulangi').html('Selamat! Sesaui');
            }
        })

        $('input[name="periode"]').daterangepicker();

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
    });

</script>
<script src="<?php echo base_url(); ?>dist/vendor/popper.js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/carbon.js"></script>
</body>
</html>

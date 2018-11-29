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
    <body style="font-size: 10px">

        <div class="navbar-fixed">      
            <nav class="nav-extended">
                <div class="nav-wrapper truncate"">
                  <a href="#" class="brand-logo" style="font-size: 20px;"><?php echo $nama_pegawai; ?></a>
                </div>
                <div class="nav-content">
                  <ul class="tabs tabs-transparent">
                    <li class="tab"><a href="<?php echo base_url('mobile/absensi/'.$this->uri->segment(3).'') ?>">Absen Hari ini</a></li>
                    <li class="tab"><a class="active" href="<?php echo base_url('mobile/riwayat/'.$this->uri->segment(3).'') ?>">Riwayat Absensi</a></li>
                    <li class="tab"><a href="<?php echo base_url('mobile/uang_makan/'.$this->uri->segment(3).'') ?>">Uang Makan</a></li>
                    <li class="tab"><a href="<?php echo base_url('mobile/tukin/'.$this->uri->segment(3).'') ?>">Tukin</a></li>
                  </ul>
                </div>
            </nav>
        </div>

        <!-- tukin -->
        <div id="test2" class="col s12" style="margin-top: 70px;">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12">
                        
                        <h6>RIWAYAT ABSENSI</h6>
                        <p>Periode : <?php echo $this->M_mobile->getLabelPeriode() ?> </p>

                        <table class="responsive-table bordered">
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

                        <br>
                        <br>
                        <i>Catatan : Silahkan hubungi admin untuk print laporan</i>
                    
                        
                
                    </div>
                </div>
            </div>
        </div>

        <footer class="center">&copy; 2018 - <?php echo date('Y') ?> IAIN KEDIRI</footer>

    </body>
</html>
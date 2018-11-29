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
    <body style="font-size: 10px;">
                
        <div class="navbar-fixed">
            <nav class="nav-extended">
                <div class="nav-wrapper">
                  <a href="#" class="brand-logo" style="font-size: 20px;"><?php echo $nama_pegawai; ?></a>
                </div>
                <div class="nav-content">
                  <ul class="tabs tabs-transparent">
                    <li class="tab"><a href="<?php echo base_url('mobile/absensi/'.$this->uri->segment(3).'') ?>">Absen Hari ini</a></li>
                    <li class="tab"><a href="<?php echo base_url('mobile/riwayat/'.$this->uri->segment(3).'') ?>">Riwayat Absensi</a></li>
                    <li class="tab"><a class="active" href="<?php echo base_url('mobile/uang_makan/'.$this->uri->segment(3).'') ?>">Uang Makan</a></li>
                    <li class="tab"><a href="<?php echo base_url('mobile/tukin/'.$this->uri->segment(3).'') ?>">Tukin</a></li>
                  </ul>
                </div>
            </nav>
        </div>

        <!-- um -->
        <div id="test1" class="col s12" style="margin-top: 70px;">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12">


                        <h6>UANG MAKAN </h6>
                        <p>Periode : <?php echo $this->M_mobile->getLabelPeriode() ?> </p>

                        <table>
                            <tr>
                                <td bgcolor="#99ffbb">Absensi</td>
                                <td bgcolor="#99ddff">Lembur</td>
                                <td bgcolor="#ff9999">Mangkir</td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <table class="responsive-table bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hari</th>
                                    <th>Tanggal Scan</th>
                                    <th>Masuk</th>
                                    <th>Pulang</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php $no = 1; ?>
                                <?php for($i=0; $i<count($list);$i++ ){ 
                                    # PERIKSA TANGGAN MASUK
                                    if( ! $this->M_uang_makan->cekTglLibur($list[$i])){
                                        # PERIKSA ABSENSI
                                        if ( $this->M_uang_makan->cekAbsensi( $this->uri->segment(3), $list[$i])) { 
                                            # PERIKSA ATURAN UM
                                            if( $this->M_uang_makan->tdkAdaAturanUm() ){
                                                # TAMPILKAN ABSENSI
                                                foreach ($this->M_uang_makan->tampilAbsensi( $this->uri->segment(3), $list[$i])->result() as $a ) { ?>
                                                        
                                                    <tr bgcolor="#99ffbb">
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $this->format->getHari($a->hari); ?></td>
                                                        <td><?php echo $a->tgl; ?></td>
                                                        <td><?php echo $a->jam_masuk; ?></td>
                                                        <td><?php echo $a->jam_pulang; ?></td>
                                                        <td>Absen</td>
                                                        <td>
                                                            <?php 
                                                            # PERIKSA TUGAS DALAM KOTA
                                                            if ( $this->M_uang_makan->cekTugasPegawai( $this->uri->segment(3), $list[$i])) {
                                                                # TAMPILKAN TUGAS
                                                                foreach ($this->M_uang_makan->tampilTugas( $this->uri->segment(3), $list[$i]) as $t ) {
                                                                    echo 'Tugas Ke -'. $t->tempat.' ('.$t->kategori.')<br>';
                                                                    echo 'Perihal : '.$t->keterangan.'';
                                                                }
                                                            # PERIKSA CUTI
                                                            } elseif ( $this->M_uang_makan->cekCutiPegawai( $this->uri->segment(3), $list[$i])) {
                                                                # TAMPILKAN CUTI
                                                                foreach ($this->M_uang_makan->tampilCuti( $this->uri->segment(3), $list[$i]) as $c ) {
                                                                    echo 'Cuti Kategori - ('.$c->kategori.')<br>';
                                                                    echo 'Keterangan : '.$c->keterangan.'';
                                                                }

                                                            } else {
                                                                echo 'Tidak ada';
                                                            } ?>
                                                        </td>
                                                    </tr>

                                                <?php }

                                            } else {
                                                # KONDISI DENGAN ATURAN UM
                                                # TAMPILKAN ABSENSI
                                                foreach ($this->M_uang_makan->tampilAbsensi( $this->uri->segment(3), $list[$i])->result() as $a ) { ?>
                                                    
                                                    <?php 
                                                    # JALANKAN ATURAN SAAT PERULANGAN
                                                    if( $this->M_uang_makan->aturanMasuk( $a->jam_masuk ) && $this->M_uang_makan->aturanPulang( $a->jam_pulang )  ){ ?>
                                                       
                                                        <tr bgcolor="#99ffbb">
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $this->format->getHari($a->hari); ?></td>
                                                            <td><?php echo $a->tgl; ?></td>
                                                            <td><?php echo $a->jam_masuk; ?></td>
                                                            <td><?php echo $a->jam_pulang; ?></td>
                                                            <td>Absen</td>
                                                            <td>
                                                                <?php 
                                                                # PERIKSA TUGAS DALAM KOTA
                                                                if ( $this->M_uang_makan->cekTugasPegawai( $this->uri->segment(3), $list[$i])) {
                                                                    # TAMPILKAN TUGAS
                                                                    foreach ($this->M_uang_makan->tampilTugas( $this->uri->segment(3), $list[$i]) as $t ) {
                                                                        echo 'Tugas Ke -'. $t->tempat.' ('.$t->kategori.')<br>';
                                                                        echo 'Perihal : '.$t->keterangan.'';
                                                                    }
                                                                # PERIKSA CUTI
                                                                } elseif ( $this->M_uang_makan->cekCutiPegawai( $this->uri->segment(3), $list[$i])) {
                                                                    # TAMPILKAN CUTI
                                                                    foreach ($this->M_uang_makan->tampilCuti( $this->uri->segment(3), $list[$i]) as $c ) {
                                                                        echo 'Cuti Kategori - ('.$c->kategori.')<br>';
                                                                        echo 'Keterangan : '.$c->keterangan.'';
                                                                    }

                                                                } else {
                                                                    echo 'Tidak ada';
                                                                } ?>
                                                            </td>
                                                        </tr>

                                                    <?php }

                                                }

                                            }

                                        } else {

                                            if( $this->M_uang_makan->cekAbsensiMasuk($this->uri->segment(3), $list[$i]) ){
                                                foreach ($this->M_uang_makan->absensiMasuk($this->uri->segment(3), $list[$i]) as $am ) { ?>
                                                    <!-- ABSENSI MASUK SAJA -->
                                                    <tr bgcolor="#99ffbb">
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $this->format->getHari2(date("l",strtotime($list[$i]))); ?></td>
                                                        <td><?php echo date("d-m-Y", strtotime($list[$i])); ?></td>
                                                        <td><?php echo $am->jam_masuk; ?></td>
                                                        <td>-</td>
                                                        <td>Masuk Saja</td>
                                                        <td>
                                                            <?php 
                                                            # PERIKSA TUGAS DALAM KOTA
                                                            if ( $this->M_uang_makan->cekTugasPegawai( $this->uri->segment(3), $list[$i])) {
                                                                # TAMPILKAN TUGAS
                                                                foreach ($this->M_uang_makan->tampilTugas( $this->uri->segment(3), $list[$i]) as $t ) {
                                                                    echo 'Tugas Ke -'. $t->tempat.' ('.$t->kategori.')<br>';
                                                                    echo 'Perihal : '.$t->keterangan.'';
                                                                }
                                                            # PERIKSA CUTI
                                                            } elseif ( $this->M_uang_makan->cekCutiPegawai( $this->uri->segment(3), $list[$i])) {
                                                                # TAMPILKAN CUTI
                                                                foreach ($this->M_uang_makan->tampilCuti( $this->uri->segment(3), $list[$i]) as $c ) {
                                                                    echo 'Cuti Kategori - ('.$c->kategori.')<br>';
                                                                    echo 'Keterangan : '.$c->keterangan.'';
                                                                }

                                                            } else {
                                                                echo 'Tidak ada';
                                                            } ?>
                                                        </td>
                                                    </tr>
                                        <?php   }
                                            } else if ( $this->M_uang_makan->cekAbsensiPulang($this->uri->segment(3), $list[$i]) ) {
                                                foreach ($this->M_uang_makan->absensiPulang($this->uri->segment(3), $list[$i]) as $ap ) { ?>
                                                    <!-- ABSENSI PULANG SAJA -->
                                                    <tr bgcolor="#99ffbb">
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $this->format->getHari2(date("l",strtotime($list[$i]))); ?></td>
                                                        <td><?php echo date("d-m-Y", strtotime($list[$i])); ?></td>
                                                        <td>-</td>
                                                        <td><?php echo $ap->jam_pulang; ?></td>
                                                        <td>Pulang Saja</td>
                                                        <td>
                                                            <?php 
                                                            # PERIKSA TUGAS DALAM KOTA
                                                            if ( $this->M_uang_makan->cekTugasPegawai( $this->uri->segment(3), $list[$i])) {
                                                                # TAMPILKAN TUGAS
                                                                foreach ($this->M_uang_makan->tampilTugas( $this->uri->segment(3), $list[$i]) as $t ) {
                                                                    echo 'Tugas Ke -'. $t->tempat.' ('.$t->kategori.')<br>';
                                                                    echo 'Perihal : '.$t->keterangan.'';
                                                                }
                                                            # PERIKSA CUTI
                                                            } elseif ( $this->M_uang_makan->cekCutiPegawai( $this->uri->segment(3), $list[$i])) {
                                                                # TAMPILKAN CUTI
                                                                foreach ($this->M_uang_makan->tampilCuti( $this->uri->segment(3), $list[$i]) as $c ) {
                                                                    echo 'Cuti Kategori - ('.$c->kategori.')<br>';
                                                                    echo 'Keterangan : '.$c->keterangan.'';
                                                                }

                                                            } else {
                                                                echo 'Tidak ada';
                                                            } ?>
                                                        </td>
                                                    </tr>
                                        <?php   }
                                            } else { ?>

                                                <!-- MANGKIR -->
                                                <tr bgcolor="#ffff99">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $this->format->getHari2(date("l",strtotime($list[$i]))); ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($list[$i])); ?></td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Tidak Absen</td>
                                                    <td>
                                                        <?php 
                                                        # PERIKSA TUGAS DALAM KOTA
                                                        if ( $this->M_uang_makan->cekTugasPegawai( $this->uri->segment(3), $list[$i])) {
                                                            # TAMPILKAN TUGAS
                                                            foreach ($this->M_uang_makan->tampilTugas( $this->uri->segment(3), $list[$i]) as $t ) {
                                                                echo 'Tugas Ke -'. $t->tempat.' ('.$t->kategori.')<br>';
                                                                echo 'Perihal : '.$t->keterangan.'';
                                                            }
                                                        # PERIKSA CUTI
                                                        } elseif ( $this->M_uang_makan->cekCutiPegawai( $this->uri->segment(3), $list[$i])) {
                                                            # TAMPILKAN CUTI
                                                            foreach ($this->M_uang_makan->tampilCuti( $this->uri->segment(3), $list[$i]) as $c ) {
                                                                echo 'Cuti Kategori - ('.$c->kategori.')<br>';
                                                                echo 'Keterangan : '.$c->keterangan.'';
                                                            }

                                                        } else {
                                                            echo 'Tidak ada';
                                                        } ?>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                  <?php }

                                    } else { ?>

                                    <?php 
                                        # PERIKSA LEMBUR
                                        if( $this->M_uang_makan->cekLembur( $this->uri->segment(3), $list[$i] ) ){ 

                                            foreach ($this->M_uang_makan->tampilLembur( $this->uri->segment(3), $list[$i])->result() as $a ) { ?>
                                                            
                                                <tr bgcolor="#99ddff">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $this->format->getHari($a->hari); ?></td>
                                                    <td><?php echo $a->tgl; ?></td>
                                                    <td><?php echo $a->jam_masuk; ?></td>
                                                    <td><?php echo $a->jam_pulang; ?></td>
                                                    <td>Lembur</td>
                                                    <td>
                                                        <?php 
                                                        # PERIKSA TUGAS DALAM KOTA
                                                        if ( $this->M_uang_makan->cekTugasPegawai( $this->uri->segment(3), $list[$i])) {
                                                            # TAMPILKAN TUGAS
                                                            foreach ($this->M_uang_makan->tampilTugas( $this->uri->segment(3), $list[$i]) as $t ) {
                                                                echo 'Tugas Ke -'. $t->tempat.' ('.$t->kategori.')<br>';
                                                                echo 'Perihal : '.$t->keterangan.'';
                                                            }
                                                        # PERIKSA CUTI
                                                        } elseif ( $this->M_uang_makan->cekCutiPegawai( $this->uri->segment(3), $list[$i])) {
                                                            # TAMPILKAN CUTI
                                                            foreach ($this->M_uang_makan->tampilCuti( $this->uri->segment(3), $list[$i]) as $c ) {
                                                                echo 'Cuti Kategori - ('.$c->kategori.')<br>';
                                                                echo 'Keterangan : '.$c->keterangan.'';
                                                            }

                                                        } else {
                                                            echo 'Tidak ada';
                                                        } ?>
                                                    </td>
                                                </tr>

                                            <?php }

                                        } else { ?>
                                            <tr bgcolor="#ff9999">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $this->format->getHari2( date('l', strtotime($list[$i])) ); ?></td>
                                                <td><?php echo date('d-m-Y', strtotime( $list[$i] )); ?></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Libur</td>
                                                <td>-</td>
                                            </tr>
                                <?php   }

                                    }

                                } ?>
                                
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
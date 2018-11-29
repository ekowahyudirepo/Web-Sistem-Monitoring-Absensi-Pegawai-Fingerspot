<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/dataTable4.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/styles.css">
</head>
<body class="sidebar-hidden header-fixed sidebar-fixed">
<div class="page-wrapper">

    <?php echo $head; ?>

    <div class="main-container">
        
        <?php echo $navigasi; ?>

        <div class="content">

            <div class="row">
                <div class="col-md-12">
                    <h2><a onclick="window.close()" href="#">Tutup </a> | Uang Makan Pegawai [ <?php echo $this->M_uang_makan->getLabelPeriode(); ?> ]</h2>
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-md-8">
                                    <a target="_blank" href="<?php echo base_url('uang_makan/pdf/'.$this->uri->segment(3).'') ?>" class="btn btn-secondary"><i class="fa fa-file-pdf-o"></i></a>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
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
                                <tr>
                                    <td>Jumlah Uang Makan</td>
                                    <td>:</td>
                                    <td><?php echo $this->M_uang_makan->jmlUm($list, $this->uri->segment(3)); ?></td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <p><i># Rincian Perolehan Uang Makan</i></p>
                            <table>
                                <tr>
                                    <td bgcolor="#99ffbb">Absen</td>
                                    <td bgcolor="#99ddff">Lembur</td>
                                    <td bgcolor="#ffff99">Tidak Absen</td>
                                    <td bgcolor="#ff9999">Libur</td>
                                </tr>
                            </table>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>dist/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jquery.dataTable4.js"></script>
<script src="<?php echo base_url(); ?>dist/js/dataTable4.js"></script>
<script>
    $(function(){
        $("table.table").DataTable();
    })
</script>
<script src="<?php echo base_url() ?>dist/vendor/popper.js/popper.min.js"></script>
<script src="<?php echo base_url() ?>dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>dist/js/carbon.js"></script>
</body>
</html>

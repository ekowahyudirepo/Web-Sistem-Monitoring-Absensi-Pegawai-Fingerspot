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
                    <li class="tab"><a href="<?php echo base_url('mobile/riwayat/'.$this->uri->segment(3).'') ?>">Riwayat Absensi</a></li>
                    <li class="tab"><a href="<?php echo base_url('mobile/uang_makan/'.$this->uri->segment(3).'') ?>">Uang Makan</a></li>
                    <li class="tab"><a class="active" href="<?php echo base_url('mobile/tukin/'.$this->uri->segment(3).'') ?>">Tukin</a></li>
                  </ul>
                </div>
            </nav>
        </div>

        <!-- tukin -->
        <div id="test2" class="col s12" style="margin-top: 70px;">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12">
                        
                        <h6>TUNJANGAN KINERJA </h6>
                        <p>Periode : <?php echo $this->M_mobile->getLabelPeriode() ?></p>

                        <table>
                            <tr>
                                <td bgcolor="#99ffbb">Absensi</td>
                                <td bgcolor="#ffff99">Tidak Absen</td>
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
                                    <th>Harus Pulang</th>
                                    <th>Lama Kerja (menit)</th>
                                    <th>TL</th>
                                    <th>PSW</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $l1=0; ?>
                                <?php $no=1; ?>
                                <?php for($i=0; $i<count($list);$i++ ){
                                    # PERIKSA TANGGAL MASUK
                                    if ( ! $this->M_tukin->cekTglLibur($list[$i]) ) {
                                        # PERIKSA CUTI NEGARA
                                        if( $this->M_tukin->cekCutiNegara( $this->uri->segment(3), $list[$i]) ){ ?>

                                            <tr bgcolor="#ffff99">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $this->format->getHari2(date("l",strtotime($list[$i]))); ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($list[$i])); ?></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td><?php echo $this->M_tukin->getLamaKerja(); ?>
                                                    
                                                    <?php $l1 = $l1 + $this->M_tukin->getLamaKerja(); ?>
                                                </td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Cuti Negara</td>
                                                <td>
                                                    <?php echo $this->M_tukin->tampilCutiNegara($this->uri->segment(3), $list[$i]); ?>
                                                </td>
                                            </tr>

                                    <?php } elseif( $this->M_tukin->cekTugas($this->uri->segment(3), $list[$i], 'Luar Kota' ) ) { ?>

                                            <tr bgcolor="#ffff99">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $this->format->getHari2(date("l",strtotime($list[$i]))); ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($list[$i])); ?></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <?php echo $this->M_tukin->getLamaKerja(); ?>
                                                    
                                                    <?php $l1 = $l1 + $this->M_tukin->getLamaKerja(); ?>
                                                </td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Tugas Luar Kota</td>
                                                <td>
                                                    <?php echo $this->M_tukin->tampilTugas($this->uri->segment(3), $list[$i], 'Luar Kota' ); ?>
                                                </td>
                                            </tr>

                                    <?php } elseif( $this->M_tukin->cekAbsensiMasuk($this->uri->segment(3), $list[$i] ) ) { 
                                            # TAMPIL ABSEN MASUK
                                            foreach( $this->M_tukin->absensiMasuk($this->uri->segment(3), $list[$i] )->result() as $row ){ ?>
                                                <tr bgcolor="#99ffbb">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $this->format->getHari($row->hari); ?></td>
                                                    <td><?php echo $row->tgl; ?></td>
                                                    <td><?php echo $row->jam_masuk; ?></td>
                                                    <td>
                                                        <?php echo ($this->M_tukin->absensiPulang($this->uri->segment(3), $list[$i] ) != '')? $this->M_tukin->absensiPulang($this->uri->segment(3), $list[$i] ) : '-'; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->M_tukin->harusPulang($this->M_tukin->jamMasukSet($row->jam_masuk), $list[$i] ) ?>
                                                    </td>
                                                    <td>
                                                        <?php if( $this->M_tukin->absensiPulang($this->uri->segment(3), $list[$i] ) != ''  ){ ?>
                                                        <?php echo $this->M_tukin->lamaKerja($this->M_tukin->jamMasukSet($row->jam_masuk), $this->M_tukin->absensiPulang($this->uri->segment(3), $list[$i] ), $list[$i] ); ?>

                                                        <?php $l1 = $l1 + $this->M_tukin->lamaKerja($this->M_tukin->jamMasukSet($row->jam_masuk), $this->M_tukin->absensiPulang($this->uri->segment(3), $list[$i] ), $list[$i] ); ?>
                                                        <?php }else{ echo "-"; } ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->M_tukin->telat($row->jam_masuk); ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if($this->M_tukin->absensiPulang($this->uri->segment(3), $list[$i] ) != ''){
                                                                echo $this->M_tukin->pulangAwal($this->M_tukin->absensiPulang($this->uri->segment(3), $list[$i] ), $this->M_tukin->harusPulang($this->M_tukin->jamMasukSet($row->jam_masuk) , $list[$i] ));
                                                            } elseif( $this->M_tukin->absensiPulang($this->uri->segment(3), $list[$i] ) == '' && $list[$i] != date('Y-m-d') ) { 
                                                                echo 'PSW.4';
                                                            }
                                                        ?>
                                                    </td>

                                                    <?php if( $this->M_tukin->cekTugas($this->uri->segment(3), $list[$i], 'Dalam Kota' )){ ?>
                                                    <td>
                                                        Tugas Dalam Kota
                                                    </td>
                                                    <td>
                                                        <?php echo $this->M_tukin->tampilTugas($this->uri->segment(3), $list[$i], 'Dalam Kota' ); ?>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>
                                                        <?php 
                                                            if( $this->M_tukin->absensiPulang($this->uri->segment(3), $list[$i] ) == '' && $list[$i] != date('Y-m-d') ) { 
                                                                echo 'Absensi Masuk Saja';
                                                            } else {
                                                                echo 'Absensi';
                                                            }
                                                         ?>
                                                    </td>
                                                    <td>-</td>
                                                    <?php } ?>

                                                </tr>

                                            <?php } ?> 

                                    <?php } elseif( $this->M_tukin->cekAbsensiPulang($this->uri->segment(3), $list[$i] ) ) { 
                                        # TAMPIL ABSEN PULANG 
                                        foreach( $this->M_tukin->tampilAbsensiPulang($this->uri->segment(3), $list[$i] )->result() as $row2 ){ ?>
                                            <tr bgcolor="#99ffbb">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $this->format->getHari($row2->hari); ?></td>
                                                <td><?php echo $row2->tgl; ?></td>
                                                <td>-</td>
                                                <td><?php echo $row2->jam_pulang; ?></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>TL.4</td>
                                                <td>
                                                    <?php 
                                                        echo $this->M_tukin->pulangAwal($row2->jam_pulang, $this->M_tukin->cekPswPulangSaja($list[$i]));
                                                    ?>
                                                </td>

                                                <?php if( $this->M_tukin->cekTugas($this->uri->segment(3), $list[$i], 'Dalam Kota' )){ ?>
                                                <td>
                                                    Tugas Dalam Kota
                                                </td>
                                                <td>
                                                    <?php echo $this->M_tukin->tampilTugas($this->uri->segment(3), $list[$i], 'Dalam Kota' ); ?>
                                                </td>
                                                <?php } else { ?>
                                                <td>Absensi Pulang Saja</td>
                                                <td>-</td>
                                                <?php } ?>

                                            </tr>

                                        <?php } ?>  

                                    <?php } else { ?>
                                        <!-- MANGKIR -->
                                            <tr bgcolor="#ffff99">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $this->format->getHari2(date("l",strtotime($list[$i]))); ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($list[$i])); ?></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Tidak Absen</td>
                                                <td>-</td>
                                            </tr>
                                    <?php } 

                                    } else {
                                        # PERIKSA LEMBUR
                                        
                                    } 
                                }?>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="6" align="center" >Jumlah Jam Kerja</td>
                                    <td><?php echo $l1; ?></td>
                                    <td colspan="4"></td>
                                </tr>
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
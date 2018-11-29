<!DOCTYPE html>
<html>
<head>
	<title>Tukin <?php echo $nama_pegawai; ?> ~ PDF</title>
<style>
    html{
        margin-top: 1.5em;
    }
	body{
		font-family: sans-serif;
		font-size: 10px;
	}

	table.data{
		border-collapse: collapse;
	}

	table.data tr th, table.data tr td{
		padding: 4px 10px 4px 10px; 
	}

	table.data tr th{
		border-bottom-style: double;
	}
</style>
</head>
<body>
	<p style="font-size: 8px"><?php echo date('d/m/Y'); ?></p>
	<div style="width: 100%">
		<div style="width: 20%;display: inline-block;"><img width="100px" src="./dist/imgs/iain.png"></div>
		<div style="width: 70%;display: inline-block;">
			<p style="text-align: center;font-size: 16px;font-weight: bold;">KEMENTERIAN AGAMA REPUBLIK INDONESIA<br>INSTITUT AGAMA ISLAM NEGERI<br>(IAIN) KEDIRI</p>
			<p style="text-align: center;margin-top: 5px;font-size: 9px">Jalan Sunan Ampel No.07 Ngronggo Kota Kediri Kode Pos 64127 <br> Telepon (0354) 689282 Faksimile (0354) 686564 <br>
			Website : www.iainkediri.ac.id
			</p>
		</div>
	</div>
	<hr style="border-top: 3px solid black">
	<p style="font-size: 16px;font-weight: bold;">TUKIN PEGAWAI [ <?php echo $this->M_tukin->getLabelPeriode() ?> ]</p>
    <br>
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
    </table>

    <br>
    <br>
    <p><i># Rincian Perolehan Tukin</i></p>
    <table>
        <tr>
            <td bgcolor="#99ffbb">Absensi</td>
            <td bgcolor="#ffff99">Tidak Absen</td>
        </tr>
    </table>
    <br>
    <br>
	<table class="data" border="1" width="100%">
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

</body>
</html>
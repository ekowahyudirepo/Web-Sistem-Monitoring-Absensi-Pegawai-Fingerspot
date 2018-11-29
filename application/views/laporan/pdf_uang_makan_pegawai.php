<!DOCTYPE html>
<html>
<head>
	<title>Uang Makan <?php echo $nama_pegawai; ?> ~ PDF</title>
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
	<p style="font-size: 16px;font-weight: bold;">UANG MAKAN PEGAWAI [ <?php echo $this->M_uang_makan->getLabelPeriode() ?> ]</p>
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
        <tr>
            <td>Jumlah Uang Makan</td>
            <td>:</td>
            <td><?php echo $this->M_uang_makan->jmlUm($list, $this->uri->segment(3)); ?></td>
        </tr>
    </table>

    <br>
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
    <br>
	<table class="data" border="1" width="100%">
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
</body>
</html>
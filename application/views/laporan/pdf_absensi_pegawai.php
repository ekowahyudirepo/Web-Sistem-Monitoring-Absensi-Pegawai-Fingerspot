<!DOCTYPE html>
<html>
<head>
	<title>Absensi <?php echo $nama_pegawai; ?> ~ PDF</title>
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
	<p style="font-size: 16px;font-weight: bold;">ABSENSI PEGAWAI [ <?php echo $this->M_pegawai->getLabelPeriode() ?> ]</p>
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
    <br>
    <p><i># Rincian Absensi</i></p>
	<table class="data" border="1" width="100%">
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
</body>
</html>
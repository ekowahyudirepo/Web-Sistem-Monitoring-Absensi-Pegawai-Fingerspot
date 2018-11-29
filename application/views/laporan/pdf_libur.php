<!DOCTYPE html>
<html>
<head>
	<title>Libur ~ PDF</title>
<style>
    html{
        margin-top: 1.5em;
    }
	body{
		font-family: sans-serif;
		font-size: 10px;
	}

	table{
		width: 100%;
		border-collapse: collapse;
	}

	table tr th, table tr td{
		padding: 4px 10px 4px 10px; 
	}

	table tr th{
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
	<p style="font-size: 16px;font-weight: bold;">DATA LIBUR [ <?php echo $this->M_libur->getLabelPeriode() ?> ]</p>
	<table border="1">
		<thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $get_libur->result() as $row ){ ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('d', strtotime($row->mulai))."-". date('d/m/Y',strtotime($row->selesai)); ?></td>
                <td><?php echo $row->keterangan_libur; ?></td>
            </tr>
            <?php } ?>
        </tbody>
	</table>
</body>
</html>
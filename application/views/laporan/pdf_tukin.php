<!DOCTYPE html>
<html>
<head>
	<title>Tukin ~ PDF</title>
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
	<p style="font-size: 16px;font-weight: bold;">DATA TUKIN SEMUA PEGAWAI [ <?php echo $this->M_tukin->getLabelPeriode() ?> ]</p>
    
	<table border="1">
		<thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Ketegori</th>
                <th>Status</th>
                <th>TL.1</th>
                <th>TL.2</th>
                <th>TL.3</th>
                <th>TL.4</th>
                <th>PSW.1</th>
                <th>PSW.2</th>
                <th>PSW.3</th>
                <th>PSW.4</th>
                <th>Tidak Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $get_data_pegawai->result() as $row ){ ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->nik; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo $row->kategori; ?></td>
                <td><?php echo $row->status; ?></td>
                <td align="center">
                    <?php echo $this->M_tukin->getTl($list, $row->pin, 'TL.1'); ?>
                </td>
                <td align="center">
                    <?php echo $this->M_tukin->getTl($list, $row->pin, 'TL.2'); ?>
                </td>
                <td align="center">
                    <?php echo $this->M_tukin->getTl($list, $row->pin, 'TL.3'); ?>
                </td>
                <td align="center">
                    <?php echo $this->M_tukin->getTl($list, $row->pin, 'TL.4'); ?>
                </td>
                <td align="center">
                    <?php echo $this->M_tukin->getPa($list, $row->pin, 'PSW.1'); ?>
                </td>
                <td align="center">
                    <?php echo $this->M_tukin->getPa($list, $row->pin, 'PSW.2'); ?>
                </td>
                <td align="center">
                    <?php echo $this->M_tukin->getPa($list, $row->pin, 'PSW.3'); ?>
                </td>
                <td align="center">
                    <?php echo $this->M_tukin->getPa($list, $row->pin, 'PSW.4'); ?>
                </td>
                <td align="center">
                    <?php echo $this->M_tukin->mangkir($list, $row->pin); ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
	</table>
</body>
</html>
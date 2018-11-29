<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	table{
		border-collapse: collapse;
	}
	table tr td{
		padding: 10px;
	}
</style>
<body>

<center>
<h2>Simulasi Absensi Pegawai</h2>
<form action="<?php echo base_url('log/p') ?>" method="POST">
	<table border="1">
		<tr>
			<td>Mesin</td>
			<td>
				<select name="mesin">
					<?php for( $i=1; $i<=5; $i++ ){ ?>
					<option value="MS<?php echo $i; ?>">MESIN <?php echo $i; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Pegawai</td>
			<td>
				<select name="pin">
					<?php foreach ($pegawai->result() as $p) { ?>
					<option value="<?php echo $p->pin; ?>"><?php echo $p->nama; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>
				<input type="date" name="tgl">
			</td>
		</tr>
		<tr>
			<td>Jam</td>
			<td>
				<input type="time" name="time">
			</td>
		</tr>
		<tr>
			<td>Mode</td>
			<td>
				<select name="mode">
					<option value="0">Masuk</option>
					<option value="1">Keluar</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>
				<b style="color: red"><?php echo $this->session->flashdata('alert'); ?></b>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="" value="Absen"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>
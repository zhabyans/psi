<html>
<head>
	<title>Menghubungkan codeigniter dengan database mysql</title>
</head>
<body>
	<h1>List Data Barang</h1>
	<table border="1">
		<tr>
			<th>Id_Pendataan</th>
			<th>Id_Barang</th>
			<th>Nama_Barang</th>
			<th>Id_User</th>
			<th>Tanggal_Masuk</th>
			<th>Stok</th>
			<th>Status_Retur</th>
		</tr>
		<?php foreach($barang as $pb){ ?>
		<tr>
			<td><?php echo $pb->ID_PENDATAAN ?></td>
			<td><?php echo $pb->ID_BARANG ?></td>
			<td><?php echo $pb->NAMA_BARANG ?></td>
			<td><?php echo $pb->ID_USER ?></td>
			<td><?php echo $pb->TANGGAL_MASUK ?></td>
			<td><?php echo $pb->STOK ?></td>
			<td><?php echo $pb->STATUS_RETUR ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>

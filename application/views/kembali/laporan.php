<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data</title>
	<style type="text/css">
		#outtable{
			padding: 20px;
			border: 1px solid #e3e3e3;
			width: 600px;
			border-radius: 5px;
		}
		.short{
			width: 50px;
		}
		.normal{
			width: 150px;
		}
		table{
			border-collapse: collapse;
			font-family: arial;
			color: #5E5B5C;
		}
		thead th{
			text-align: left;
			padding: 10px;
		}
		tbody td{
			border-top: 1px solid #e3e3e3;
			padding: 10px;
		}
		tbody tr:nth-child(even){
			background: #F6F5FA;
		}
		tbody tr:hover{
			background: #EAE9F5;
		}
	</style>
</head>
<body>
	<div id="outtable">
    <h3>Laporan Data Pengembalian</h3>
		<table width="100%">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Produk</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Lokasi Mitra</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Terlambat</th>
                <th scope="col">Denda</th>
                <th scope="col">Catatan</th>
            </tr>
            </thead>
			<tbody>
            <?php $i=1; 
            $no =1;?>
              <?php foreach ($kembali as $k) : 
                ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $k['nama_peminjam']?></td>
                <td><?= $k['nama_produk']?></td>
                <td><?= $k['nama_mitra']?></td>
                <td><?= date('d F Y', strtotime($k['tanggal_kembali']));?></td>
                <td><?= $k['terlambat']; ?></td>
                <td><?= $k['denda']; ?></td>
                <td><?= $k['status']; ?></td>
                </tr>
			</tbody>
            <?php $no++; ?>
				<?php endforeach; ?>
		</table>
	</div>

</body>
</html>
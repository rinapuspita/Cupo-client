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
    <h3>Laporan Data Produk</h3>
		<table width="100%">
            <thead>
            <tr>
                <th scope="col">ID Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Status</th>
                <th scope="col">ID Lokasi</th>
            </tr>
            </thead>
			<tbody>
            <?php $i=1; 
            $no =1;?>
              <?php foreach ($produk as $r) : 
                ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $r['nama_produk']; ?></td>
                <td>
                <?= $r['status'];?>
                </td>
                <td><?= $r['id_mitra']; ?></td>
              </tr>
				<?php $no++; ?>
				<?php endforeach; ?>

			</tbody>
		</table>
	</div>

</body>
</html>
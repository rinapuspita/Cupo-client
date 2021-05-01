<!DOCTYPE html>
<html>
<head>
	<title>QR Code</title>
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
		<table>
			<tbody>
				<?php $no=1; ?>
				<?php foreach($produk as $r):
					$path = 'downloads/';
					$img = 'qr' . $no++ . '.png';
					file_put_contents($path . $img, base64_decode($r['qr_code'])) ?>
					<tr>
						<td> <img src="<?= 'https://server-cupo.xyz/assets/images/'. $r['qr_code']; ?>" style="width: 100px; height:100px;"> </td>
					</tr>
					<tr>
						<td> <?= $r['nama_produk'] ?></td>
					</tr>
				<?php $no++; ?>
				<?php endforeach; ?>

			</tbody>
		</table>
	</div>

</body>
</html>
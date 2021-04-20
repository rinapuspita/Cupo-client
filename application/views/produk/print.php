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
		<h2 align="center">QR CODE</h2>
		<table>
			<thead>
				<tr>
					<th class="short">No</th>
					<th class="normal">Qr Code</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php foreach($produk as $r): ?>
					<tr>
						<td> <?php echo $no; ?> </td>
						<td> <img src="<?= 'https://server-cupo.xyz/assets/images/'. $r['qr_code'].'.png'; ?>" style="width: 100px; height:100px;"> </td>
					</tr>
				<?php $no++; ?>
				<?php endforeach; ?>

			</tbody>
		</table>
	</div>

</body>
</html>
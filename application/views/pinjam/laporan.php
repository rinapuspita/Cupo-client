<!DOCTYPE html>
<html>
<head>
	<title>Report Data</title>
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
    <h3>Report Loan Data</h3>
	<?php if($this->session->userdata('user_id') && !empty($pinjam)) { ?>
		<table width="100%">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Loan ID</th>
                <th scope="col">Product</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Partner Location</th>
                <th scope="col">Loan Date</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
			<tbody>
            <?php $i=1; 
            $no =1;?>
			
              <?php foreach ($pinjam as $p) : 
                ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $p['id_pinjam']?></td>
                <td><?= $p['nama_produk']?></td>
                <td><?= $p['nama_peminjam']?></td>
                <td><?= $p['fullname']?></td>
                <td><?= date('d F Y', strtotime($p['tanggal_pinjam']));?></td>
                <td><?= $p['status']; ?></td>
                </tr>
			</tbody>
            <?php $no++; ?>
				<?php endforeach; ?>
			
		</table>
		<?php } else{?>
            <div class="alert alert-danger" role="alert">
            Empty Data.
            </div>
            <?php } ?>
	</div>

</body>
</html>
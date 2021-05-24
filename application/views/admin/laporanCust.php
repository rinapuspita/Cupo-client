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
    <h3>Report Customer Data</h3>
	<?php if($this->session->userdata('user_id') && !empty($user)) { ?>
		<table width="100%">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
			<tbody>
            <?php $i=1; 
            $no =1;?>
              <?php foreach ($user as $r) :  ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $r['fullname']; ?></td>
                <td><?= $r['username']; ?></td>
                <td><?= $r['email']; ?></td>
                </tr>
			</tbody>
            <?php $no++; ?>
				<?php endforeach; ?>
		</table>
		<?php } else{?>
                <div class="alert alert-danger" role="alert">
                Empty Data.<br>
                </div>
                <?php } ?>
	</div>

</body>
</html>
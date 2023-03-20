<?php
session_start()
	
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
	<style type="text/css">
		table{
			width:850px;
		}
		td{
			border:solid 1px black;
		}
	</style>
</head>

<body>
	<center><a href="insert_dimm.php">Добавить данные</a></center>
	<center><a href="delete_name_dimm.php">Удаление по наименованию</a></center>
	<table>
		<tr>
			<th>id</th>
			<th>SKU</th>
			<th>Vendor</th>
			<th>Oscillation(Mhz)</th>
			<th>Amount(GB)</th>
			<th>Price</th>
			<th>type</th>
			<th>Подробнее</th>
			<th>Обновить</th>
			<th>Удалить</th>
		</tr>
	
	<?php
	include('connect_dimm_db.php');
	$sql = "SELECT * FROM `dimms` INNER JOIN `memory_type` ON `dimms`.`type` = `memory_type`.`id_type`";
	$result = mysqli_query($link, $sql);
	while($dimm = mysqli_fetch_array($result)){
	echo "<tr>
			<td>".$dimm['id']."</td>
			<td>".$dimm['SKU']."</td>
			<td>".$dimm['Vendor']."</td>
			<td>".$dimm['oscillation']."</td>
			<td>".$dimm['amount']."</td>
			<td>".$dimm['price']."</td>
			<td>".$dimm['memory_type']."</td>
			<td><a href='detail_dimm.php?id=".$dimm['id']."'>Подробнее</a></td>
			<td><a href='update_dimm.php?id=".$dimm['id']."'>Обновить</a></td>
			<td><a href='delete_dimm.php?id=".$dimm['id']."'>Удалить</a></td>
		</tr>";}
	?>
	</table>
	
</body>
</html>
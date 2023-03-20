<?php
session_start()
	
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>
	

<body>
	<?php
	$id = $_GET['id'];
	include('connect_dimm_db.php');
	$sql = "SELECT * FROM `dimms` WHERE `id` = $id";
	$result = mysqli_query($link, $sql);
	$dimms = mysqli_fetch_array($result);
	?>
	<p>SKU <?php echo $dimms['SKU']?></p>
	<p>Производитель <?php echo $dimms['Vendor']?></p>
	<p>Частота <?php echo $dimms['oscillation']?></p>
	<p>Объём <?php echo $dimms['amount']?></p>
	<p>Цена <?php echo $dimms['price']?> рублей</p>
	<a href="index.php">Назад</a>
</body>
</html>
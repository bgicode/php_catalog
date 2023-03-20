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
	echo "<a href='index.php'>Назад</a>";
	$id = $_GET['id'];
	include('connect_dimm_db.php');
	$sql_tmp = "SELECT * FROM `dimms` WHERE `id` = $id";
	$result_tmp = mysqli_query($link, $sql_tmp);
	$dimms_tmp = mysqli_fetch_array($result_tmp);
	if(isset($_POST['upd_dimms'])){
		$SKU = $_POST['SKU'];
		$Vendor = $_POST['Vendor'];
		$oscillation = $_POST['oscillation'];
		$amount = $_POST['amount'];
		$price = $_POST['price'];
		$type = $_POST['type'];
		$sql = "UPDATE `dimms` SET `SKU` = '$SKU',
									`Vendor` = '$Vendor',
									`oscillation` = '$oscillation',
									`amount` = '$amount',
									`price` = '$price'
									`type` = '$type'
				WHERE `dimms`.`id` = $id";
		mysqli_query($link, $sql);
		echo "Данные успешно изменены <a href='index.php'>Назад</a>";
		
		
	}else{
	
	?>
	<form method="post">
		<input type="text" name="SKU" value="<?php echo $dimms_tmp['SKU'] ?>"><br>
		<input type="text" name="Vendor" value="<?php echo $dimms_tmp['Vendor'] ?>"><br>
		<input type="text" name="oscillation" value="<?php echo $dimms_tmp['oscillation'] ?>"><br>
		<input type="text" name="amount" value="<?php echo $dimms_tmp['amount'] ?>"><br>
		<input type="text" name="price" value="<?php echo $dimms_tmp['price'] ?>"><br>
		<select name="type">
			<?php
				$sql_type="SELECT * FROM `memory_type`";
					$result_type=mysqli_query($link, $sql_type);
					while($prod_type=mysqli_fetch_array($result_type)){
						echo "<option value='".$prod_type['id_type']."'>".$prod_type['memory_type']."</option>";
					}
			?>
		</select><br>
		<input type="submit" value="Изменить" name="upd_dimms"><br>
	</form>
	
	<?php } ?>
</body>
</html>
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
	include('connect_dimm_db.php');
	echo "<a href='index.php'>Назад</a>";
	if(isset($_POST['write'])){
		$SKU = $_POST['SKU'];
		$Vendor = $_POST['Vendor'];
		$oscillation = $_POST['oscillation'];
		$amount = $_POST['amount'];
		$price = $_POST['price'];
		$type = $_POST['type'];
		if(preg_match("/^[0-9]*[.,]?[0-9]+$/",$price)){	
		$sql = "INSERT INTO `dimms`(`SKU`,`Vendor`,`oscillation`,`amount`,`price`,`type`) VALUES ('$SKU','$Vendor','$oscillation','$amount','$price','$type')";
		mysqli_query($link, $sql);
		echo "Данные добавлены <a href='index.php'>Назад</a>";	
		}
		else{
			?>
			<form method="post">
		<input type="text" name="SKU"><span>SKU</span><br>
		<input type="text" name="Vendor"><span>Vendor</span><br>
		<input type="text" name="oscillation"><span>oscilation(Mhz)</span><br>
		<input type="text" name="amount"><span>amount(GB)</span><br>
		<input type="text" name="price" value="<?php echo "Данные некоректны" ?>"><span>price</span> <br>
		<select name="type">
			<?php
				$sql_type="SELECT * FROM `memory_type`";
					$result_type=mysqli_query($link, $sql_type);
					while($prod_type=mysqli_fetch_array($result_type)){
						echo "<option value='".$prod_type['id_type']."'>".$prod_type['memory_type']."</option>";
					}
			?>
		</select><br>		
		<input type="submit" value="Добавить" name="write">
	</form>
	
	<?php ;
		}
	} else {
	?>
	<form method="post">
		<input type="text" name="SKU"><span>SKU</span><br>
		<input type="text" name="Vendor"><span>Vendor</span><br>
		<input type="text" name="oscillation"><span>oscilation(Mhz)</span><br>
		<input type="text" name="amount"><span>amount(GB)</span><br>
		<input type="text" name="price"><span>price</span><br>
		<select name="type">
			<?php
				$sql_type="SELECT * FROM `memory_type`";
					$result_type=mysqli_query($link, $sql_type);
					while($prod_type=mysqli_fetch_array($result_type)){
						echo "<option value='".$prod_type['id_type']."'>".$prod_type['memory_type']."</option>";
					}
			?>
		</select><br>
		<input type="submit" value="Добавить" name="write">
	</form>
	
	<?php } ?>
</body>
</html>
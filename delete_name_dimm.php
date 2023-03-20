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
	if(isset($_POST['del_dimms'])){
		$req = $_POST['req'];
		$sql = "DELETE FROM `dimms`	WHERE `dimms`.`SKU` = '$req'";
		mysqli_query($link, $sql);
		echo "Все пропало <a href='index.php'>Назад</a>";
			
	}else{
	
	?>
	
	<form method="post">
		<p>Вы уверены?</p>
		<input type='text' name="req">
		<input type="submit" value="DA" name="del_dimms">
		<p><a href="index.php">Нет, передумал, вернуть все обратно</a></p>	
	</form>
	
	<?php } ?>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>

<body>
	<?php
	if(isset($_POST["send"])){
		$user_name = $_POST["user_name"];
		$email_adress = $_POST["email_adress"];
		if(strlen($user_name)>1 and preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$email_adress)){
			$msg = "Имя: ".$user_name." Электронная почта: ".$email_adress;
			mail("desimo123@yandex.ru","Запрос обратной связи",$msg);
			echo "Ваша заявка принята";
		}
		else{
			echo 
				"Введены некорректные данные<br>
				<form method='post'>
					<input type='text' name='user_name' value='$user_name'><br> 
					<input type='email' name='email_adress' value='$email_adress'><br>
					<input type='submit' name='send' value='Заказать обратный звонок'>
				</form>";
		}
	}
	else{
		echo "
			<form method='post'>
				<input type='text' name='user_name'><br> 
				<input type='email' name='email_adress'><br>
				<input type='submit' name='send' value='Заказать обратный звонок'>
			</form>
		";
		
	}
	
	?>
	
	
</body>
</html>
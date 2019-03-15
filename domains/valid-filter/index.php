<?php 
	class Valid {
		
		
		public static function validEmail($email) {
			//$reg_1 = '/^[a-z0-9_]+(\.[a-z0-9_-]+)*@([0-9a-z][0-9a-z]*\.)+([a-z]){2,4}$/';
			$reg_2 = '/^.{5,256}$/';
			if(empty($email)) throw new Exception('E-mail не указан ');
			
			if(!preg_match($reg_2, $email)) throw new Exception('E-mail слишком длинный');
			if(filter_var($email,FILTER_VALIDATE_EMAIL) !== $email) throw new Exception('E-mail указан не верно');
           	
			echo 'Вы ввели электронный адрес: '.$email;
			return $email;
			
			
		}
	}
	
	
	
		if(isset($_POST['form'])) {
			
			
				$a = $_POST['email'];
				$email = htmlspecialchars($a);
			
try {
	
		/*$email = 'ghjjffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff@.com';*/
		Valid::validEmail($email);
	} catch (Exception $e) {
		echo '<br />Возникла ошибка: '.$e->getMessage();
	}

		}

	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Проверка на валидноссть</title>
</head>

<body>
	
	<form name="form" method="post" action="index.php">
		<label>Email: 
		<input type="text" name="email">
			<button name="form" type="submit">Отправить</button>
		</label>
	</form>
</body>
</html>
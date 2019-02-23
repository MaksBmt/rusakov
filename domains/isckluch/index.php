<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Обработка исключений</title>
</head>

<body>
	
	<?php 
	class Valid {
		
		
		public static function validEmail($email) {
			$reg_1 = '/^[a-z0-9_]+(\.[a-z0-9_-]+)*@([0-9a-z][0-9a-z]*\.)+([a-z]){2,4}$/';
			$reg_2 = '/^.{5,256}$/';
			if(empty($email)) throw new Exception('E-mail не указан ');
			if(!preg_match($reg_1, $email)) throw new Exception('E-mail указан не верно');
			if(!preg_match($reg_2, $email)) throw new Exception('E-mail слишком длинный');
           		
			return $email;
			
		}
	}
	
	
	try {
		Valid::validEmail('ghjj@gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg.com');
	} catch (Exception $e) {
		echo '<br />Возникла ошибка: '.$e->getMessage();
	}
	?>
	
</body>
</html>
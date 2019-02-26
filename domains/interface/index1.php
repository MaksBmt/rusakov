<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>

<body>
	<?php 
	trait CanMove {
		public function move() {
			echo 'Движение авто' ."<br>";
		}
		
	}
	trait CanFly {
		public function fly() {
			echo 'Полет самолета';
		}
	}
	class Car {
		
		use CanMove;
			
	}
	class Aircraft  {
		use CanFly;
	}
	$car = new Car();
	$car -> move();
	
	$air = new Aircraft();
	$air -> fly();
	?>
</body>
</html>
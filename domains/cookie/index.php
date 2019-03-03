<?php
$counter_1=$_COOKIE['coun'];
$a = $_POST[ 'page' ];
if ( $a == 'Красный' ){
	//$counter_1='#F50004';
	setcookie('coun',$counter_1='#F50004',time()+1000);
	
}
if ( $a == 'Желтый' )setcookie('coun',$counter_1='#F1CA00',time()+1000);
if ( $a == 'Зеленый' )setcookie('coun',$counter_1='#16EC05',time()+1000);

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cookie</title>
</head>

<body>
	<div style=" width: 500px; height: 500px; margin: 10px auto; display: flex; background-color: <?=$counter_1?>;">
	<form method="post" name="cookie" style="margin: 100px auto; ">
		<input type="text" name="page" list="url" placeholder="выберете цвет фона">
		<datalist id="url">
			<option value="Красный">Красный</option>
			<option value="Желтый">Желтый</option>
			<option value="Зеленый">Зеленый</option>
			
		</datalist>
		<input type="submit"  value="Выберете цвет фона">
	</form>
	</div>
</body>
</html>
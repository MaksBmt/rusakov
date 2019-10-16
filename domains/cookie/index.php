<?php 
session_start();
$a = $_POST[ 'color' ];
if ( $a == 'Красный' ) {$counter_1 = '#F50004';
						$sel_1= 'selected';
					   }
if ( $a == 'Желтый' ) { $counter_1 = '#F1CA00';$sel_2= 'selected';}
if ( $a == 'Зеленый' ) {$counter_1 = '#16EC05';$sel_3= 'selected';}
$_SESSION['coun'] = $counter_1; 
/*$a = $_POST[ 'color' ];
if ( $a == 'Красный' ){
//$counter_1='#F50004';
	setcookie('coun',$counter_1='#F50004',time()+1000);
	
}
if ( $a == 'Желтый' )setcookie('coun',$counter_1='#F1CA00',time()+1000);
if ( $a == 'Зеленый' )setcookie('coun',$counter_1='#16EC05',time()+1000);
$_COOKIE['coun'] = $counter_1;*/

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
		<label for="color">Выберете цвет</label>
		<select name="color" id="color">
			<option value="Красный" <?=$sel_1?>>Красный</option>
			<option value="Желтый" <?=$sel_2?>>Желтый</option>
			<option value="Зеленый" <?=$sel_3?>>Зеленый</option>
		</select>
		
		<input type="submit"  value="Выберете цвет фона">
	</form>
	</div>
</body>
</html>
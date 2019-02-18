<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>oop-1</title>
</head>

<body>
	<?php 
	class Point 
{ 
private $x; 
private $y; 

public function __construct($x,$y) 
{ 
$this->x = $x; 
$this->y = $y; 
} 
		public function setName() {
		$this->x=$x;
		$this->y=$y;
	}
} 

$x = ''; 
$y = ''; 
$file = 'coordinates.txt';
$resX ='';
	

if ( isset( $_POST[ 'download' ] ) ) {

	if ( file_exists( $file ) ) //проверяет наличие файла по указанному пути ($file)
	{
		$point = unserialize( file_get_contents( $file ) ); //обратно строку в объект??
		//$x = $point->x;
		//$y = $point->y;
		$point -> setName($x,$y);
		echo $resX = 'файл успешно загружен';
	} else echo 'Сохраните координаты'.'<br>';
}

//$save = $_POST[ 'save' ];
if ( isset( $_POST[ 'save' ] ) ) {
	if(isset($_POST[ 'x' ])) {
		$x = $_POST[ 'x' ];
	if(isset($_POST[ 'y' ])) {
		$y = $_POST[ 'y' ];
	if  ( is_numeric( $_POST[ 'x' ] ) || is_float( $_POST[ 'x' ] ) ) {
		
		if ( is_numeric( $_POST[ 'y' ] ) || is_float( $_POST[ 'y' ] ) )  {
		$point = new Point( $_POST[ 'x' ], $_POST[ 'y' ] );
		file_put_contents( $file, serialize( $point ) ); //запись в файл строки из объекта
		echo $resX = 'Файл успешно сохранен';
	} else {
			echo $resX = 'введите правильно координату Y';
			$y = '';
		}
	} else {
		echo $resX = 'введите правильно координату X';
		$x = '';
	}
	

	}
		else echo 'заполните координату У';
	}
	
	else echo'заполните значение  Х';

}
	
	
?>
	<form method="post" name="myForm"  action="index.php">
		<label>X :
		<input style="margin-top: 58px; border: 1px solid #000; border-radius: 3px; resize: none; outline: none; min-width: 130px; min-height: 30px; padding-left: 15px"  type="text" name="x" value="<?=$x?>"
			   >
		</label>
		<label>Y :
		<input style="margin-top: 58px; border: 1px solid #000; border-radius: 3px; resize: none; outline: none; min-width: 130px; min-height: 30px; padding-left: 15px"  type="text" name="y" value="<?=$y?>"
			   >
		</label>
		<input type="submit" name="save" value="Сохранить">
		<input type="submit" name="download" value="Загрузить">

	</form>

</body>
</html>
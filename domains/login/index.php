<?php
session_start();


$error = false;
if ( isset( $_POST[ 'auth' ] ) ) {
	$_SESSION[ 'login' ] = $_POST[ 'login' ];
	echo $_SESSION[ 'login' ] . '<br>';
	$_SESSION[ 'password' ] = md5( $_POST[ 'password' ] );
	//echo $_SESSION[ 'password' ] . '<br>';
	$error = true;
}
if ( isset( $_GET[ 'f' ] ) && $_GET[ 'f' ]=='logout' ) { //выход
	unset( $_SESSION[ 'login' ] );
	unset( $_SESSION[ 'password' ] );
	echo 'проверка выхода' . '<br>';
}
$login = [ 'admin', 'moderator' ];
$password = [ '2afe11a94955f475dc98ef45f9cb8cf1', '014c34b07467c4771dd8436be9824cb6' ];
$auth = false;

if ( isset( $_SESSION[ 'login' ] ) && isset( $_SESSION[ 'password' ] ) ) {
	echo 'проверка состояния отправки данных - да!' . '<br>';
	if ( in_array( $_SESSION[ 'login' ], $login, true ) ) {
		$auth = true;
		$error = false;
		echo 'введен Логин = ' . $_SESSION[ 'login' ] . '<br>';
	} else {
		echo 'Неверный логин' . '<br>';
		$auth = false;
		$error = true;

	}
	if ( in_array( $_SESSION[ 'password' ], $password, true ) ) {
		$auth = true;
		$error = false;
		echo 'введен Пароль = ' . $_SESSION[ 'password' ] . '<br>';
	} else {
		echo 'Неверный пароль';
		$auth = false;
		$error = true;

	}
}


?>

<?php// if($error) {?><!--<p>Неверные логин и/или пароль!</p>--><?php //}?>
<?php if ($auth) { ?><p>Здравствуйте, <?=$_SESSION['login']?>!</p> 
<a href = "index.php?f=logout"> Выход </a>
<?php } else { ?>
<form name="auth" method="post" action="index.php">
	<label>Логин:
		<input type="text" name="login">
		</label>
	<label>Пароль:
		<input type="text" name="password">
		</label>
	<input type="submit" name="auth" value="Войти">
</form>
<?php } ?>
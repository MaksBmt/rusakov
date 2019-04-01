

<?php 

/*

$host = "localhost";
$username = "solovtdpsm";
$password = "940ab940";
$tbl_name = "users";

mysql_connect($host, $username, $password) or die("can't connect");
mysql_select_db($db_name) or die(mysql_error());
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result = mysql_query($sql);

$count = mysql_num_rows($result);

if($count==1) {
  session_register("username");
  session_register("password");
  header("location:login_success.php");
}
else{  
echo "Неверный Логин или Пароль";
}*/



session_start();

 $userInvalid = false;  

  //echo $_SERVER["REMOTE_ADDR"].'<br>';
//echo $_SERVER["HTTP_REFERER"];

$link = mysqli_connect("localhost","solovtdpsm","940ab940","solovtdpsm"); //подключаемся
 $ip = ip2long($_SERVER["REMOTE_ADDR"]);                                  // преобразуем ip в число
//$sql_ref = "INSET INTO users_ip 
//SET `ip_in`=".$ip.", `url_referer`=".$_SERVER['HTTP_REFERER'];                              //пытаемся передать данные в таблицу (ВАР 1)
$sql_ref = "INSERT INTO users_ip SET ip_in = '".$ip."', url_referer ='".$_SERVER['HTTP_REFERER']."'"; //(ВАР 2) - рабочий
$result_ref = mysqli_query($link,$sql_ref) or die("Ошибка " . mysqli_error($link)); 
mysqli_close($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$required = ['login','password'];
	$disc = ['login'=>'Поле логин','password'=>'Поле пароль'];
	//$errors = [];
	//print_r($errors).'<br>';
	foreach ($_POST as $key => $value) {
		if(in_array($key, $required)) {
			if(!$value){
			$errors[$disc[$key]]=' надо заполнить!'.'<br>';
				
			}
		}
	}

	
	$login = stripcslashes($_POST['login']);
	$login = htmlspecialchars($login);
	$login = trim($login);
	//echo $login.'<br>';
	
	$password = stripcslashes($_POST['password']);
	$password = htmlspecialchars($password);
	$password = trim($password);
	
	
	
	if (!count($errors)) {
		$con = mysqli_connect("localhost","solovtdpsm","940ab940","solovtdpsm");  
		
		
		//проверка подключения
		if($con==false){
			print("Ошибка подключения: ".mysqli_connect_error());
		}
		//else {echo 'Соединение установлено'.'<br>';}                 // тестовая проверка
		$login = mysqli_real_escape_string($con,$login);               //защищаем переданные данные
		$sql = 'SELECT id FROM users WHERE login = "'.$login.'"';       // ищем в базе совпадение с переданным логином
		$result = mysqli_query($con,$sql) or die("Ошибка " . mysqli_error($con)); 
		
		if($result)
{
    //echo "Выполнение запроса 1 прошло успешно".'<br>';  // тестовая проверка
}
	
	$rous = mysqli_fetch_all($result, MYSQL_ASSOC);
		//echo $x = $rous[0]['id'];
	//print_r($rous);
	
		if($rous==false)	{
		//echo 'Такого логина не зарегистрированно';
		$errors['Такой логин']	= ' не зарегистрирован!';
	}
		else {
			$sql_password = "SELECT password FROM users WHERE id = ".$rous[0]['id'];   // по id логина проверяем пароль
			$result_password = mysqli_query($con,$sql_password) or die("Ошибка " . mysqli_error($con)); 
			
			if($result_password)
{
   //echo "Выполнение запроса 2 прошло успешно".'<br>';     // тестовая проверка
				
}
			
			$rous_password = mysqli_fetch_all($result_password, MYSQL_ASSOC);
			//echo $rous_password[0]['password'].'<br>';                        //тестовая проверка
		  if($rous_password[0]['password'] == $password ) {                    // логин и пароль прошли проверку !!!
			  //echo 'Добро пожаловать!'.'<br>';;
			  $_SESSION['valid'] = $login;                                     // зхаписываем логин в сессию
			  
			  // ==ДЕЛАЕМ ЗПРОС МАССИВА ВСЕХ УРЛОВ ПО IP ==
			  $sql_id = "SELECT url_referer FROM users_ip WHERE ip_in = '".$ip."' ORDER BY id";
			  $result_id = mysqli_query($con,$sql_id) or die("Ошибка " . mysqli_error($con)); 
			  if($result_id)
{
   //echo "Выполнение запроса 3 прошло успешно".'<br>';     // тестовая проверка
				
}
			// == ПОЛУЧАЕМ САМЫЙ ПЕРВЫЙ УРЛ==
			$rous_id = mysqli_fetch_all($result_id, MYSQL_ASSOC);
			  $hed = $rous_id[0]['url_referer'];
			 
			  // == УДАЛЯЕМ ИЗ БАЗЫ ЗАПИСИ ПО IP АДРЕСУ ===
			  $sql_del = "DELETE FROM users_ip WHERE ip_in = '".$ip."'";
			  $result_del = mysqli_query($con,$sql_del) or die("Ошибка " . mysqli_error($con)); 
			  
			  // == ОТПРАВЛЯЕМ ЮЗЕРА ОТКУДА ПРИШЕЛ (ПО ПЕРВОМУ УРЛУ) ===
			  header("Location: $hed");
			 
		  }
			else {
				//echo 'Неверный пароль';
				$errors['Пароль']	= ' не верный!';
			}
		}
//mysqli_close($con);
}
}

 /*         === старый код, когда не ьыло базы данных == стирать ЖАЛКО!! ====
 
if ( isset( $_POST[ 'uservalid' ] ) ) {
	$_SESSION[ 'login' ] = $_POST[ 'login' ];
	//echo $_SESSION[ 'login' ] . '<br>';
	//$login = $_POST[ 'login' ];
	if (empty($_SESSION[ 'login' ])) {
		$login_error = 'Заполните Логин';
	}
	$_SESSION[ 'password' ] =  $_POST[ 'password' ] ;
	//$password = $_POST[ 'password' ] ;
	//echo $_SESSION[ 'password' ] . '<br>';
	if (empty($_SESSION[ 'password' ])) {
		$password_error = 'Заполните Пароль';
	}
	//$userInvalid = true;
	
}
		  
		  if ( isset( $_GET[ 'f' ] ) && $_GET[ 'f' ]=='logout' ) { //выход
	unset( $_SESSION[ 'login' ] );
	unset( $_SESSION[ 'password' ] );
     unset($_SESSION['valid']);		  
		  }

		  $user = [
	[
		'login' => 'admin',
		'password' => '220800'
		
	],
	
	[
		'login' => 'moderator',
		'password' => '21091968'
		
	]
];

$auth= false;

		  
	$referer = $_SERVER['HTTP_REFERER'];
		
		 // echo $referer.' это referer';
		 // echo '<br>';
		  //$referer_arr[] = null;
		 // array_push($referer_arr,$referer);
		 // print_r($referer_arr);
		  if ( isset( $_SESSION[ 'login' ] ) && isset( $_SESSION[ 'password' ] ) ) {
	//echo 'проверка состояния отправки данных - да!' . '<br>';
	foreach($user as $key => $value) {
		if (($_SESSION[ 'login' ]=== $value['login']) &&  ($_SESSION[ 'password' ]=== $value ['password'])){
			
				
					$auth = true;
					$_SESSION['valid'] = $_SESSION[ 'login' ];
					$userInvalid = false;
					break;
				} else {
					$auth = false;
					
					$userInvalid = true;
				}
			}
		}
	if($userInvalid) { $logopassword_error = 'Неверные логин и/или пароль!'; }
	*/
		  ?>
<!DOCTYPE HTML>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>lvt</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="description" content="">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style-collection-new-age.css">
  <link rel="stylesheet" href="../css/style-contacts.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet prefetch" href="../css/jquery.fancybox.min.css">

</head>

<body>
  <div class="container">
    <header class="page-header">

      <nav class="top-nav top-nav--closed">
        <button class="top-nav__toggle" type="button"><span class="visually-hidden">Открыть меню</span></button>
        <div class="top-nav__wrapper">
          <ul class="top-nav__list site-list">
            <li class="site-list__item site-list__item--active">
              <a>Главная</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/compani/">О Компании</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/contacts/">Контакты</a>
            </li>
          </ul>

          <ul class="top-nav__list user-list">
            <li class="user-list__item">
             <?php if(isset($_SESSION[ 'valid' ])) { ?>
              <a class="user-list__login" href="//pvh-plitka.ru/login/"><?=$_SESSION['valid']; ?></a>
				<?php } else { ?>
				<a class="user-list__login" href="//pvh-plitka.ru/login/">Войти</a>
				<?php } ?>
            </li>
            <li class="user-list__item">
              <a class="user-list__cart" href="//pvh-plitka.ru/cart/">Корзина</a>
            </li>
          </ul>
        </div>
      </nav>

      <section class="header-center" itemscope itemtype="http://schema.org/Organization">
        <div class="header-center__logo--wrapper">
          <a class="logo header-center__logo">
            <img class="header-center__logo-image" src="../img/logo-mobile.jpg" alt="логотип ПСМ">
          </a>
          <div class="headline header-center__headline">
            <h1 class="headline__text" itemprop="name">КварцВиниловая ПВХ плитка</h1>
          </div>
        </div>
        <div class="adress header-contact__address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
          <p class="adress__spb"><span itemprop="addressLocality">г. Санкт-Петербург</span> <br><span itemprop="streetAddress"> Ириновский пр., дом 1</span></p>
        </div>
        <div class="phone--wrapper">
          <div class="phone header-contact__phone">
            <p class="first-contact phone__first" itemprop="telephone">+7(812)703-48-68</p>
            <p class="time phone__time">c 9-00 до 18-00</p>
          </div>
          <div class="phone header-contact__phone second--wrapper">
            <p class="second-contact phone__second" itemprop="telephone">+7(921)995-00-13</p>
            <p class="time phone__time">с 9-00 до 20-00</p>
          </div>
        </div>
      </section>

      <div class="bottom-nav__wrapper">
        <nav class="bottom-nav bottom-nav--closed">
          <button class="bottom-nav__toggle" type="button"><span class="visually-hidden">Открыть меню</span></button>

          <ul class="bottom-nav__list site-list">
            <li class="site-list__item site-list__item--active">
              <a href="//pvh-plitka.ru/purchase/">Как выбрать и купить</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/oplata/">Оплата</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/dostavka/">Доставка</a>
            </li>
          </ul>

        </nav>
        <div class="search__wrapper">
          <form class="search" method="get" action="//pvh-plitka.ru/echo/">
            <div class="forma-search">
              <input class="input-search bottom-nav__forma-input" type="search" name="search" placeholder="Поиск товара..">
              <button class="input-button"><svg class="svg-forma" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                  <path fill="#ffffff" d="M17 15.586l-3.542-3.542A7.465 7.465 0 0 0 15 7.5 7.5 7.5 0 1 0 7.5 15c1.71 0 3.282-.579 4.544-1.542L15.586 17 17 15.586zM2 7.5C2 4.467 4.467 2 7.5 2 10.532 2 13 4.467 13 7.5c0 3.032-2.468 5.5-5.5 5.5A5.506 5.506 0 0 1 2 7.5z" /></svg></button>
            </div>
          </form>
        </div>

      </div>
    </header>

    <main class="contacts-main">

      <ul class="breadcrumbs breadcrumbs-list" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumbs-list__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a href="//pvh-plitka.ru/" title="Главная" itemprop="item">
            <span itemprop="name">Главная</span>
            <meta itemprop="position" content="0">
          </a>
        </li>
        <li class="breadcrumbs-list__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a href="#" itemprop="item">
            <span itemprop="name">Вход</span>
            <meta itemprop="position" content="1">
          </a>
        </li>


      </ul>
      <div class="main-directory__wrapper">
        <nav class="main-directory main-directory--closed">
          <button class="main-directory__toggle" type="button"> <span class="visually-hidden">Открыть меню</span>
          </button>
          <ul class="main-directory__list site-list">
            <li class="site-list__item site-list__item--active">
              <a href="//pvh-plitka.ru/catalog/">каталог</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/collection-tarkett/">Плитка ПВХ "TARKETT"</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/collection-lg/">Плитка ПВХ "LG Hausys"</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/collection-berry-allog/">Плитка ПВХ "Berry Allog"</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/zamok/">Замковая Плитка ПВХ</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/kleevay/">Клеевая Плитка ПВХ</a>
            </li>
            <li class="site-list__item">
              <a href="//pvh-plitka.ru/ukladka/">Укладка плитки ПВХ</a>
            </li>
            <li class="site-list__item--search">
              <a href="//pvh-plitka.ru/search/">Расширенный поиск</a>
            </li>
          </ul>

        </nav>
		  
		   <?php 
		  
		  ?>

        <section class="contacts-forma">
			<h1 class="contact-forma__title">Вход</h1>
			<div class="result-valid">
			 <?php if(isset($errors)): ?>
				<div class="errors">
					<p>Исправьте следующие ошибки:</p>
					<ul>
						<?php foreach($errors as $err=>$val): ?>
						<li><?=$err; ?><?=$val; ?></li>
						<?php endforeach; ?>
					
					</ul>
				</div>
				<?php endif; ?>
			</div>	
				<?php/* if($userInvalid) { ?><p>Неверные логин и/или пароль!</p><?php }*/?>
			
			<?php if ($auth) {   ?> 
			
			<a href = "index.php?f=logout"> Выход </a>
<?php } else { ?>
			<form class="user-valid" method="post" action="index.php" name="uservalid">
				<div class="user-valid__login">
					<div class="login__label">
						<label for="login-valid">Ваш логин:</label>
					</div>
					<div class="login__input">
						<input class="login__input--input" type="text" name="login" id="login-valid" placeholder="Введите ваш логин"         value="<?=$login; ?>">
					</div>
					<div class="user-valid__password">
					   <label for="password-valid">Ваш пароль:</label>
					</div>
					<div class="password__input">
						<input class="password__input--input" type="text" name="password" id="password-valid" placeholder="Введите ваш пароль"  value="<?=$password; ?>">
					</div>
					<div class="user-valid__button">
					 <button class="button-user" type="submit" name="uservalid">Вход</button>
					</div>
				</div>
					 
			</form>
			<?php } ?>
			<div class="wrapper__link-contact">
				<div class="link-contact__remind">
					<a class="link-contact__link" href="#">Забыли пароль?</a>
				</div>
				<div class="link-contact__chek">
					<a class="link-contact__link" href="#">Зарегистрироваться</a>
				</div>
			</div>
        </section>



      </div>
    </main>
<a href="http://solovtdpsm.tmp.fstest.ru/space/index.php">Ссылка 1</a>
<a href="http://solovtdpsm.tmp.fstest.ru/noise/index.php">Ссылка 2</a>
<a href="http://solovtdpsm.tmp.fstest.ru/husky/index.php">Ссылка 3</a>
<a href="http://solovtdpsm.tmp.fstest.ru/dingo/index.php">Ссылка 4</a>
	  
    <footer class="page-footer">
      <div class="footer-nav">
        <ul class="footer-nav__list">
          <li class="footer-nav__item">
            <a href="//pvh-plitka.ru/articles/">полезные статьи</a>
          </li>
          <li class="footer-nav__item">
            <a href="//pvh-plitka.ru/company-details/">реквизиты</a>
          </li>
          <li class="footer-nav__item">
            <a href="//pvh-plitka.ru/certificates/">сертификаты</a>
          </li>
          <li class="footer-nav__item">
            <a href="//pvh-plitka.ru/return/">возврат и обмен</a>
          </li>
          <li class="footer-nav__item">
            <a href="//pvh-plitka.ru/security/">конфиденциальность</a>
          </li>
          <li class="footer-nav__item">
            <a href="//pvh-plitka.ru/site-map/">карта сайта</a>
          </li>
        </ul>
      </div>
      <div class="footer-wrapper">
        <div class="social-btn">
          <ul class="social-list">
            <li><a class="social-item social-facebook" href="#"><span class="visually-hidden">facebook</span>
              </a></li>
            <li><a class="social-item social-utub" href="#"><span class="visually-hidden">Ютуб</span>
              </a></li>
          </ul>
        </div>
        <div class="made-in">

          <p class="text__made-in">Разработка, создание и продвижение сайтов:<br>
            <a class="link-studio" href="//mb-comrades.ru/" target="_blank">
              Студия "Бабай, Мамай и товарищи"</a></p>
          <div class="wolf">
            <a class="link__made-in" href="//mb-comrades.ru/" target="_blank">
              <p class="visually-hidden">
                Студия</p>
            </a>
          </div>
        </div>
      </div>
    </footer>

  
  <script src="../js/style.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="../js/jquery.fancybox.min.js"></script>
  <script src="../js/style-standart-fb.js"></script>
  </div>
</body>

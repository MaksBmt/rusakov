<main class="container">
    <section class="promo">
        
       
    
    
        
        <?php
            date_default_timezone_set("Europe/Moscow");
         $ts = time();
        $ts_midnight = strtotime("tomorrow");
        $secs_to_midnight = $ts_midnight - $ts;
       $hours = floor($secs_to_midnight/3600);
        $minutes = floor(($secs_to_midnight % 3600)/60);
       ?>
       
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="promo__item promo__item--attachment">
                <a class="promo__link" href="all-lots.html">Крепления</a>
            </li>
            <li class="promo__item promo__item--boots">
                <a class="promo__link" href="all-lots.html">Ботинки</a>
            </li>
            <li class="promo__item promo__item--clothing">
                <a class="promo__link" href="all-lots.html">Одежда</a>
            </li>
            <li class="promo__item promo__item--tools">
                <a class="promo__link" href="all-lots.html">Инструменты</a>
            </li>
            <li class="promo__item promo__item--other">
                <a class="promo__link" href="all-lots.html">Разное</a>
            </li>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
           <!-- <li class="lots__item lot">
                <div class="lot__image">
                    <img src="img/lot-1.jpg" width="350" height="260" alt="Сноуборд">
                </div>
                <div class="lot__info">
                    <span class="lot__category">Доски и лыжи</span>
                    <h3 class="lot__title"><a class="text-link" href="lot.html">2014 Rossignol District Snowboard</a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost">10 999<b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">

                        </div>
                    </div>
                </div>
            </li> -->

<?php
function format_price($a){ // обращение функции к переменной в цикле
$s = '<b class="rub">р</b>'; // общая переменная знак рубля
$x = ceil($a); // назначение переменной для цены и обьявления ее позднее
$z = number_format($x, 0, ' ', ' ');	// форматирование по условию
if ($x > 1000) { // условие если более 1000 считывает значение из переменной в цикле ниже
return $z . $s; // вывод результата
} else { // если условие не совпадает
return $z . $s; // вывод результата
}} //завершение функции
?>
<?php foreach ($lots as $key => $value): ?>
<!-- Обьявляем переменную в которую записана текущая цена для работы с функцией -->
<?php $a = $value['price'];?>
            <li class="lots__item lot">
                <div class="lot__image">
                <img src="<?=$value['giv']?>">
                 </div>  
                 <div class="lot__info">
                    <span class="lot__category"><?=$value['cat']?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.html"><?=$value['nameLot']?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=format_price($a)?><!-- Вывод результата --></span>
                        </div>
                        <div class="lot__timer timer">   
                            <?php
                             print ($hours.':'.$minutes);
                            ?>

                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
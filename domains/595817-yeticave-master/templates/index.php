<section class="promo">
	<h2 class="promo__title">Нужен стафф для катки?</h2>
	<p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
	<ul class="promo__list">
		<!-- вывод категорий из data.php -->
		<?php foreach ($data['mine_categories'] as $k => $val) : ?>
		<li class="promo__item promo__item--<?= $k; ?>">
			<a class="promo__link" href="all-lots.html">
				<?= strip_tags($val); ?>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
</section>
<section class="lots">
	<div class="lots__header">
		<h2>Открытые лоты</h2>
	</div>
	<ul class="lots__list">
		<?php foreach ($data['announcements_list'] as $k => $val) : ?>
		<!-- Обьявляем переменную в которую записана текущая цена для работы с функцией обработки цены-->
		<?php $a = strip_tags($val['price']); ?>
		<li class="lots__item lot">
			<div class="lot__image"> <img src="img/lot-<?= ($k + 1); ?>.jpg" width="350" height="260" alt="<?= strip_tags($val['name']); ?>"> </div>
			<div class="lot__info">
				<span class="lot__category">
					<?= $data['categories_list'][$val['category']]; ?>
				</span>
				<h3 class="lot__title"><a class="text-link" href="lot.html">
          <?= strip_tags($val['name']); ?>
          </a></h3>
			
				<div class="lot__state">
					<div class="lot__rate">
						<span class="lot__amount">Стартовая цена</span>
						<span class="lot__cost">
							<?= format_price($a); ?>
							<!--<b class="rub">р</b> -->
						</span>
					</div>
					<div class="lot__timer timer">
						<?//$lot_time_remaining; ?>
						<?php
						print( $hours . ':' . $minutes );
						?>
					</div>
				</div>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
</section>
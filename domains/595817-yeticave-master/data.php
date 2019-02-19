<?php
// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
        $lots = [
           [
              'nameLot'=>'2014 Rossignol District Snowboard',
              'cat'=>'Доски и лыжи',
              'price'=>'10999',
              'giv'=>'img/lot-1.jpg'
           ],
           [
              'nameLot'=>'2014 Rossignol District Snowboard',
              'cat'=>'Доски и лыжи',
              'price'=>'159999.55',
              'giv'=>'img/lot-2.jpg'
           ],
           [
              'nameLot'=>'2014 Rossignol District Snowboard',
              'cat'=>'Крепления',
              'price'=>'8000',
              'giv'=>'img/lot-3.jpg'
           ],
           [
              'nameLot'=>'2014 Rossignol District Snowboard',
              'cat'=>'Ботинки',
              'price'=>'10800',
              'giv'=>'img/lot-4.jpg'
           ],
           [
              'nameLot'=>'2014 Rossignol District Snowboard',
              'cat'=>'Одежда',
              'price'=>'500',
              'giv'=>'img/lot-5.jpg'
           ],
           [
              'nameLot'=>'2014 Rossignol District Snowboard',
              'cat'=>'Разное',
              'price'=>'5400',
              'giv'=>'img/lot-6.jpg'
           ]
        ];

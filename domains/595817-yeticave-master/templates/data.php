<?php
// список категорий
$mine_categories = [
    'boards' => 'Доски и лыжи',
    'attachment' => 'Крепления',
    'boots' => 'Ботинки',
    'clothing' => 'Одежда',
    'tools' => 'Инструменты',
    'other' => 'Разное'
];
// Данные для сайта
$layout_data = [
    'title' => 'Главная страница сайта',
    'user_name' => 'Константин',
    'user_avatar' => 'img/user.jpg',
    'mine_categories' => $mine_categories, 
    'is_auth' => (bool) rand(0, 1) // проверка на авторизацию
];
// массив тела сраницы
$index_data = [
    'mine_categories' => $mine_categories,
    // список лотов
    'announcements_list' => [
        [
            'name' => '2014 Rossignol District Snowboard',
            'category' => 'boards',
            'price' => 10999,
            'picture' => 'img/lot-1.jpg'
        ],
        [
            'name' => 'DC Ply Mens 2016/2017 Snowboard',
            'category' => 'boards',
            'price' => 159999,
            'picture' => 'img/lot-2.jpg'
        ],
        [
            'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
            'category' => 'attachment',
            'price' => 8000,
            'picture' => 'img/lot-3.jpg'
        ],
        [
            'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
            'category' => 'boots',
            'price' => 10999,
            'picture' => 'img/lot-4.jpg'
        ],
        [
            'name' => 'Куртка для сноуборда DC Mutiny Charocal',
            'category' => 'clothing',
            'price' => 7500,
            'picture' => 'img/lot-5.jpg'
        ],
        [
            'name' => 'Маска Oakley Canopy',
            'category' => 'other',
            'price' => 5400,
            'picture' => 'img/lot-6.jpg'
        ]
    ]
];
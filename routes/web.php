<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return Inertia::render('Home', [
        'products' => [
            [
                'id' => '1',
                'name' => 'Product 1',
                'price' => 100,
                'score' => 5,
                'reviews' => 10,
                'image' => '/img/keyboard.png'
            ],
            [
                'id' => '2',
                'name' => 'Product 2',
                'price' => 200,
                'score' => 4,
                'reviews' => 5,
                'image' => '/img/charger.png'
            ],
            [
                'id' => '3',
                'name' => 'Product 3',
                'price' => 300,
                'score' => 3,
                'reviews' => 3,
                'image' => '/img/mouse.webp'
            ],
            [
                'id' => '4',
                'name' => 'Product 4',
                'price' => 400,
                'score' => 2,
                'reviews' => 2,
                'image' => '/img/stand.png'
            ],
            [
                'id' => '5',
                'name' => 'Product 5',
                'price' => 500,
                'score' => 1,
                'reviews' => 1,
                'image' => '/img/drive.webp'
            ],
            [
                'id' => '6',
                'name' => 'Product 6',
                'price' => 600,
                'score' => 0,
                'reviews' => 0,
                'image' => '/img/adapter.png'
            ]
        ]
    ]);
});

Route::get('/cart', function () {
    return Inertia::render('Cart', [
        'cart' => [
            'id' => '1',
            'items' => [
                [
                    'id' => '1',
                    'product' => [
                        'id' => '1',
                        'name' => 'Product 1',
                        'image' => '/img/keyboard.png',
                        'price' => 200,
                        'stock' => 10,
                    ],
                    'quantity' => 2,
                ],
                [
                    'id' => '2',
                    'product' => [
                        'id' => '2',
                        'name' => 'Product 2',
                        'image' => '/img/charger.png',
                        'price' => 100,
                        'stock' => 10,
                    ],
                    'quantity' => 1,
                ],
                [
                    'id' => '3',
                    'product' => [
                        'id' => '3',
                        'name' => 'Product 3',
                        'image' => '/img/mouse.webp',
                        'price' => 150,
                        'stock' => 10,
                    ],
                    'quantity' => 1,
                ]
            ],

        ]
    ]);
});

Route::get('/products/{id}', function () {
    return Inertia::render('ProductDetail', [
        'product' =>   [
            'id' => '1',
            'name' => 'Product 1',
            'price' => 100,
            'score' => 5,
            'reviews' => 10,
            'image' => '/img/keyboard.png',
            'stock' => 10,
        ],

        'products' => [
            [
                'id' => '1',
                'name' => 'Product 1',
                'price' => 100,
                'score' => 5,
                'reviews' => 10,
                'image' => '/img/keyboard.png'
            ],
            [
                'id' => '2',
                'name' => 'Product 2',
                'price' => 200,
                'score' => 4,
                'reviews' => 5,
                'image' => '/img/charger.png'
            ],
            [
                'id' => '3',
                'name' => 'Product 3',
                'price' => 300,
                'score' => 3,
                'reviews' => 3,
                'image' => '/img/mouse.webp'
            ],
            [
                'id' => '4',
                'name' => 'Product 4',
                'price' => 400,
                'score' => 2,
                'reviews' => 2,
                'image' => '/img/stand.png'
            ],
            [
                'id' => '5',
                'name' => 'Product 5',
                'price' => 500,
                'score' => 1,
                'reviews' => 1,
                'image' => '/img/drive.webp'
            ],
            [
                'id' => '6',
                'name' => 'Product 6',
                'price' => 600,
                'score' => 0,
                'reviews' => 0,
                'image' => '/img/adapter.png'
            ]
        ]
    ]);
});

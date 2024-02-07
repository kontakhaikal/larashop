<?php

use App\Dto\LoginUserRequest;
use App\Dto\RegisterUserRequest;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [HomeController::class, 'show']);

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

Route::get('/products/{id}', [ProductController::class, 'showProductDetail']);

Route::get('/register', function () {
    return Inertia::render('Register');
});

Route::post('/register', function (RegisterUserRequest $data, UserService $userService) {
    $userService->registerCustomer($data);
    return redirect('/login');
});

Route::get('/register-admin', function () {
    return Inertia::render('RegisterAdmin');
});

Route::post('register-admin', function (RegisterUserRequest $data, UserService $userService) {
    $userService->registerAdmin($data);
    return redirect('/login');
});

Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login');

Route::post('/login', function (LoginUserRequest $data) {

    $success = Auth::attempt([
        'username' => $data->username,
        'password' => $data->password
    ], $data->remember);

    if (!$success) {
        return redirect('/login')->withErrors([
            'general' => 'Wrong username or password'
        ]);
    }

    return redirect('/');
});



Route::get('/brands', [BrandController::class, 'getBrands']);
Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/products', [ProductController::class, 'getProducts']);

Route::get('/carts', [CartController::class, 'show']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show']);

    Route::post('/brands', [BrandController::class, 'addBrand']);
    Route::put('/brands/{id}', [BrandController::class, 'updateBrand']);
    Route::delete('/brands/{id}', [BrandController::class, 'deleteBrand']);

    Route::post('/categories', [CategoryController::class, 'addCategory']);
    Route::put('/categories/{id}', [CategoryController::class, 'updateCategory']);
    Route::delete('/categories/{id}', [CategoryController::class, 'deleteCategory']);

    Route::post('/products', [ProductController::class, 'addProduct']);
});

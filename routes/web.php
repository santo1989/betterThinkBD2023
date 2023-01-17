<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilityDynamicController;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('welcome');
// });

//frontend

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/category-products/{id}', [HomeController::class, 'category_details'])->name('category_details');

Route::get('/product-details/{id}', [HomeController::class, 'product_details'])->name('product_details');

Route::get('/posts', [HomeController::class, 'blogs'])->name('blogs');

Route::get('/blog-details/{id}', [HomeController::class, 'blog_details'])->name('blog_details');

Route::get('/contactUs', [HomeController::class, 'contactUS'])->name('contactUS');

// Services

Route::get('/services', [HomeController::class, 'services'])->name('services');

Route::get('/about-us', [HomeController::class, 'about'])->name('about');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/check', function () {
        return "Hello world";
    });

//    Route::get('/home', function () {
//        return view('backend.home');
//    })->name('home');
    Route::get('/home', [UserController::class, 'home'])->name('home');

    //role

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');


    //user

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get(
        '/users/{user}/edit',
        [UserController::class, 'edit']
    )->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    //categories

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //products

    Route::resource('products', ProductController::class);

    //blogs

    Route::resource('blogs', BlogController::class);

    //utility_dynamic

    Route::resource('utility_dynamic', UtilityDynamicController::class);

    //request approve

    Route::get('/approve/{notification}', [UserController::class, 'approvePage'])->name('approvePage');
    Route::post('/approve', [UserController::class, 'approve'])->name('approve');

    Route::post('/request-approve', [UserController::class, 'is_approved_sponsor'])->name('is_approved_sponsor');

    Route::post('/payment-approved', [UserController::class, 'is_approved_payment'])->name('is_approved_payment');

    Route::get('/rejected', [UserController::class, 'is_rejected'])->name('is_rejected');

    Route::get('/approved-sponsor-page/{id}', [HomeController::class, 'is_approved_sponsor_page'])->name('is_approved_sponsor_page');

    Route::get('/approved-payment-page/{id}', [HomeController::class, 'is_approved_payment_page'])->name('is_approved_payment_page');

    Route::get('/approved-sponsor-payment-page/{id}', [HomeController::class, 'is_approved_sponsor_payment_page'])->name('is_approved_sponsor_payment_page');

    // Route::resource('types', TypeController::class);
    //type

    Route::get('/types', [TypeController::class, 'index'])->name('types.index');
    Route::get('/types/create', [TypeController::class, 'create'])->name('types.create');
    Route::post('/types', [TypeController::class, 'store'])->name('types.store');
    Route::get('/types/{type}', [TypeController::class, 'show'])->name('types.show');
    Route::get('/types/{type}/edit', [TypeController::class, 'edit'])->name('types.edit');
    Route::patch('/types/{type}', [TypeController::class, 'update'])->name('types.update');
    Route::delete('/types/{type}', [TypeController::class, 'destroy'])->name('types.destroy');

    //message

    Route::get('/contract-message', [ContractMessageController::class, 'index'])->name('contract_message.index');

    Route::get('/contract-message/create', [ContractMessageController::class, 'create'])->name('contract_message.create');

    Route::post('/contract-message', [ContractMessageController::class, 'store'])->name('contract_message.store');

    Route::get('/contract-message/{message}', [ContractMessageController::class, 'show'])->name('contract_message.show');

    Route::get('/contract-message/{message}/edit', [ContractMessageController::class, 'edit'])->name('contract_message.edit');

    Route::put('/contract-message/{message}', [ContractMessageController::class, 'update'])->name('contract_message.update');

    Route::delete('/contract-message/{message}', [ContractMessageController::class, 'destroy'])->name('contract_message.destroy');

    

});

Route::get('/notification/{message}/{notification}', [NotificationController::class, 'showForUpdating'])->name("notification_showForUpdating");

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractMessageController;
use App\Http\Controllers\HandController;
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
    Route::get('/profiles', [UserController::class, 'profiles'])->name('profiles');

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
    Route::get('/users/{user}/edit',[UserController::class, 'edit']
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

    //levels

    Route::get('/levels', [HandController::class, 'index'])->name('levels.index');

    Route::get('/levels/level_show', [HandController::class, 'level_show'])->name('level_show');

    Route::get('/levels/admin_level_show', [HandController::class, 'admin_level_show'])->name('admin_level_show');


    //points

    Route::get('/points/reward', [AccountController::class, 'rewardView'])->name('reward');
    Route::post('/points/reward', [AccountController::class, 'reward'])->name('admin.reward');
    Route::get('/points/history', [AccountController::class, 'paymentHistory'])->name('admin.payment.history');

    Route::get('/points/withdraw', [AccountController::class, 'Withdraw'])->name('Withdraw');

    Route::get('/points/generate_point', [AccountController::class, 'generate_point'])->name('generate_point');

    Route::get('/points/Withdraw_point', [AccountController::class, 'Withdraw_point'])->name('Withdraw_point.store');

    Route::get('/points/Admin_generate_point', [AccountController::class, 'Admin_generate_point'])->name('Admin_generate_point.store');
});

Route::get('/notification/{message}/{notification}', [NotificationController::class, 'showForUpdating'])->name("notification_showForUpdating");

Route::post('/autocomplete', [UserController::class, 'autocomplete'])->name("autocomplete.fetch");
require __DIR__ . '/auth.php';

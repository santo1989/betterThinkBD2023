<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractMessageController;
use App\Http\Controllers\HandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilityDynamicController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('welcome');
// });

//frontend

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('product_search', [ProductController::class, 'product_search'])->name('product_search');
Route::get('product_division_search', [ProductController::class, 'product_division_search'])->name('product_division_search');

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
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/profiles', [UserController::class, 'profiles'])->name('profiles');

    Route::get('/profiles/{user}/edit', [UserController::class, 'profile_edit'])->name('profile_edit');

    Route::put('/profile/{user}', [UserController::class, 'profile_update'])->name('profile_update');

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

    Route::get('/users/{user}/details', [UserController::class, 'details'])->name('users.details');



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
    Route::post('/points/history/reward', [AccountController::class, 'reward'])->name('admin.reward');
    Route::get('/points/history', [AccountController::class, 'paymentHistory'])->name('admin.payment.history');


    Route::get('/points/withdraw', [AccountController::class, 'withdrawView'])->name('Withdraw');
    Route::post('/points/withdraw', [AccountController::class, 'withdraw'])->name('point.withdraw');
    Route::get('/points/generate_point', [AccountController::class, 'generate_point'])->name('generate_point');

    Route::get('/history/sponsor', [PaymentHistoryController::class, 'sponsor'])->name('history.sponsor');

    Route::get('/history/withdraw', [PaymentHistoryController::class, 'withdraw'])->name('history_withdraw');

    Route::get('/history/rewards', [PaymentHistoryController::class, 'reward'])->name('history_reward');

    Route::get('/history/client_rewards', [PaymentHistoryController::class, 'client_rewards'])->name('history.client_rewards');


    // Admin
    Route::get('/history/generate-point', [PaymentHistoryController::class, 'generatePoint'])->name('history.generate_point');


    Route::get('/points/withdraw/request', [\App\Http\Controllers\Admin\AccountController::class, 'request'])->name('withdraw.request');
    Route::get('/points/{notification}/approve', [\App\Http\Controllers\Admin\AccountController::class, 'approvePage'])->name('approve.withdraw.confirm');
    Route::post('/points/approve', [\App\Http\Controllers\Admin\AccountController::class, 'approve'])->name('approve.withdraw');

    Route::post('/points/Admin_generate_point', [AccountController::class, 'Admin_generate_point'])->name('Admin_generate_point.store');
});

Route::get('/notification/{message}/{notification}', [NotificationController::class, 'showForUpdating'])->name("notification_showForUpdating");

//search autocomplete

Route::get('search', 'UserController@search')->name('search');


Route::post('/autocomplete', [UserController::class, 'autocomplete'])->name("autocomplete.fetch");

//divisions and districts ajax

Route::get('/get/district/{id}', [ProductController::class, 'getDistricts'])->name('getDistricts');

Route::get(
    '/all-level',
    function () {
    return view('backend.Admin.levels.all_level_show');
}); 

require __DIR__ . '/auth.php';

//php artisan command

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/cleareverything', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";
});

Route::get('/key =', function () {
    $key =  Artisan::call('key:generate');
    echo "key:generate<br>";
});

Route::get('/migrate', function () {
    $migrate = Artisan::call('migrate');
    echo "migration create<br>";
});

Route::get('/migrate-fresh', function () {
    $fresh = Artisan::call('migrate:fresh --seed');
    echo "migrate:fresh --seed create<br>";
});

Route::get('/optimize', function () {
    $optimize = Artisan::call('optimize:clear');
    echo "optimize cleared<br>";
});
Route::get('/route-clear', function () {
    $route_clear = Artisan::call('route:clear');
    echo "route cleared<br>";
});

Route::get('/route-cache', function () {
    $route_cache = Artisan::call('route:cache');
    echo "route cache<br>";
});

Route::get('/updateapp', function () {
    $dump_autoload = Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});



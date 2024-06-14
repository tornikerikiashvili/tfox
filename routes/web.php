<?php


use App\Http\Middleware\SetAppLocale;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PageController;
use App\Http\Controllers\InnersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ru/shop/{any?}', function () {
    return redirect('/');
})->where('any', '.*');

Route::get('/en/shop/{any?}', function () {
    return redirect('/');
})->where('any', '.*');

Route::get('/en/product-category/{any?}', function () {
    return redirect('/');
})->where('any', '.*');

Route::get('/ru/product-category/{any?}', function () {
    return redirect('/');
})->where('any', '.*');

// Clear application cache:
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});


Route::prefix('/{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware(SetAppLocale::class)
    ->group(function () {
        Route::get('/product/{slug}', [InnersController::class, 'product']);
        Route::get('/article/{slug}', [InnersController::class, 'news']);
        Route::get('/project/{slug}', [InnersController::class, 'project']);
        Route::get('/{slug?}', PageController::class)->where('slug', '.*');
    });

Route::get("/", function () {
    return redirect('/ka');
});


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

// Clear application cache:
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});


Route::prefix('/{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware(SetAppLocale::class)
    ->group(function () {
        Route::get('/product/{id}', [InnersController::class, 'product']);
        Route::get('/article/{id}', [InnersController::class, 'news']);
        Route::get('/{slug?}', PageController::class)->where('slug', '.*');
    });

Route::get("/", function () {
    return redirect('/ka');
});

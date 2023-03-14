<?php
use App\Http\Controllers\InstallController;
use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\Route;

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


if(file_exists(storage_path('app/installed.php')))
{
    require base_path('lights/'.config('app.uid').'/routes.php');

    Route::get('/system/{action}', [SystemController::class, 'actions']);
    Route::post('/system/{action}', [SystemController::class, 'actionsStore']);

}
else
{
    //set app debug to true
    config(['app.debug' => true]);
    Route::get('/', [InstallController::class, 'install']);
    Route::post('/save-database-info', [InstallController::class, 'saveDatabaseInfo']);
    Route::post('/create-database-tables', [InstallController::class, 'createDatabaseTables']);
    Route::post('/save-primary-data', [InstallController::class, 'savePrimaryData']);
}

Route::get('/app-refresh',[InstallController::class,'appRefresh']);



<?php

use App\Http\Controllers\QueryController;
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

Route::get('/', function () {
    // try {
    //     $host = env('DB_HOST');
    //     $username = env('DB_USERNAME');
    //     $password = env('DB_PASSWORD');
    //     $dbc = new PDO("mysql:host={$host}", $username, $password);
    //     $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $charset = config('database.connections.mysql.charset');
    //     $collation = config('database.connections.mysql.collation');
    //     $database = 'test_db';
    //     $query = "CREATE DATABASE IF NOT EXISTS {$database} CHARACTER SET $charset COLLATE $collation";
    //     $dbc->exec($query);
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    // }
    return view('welcome');
});

Route::get('tags', [QueryController::class, 'tags']);
Route::get('posts', [QueryController::class, 'posts']);
Route::get('category', [QueryController::class, 'category']);
Route::get('fulltextSearch', [QueryController::class, 'fulltextSearch']);

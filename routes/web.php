<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeUnit\FunctionUnit;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

// // route string
// Route::get('/me', function(){
//     return 'Thoriq';
// });

// // Array (JSON)
// Route::get('/me', function(){
//     return ['Thoriq', 'KK4', 'XII RPL 3'];
// });

// // array (JSON)
// Route::get('/me', function(){
//     return [
//         'Nama' => 'Thoriq',
//         'NIS' => 12973121837,
//         'Kelas' => 'XII RPL 3'
//     ];
// });

// // Route JSON
// Route::get('/me', function(){
//     return response()->json(
//         [
//             'Nama' => 'Thoriq',
//             'NIS' => 12973121837,
//             'Kelas' => 'XII RPL 3' 
//         ], 201
//     );
// });


Route::get('/me', [AuthController::class, 'me']);

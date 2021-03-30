<?php

use App\Http\Controllers\ControllerRegistro;
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
    return view('welcome');
});

Route::post('/registrar', [ControllerRegistro::class, 'store']); //armazena o registro do problema no BD

Route::get('/listarRegistros', function () {
    return view('registros', array('registros' => App\Models\Registro::all())); //lista os registros de problemas cadastrados no BD 
});

Route::delete('/registros/{id}', [ControllerRegistro::class, 'destroy']); //deleta o registro do problema do BD

Route::post('/cadastrar', [ControllerRegistro::class, 'create']); //cadastra uma nova categoria e subcategoria no BD

Route::get('/cadastroCatSub', function () {
    return view('cadastroCategoriaAndSub');
});

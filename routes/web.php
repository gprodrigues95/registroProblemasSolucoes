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

Route::post('/registrar', [ControllerRegistro::class, 'store']); //store envia dados pro BD

Route::get('/listarRegistros', function () {
    return view('registros', array('registros' => App\Models\Registro::all()));
});


/*Route::post('/registrar', function (Illuminate\Http\Request $request) {

    $registro = new App\Models\Registro();
    $registro->txtproblema = $request->get('txtproblema');
    $registro->imgproblema = $request->get('imgproblema');
    $registro->txtsolucao = $request->get('txtsolucao');
    $registro->imgsolucao = $request->get('imgsolucao');

    //Image Upload (trecho de código responsável por receber as imagens do formulário e enviar pro BD).
    //As imagens são salvas no BD com um nome diferente do nome original delas.
    if ($request->hasFile('imgproblema') && $request->file('imgproblema')->isValid()) {

        $requestImage = $request->imgproblema;

        $extension = $requestImage->extension();

        $ImageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/problemas'), $ImageName);

        $registro->imgproblema = $ImageName;
    }

    if ($request->hasFile('imgsolucao') && $request->file('imgsolucao')->isValid()) {

        $requestImage = $request->imgsolucao;

        $extension = $requestImage->extension();

        $ImageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/solucoes'), $ImageName);

        $registro->imgsolucao = $ImageName;
    }

    $registro->save();

    echo "Seu registro foi armazenado com sucesso! Código: " . $registro->id;
});*/

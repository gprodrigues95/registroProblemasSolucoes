<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Registro;

class ControllerRegistro extends Controller
{


    public function store(Request $request)
    {

        $registro = new Registro; // Nesta linha, foi instanciada a classe "Registro" do nosso Model 

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
    }
  
}

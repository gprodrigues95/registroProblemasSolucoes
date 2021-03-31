<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

use App\Models\Registro;
use App\Models\SubCategoria;

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

    public function destroy($id)
    {

        Registro::findOrFail($id)->delete();

        echo "Seu registro foi deletado com sucesso!";
    }

    public function create(Request $request)
    {

        $categorias = new Categoria; // Nesta linha, foi instanciada a classe "Categoria" do nosso Model
        $sub_categorias = new SubCategoria; // Nesta linha, foi instanciada a classe "SubCategoria" do nosso Model

        $categorias->catdescricao = $request->get('catdescricao');
        $sub_categorias->subdescricao = $request->get('subdescricao');

        $categorias->save();
        $sub_categorias->save();

        echo "Nova categoria e subcategoria adicionadas com sucesso!";

    }

    public function destroyCategoria($id)
    {

        Categoria::findOrFail($id)->delete();

        echo "A categoria foi deletada com sucesso!";
    }

    public function destroySubCategoria($id)
    {

        SubCategoria::findOrFail($id)->delete();

        echo "A subcategoria foi deletada com sucesso!";
    }

}

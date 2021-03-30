@extends('layouts.main')

<!DOCTYPE html>
<html>

<head>
    <title>Faça seu registro</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h1>Detalhe abaixo dados do problema e da solução:</h1>

        <hr />

        <form action="/registrar" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="texto1">Descrição do problema:</label>
                <textarea id="txtproblema" name="txtproblema" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <p><label for="imagem1">Captura de tela do problema (caso tenha):</label>
                    <input type="file" id="imgproblema" name="imgproblema" class="form-control-file">
                </p>
            </div>
            <div class="form-group">
                <label for="texto2">Descrição da solução (caso tenha):</label>
                <textarea id="txtsolucao" name="txtsolucao" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <p><label for="imagem2">Captura de tela da solução (caso tenha):</label>
                    <input type="file" id="imgsolucao" name="imgsolucao" class="form-control-file">
                </p>
            </div>

            <p>Selecione a categoria a qual o erro pertence:
                <select>
                    <option>Categoria</option>
                </select>
            </p>

            <p>Selecione a subcategoria a qual o erro pertence:
                <select>
                    <option>Subcategoria</option>
                </select>
            </p>

            <p>Não encontrou categoria e subcategoria adequadas? <a href="/cadastroCatSub">Clique aqui</a></p>

            <p><button type="submit" class="btn btn-default">Registrar</button></p>

            <p>
            <h3><a href="/listarRegistros">Lista de registros</a></h3>
            </p>

        </form>

    </div>

</body>

</html>
@extends('layouts.main')

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de categoria e sub</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h1>Cadastre abaixo a categoria e subcategoria:</h1>

        <hr />

        <form action="/cadastrar" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <p><label for="texto01">Descrição da categoria:</label>
                    <textarea id="catdescricao" name="catdescricao" class="form-control" placeholder="Por exemplo: Erro no GitHub"></textarea>
                </p>
            </div>

            <div class="form-group">
                <p><label for="texto02">Descrição da subcategoria:</label>
                    <textarea id="subdescricao" name="subdescricao" class="form-control" placeholder="Por exemplo: Erro de Push"></textarea>
                </p>
            </div>

            <p><button type="submit" class="btn btn-default">Cadastrar</button></p>

            <p>
            <h3><a href="/listarCategorias">Categorias cadastradas</a></h3>
            </p>

            <p>
            <h3><a href="/listarSubCategorias">Subcategorias cadastradas</a></h3>
            </p>
            
            <p>
            <h3><a href="/">Voltar</a></h3>
            </p>

        </form>

    </div>

</body>

</html>
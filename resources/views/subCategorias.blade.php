@extends('layouts.main')

<!DOCTYPE html>
<html>

<head>
    <title>Subcategorias</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h1>Lista de subcategorias:</h1>

        <hr />

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição da subcategoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subCategorias as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->subdescricao }}</td>
                    <td>
                        <form action="/subCategorias/{{ $row->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-default">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <p>
        <h3><a href="/cadastroCatSub">Voltar</a></h3>
        </p>


    </div>


</body>

</html>
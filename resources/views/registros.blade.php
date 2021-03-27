@extends('layouts.main')

<!DOCTYPE html>
<html>

<head>
    <title>Registros</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h1>Lista de registros</h1>

        <hr />

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição do problema</th>
                    <th>Captura de tela do problema</th>
                    <th>Descrição da solução</th>
                    <th>Captura de tela da solução</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->txtproblema }}</td>
                    <td>{{ $row->imgproblema }}</td>
                    <td>{{ $row->txtsolucao }}</td>
                    <td>{{ $row->imgsolucao }}</td>
                    <td><form action="/registros/{{ $row->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-default">Deletar</button>
                    </form></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>

    </div>


</body>

</html>
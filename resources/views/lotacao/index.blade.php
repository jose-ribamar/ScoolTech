<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direção Workstation - Listar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
        }
        .direcao-title {
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .direcao-title svg {
            margin-left: 10px;
            cursor: pointer;
        }
        .search-box {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-box select {
            width: 60%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-box button {
            padding: 10px 20px;
            border: 1px solid black;
            background-color: #f8f9fa;
            cursor: pointer;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td a {
            margin-right: 10px;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <div class="title"> {{ __('Direção Workstation') }} </div>
            </h2>
        </x-slot>
    <div class="container">
        <div class="header">
            <div>
                <!-- Coloque aqui o dropdown ou ícone de perfil do usuário -->
            </div>
        </div>

        <div class="direcao-title">
            <span>Lotação 
                <a href="{{ route('lotacao.create', ['turma_id' => request('turma_id')]) }}">
                    <i class="material-icons">add</i>
                </a>
            </span>
        </div>
        

        <!-- Filtro de Turma -->
        <form method="GET" action="{{ route('lotacao.index') }}" class="search-box">
            <select name="turma_id">
                <option value="">Selecione a turma</option>
                @foreach ($turmas as $turma)
                    <option value="{{ $turma->id }}" {{ request('turma_id') == $turma->id ? 'selected' : '' }}>
                        {{ $turma->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Filtrar</button>
        </form>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                      
                        <th>Docente</th>
                        <th>Disciplina</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lotacao as $item)
                    <tr>
                       
                        <td>{{ $item->docente->user->name ?? 'Nome não disponível' }}</td> <!-- Accessing docente related to the item -->
                        <td>{{ $item->disciplina->name ?? 'Nome não disponível' }}</td>
                        <td>
                            <a href="#">Editar</a>
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhum registro encontrado.</td>
                    </tr>
                @endforelse
                
                </tbody>
            </table>
        </div>
    </div>
    </x-app-layout>
</body>
</html>

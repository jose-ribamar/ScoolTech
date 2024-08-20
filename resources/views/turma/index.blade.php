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
        .search-box input[type="text"] {
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
                <div class="title"> {{ __('Turmas') }} </div>
            </h2>
        </x-slot>
    <div class="container">
        <div class="header">
            
           
            <div>
                <!-- Coloque aqui o dropdown ou ícone de perfil do usuário -->
            </div>
        </div>

        <div class="direcao-title">
            <span>Turmas <a href="{{ Route('direcao.create')}}"><i class="material-icons">add</i></a></span>
            
        </div>

        <div class="search-box">
            <input type="text" placeholder="Digite o nome">
            <button>Pesquisar</button>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Giacomo Guilizzoni</td>
                        <td>123.456.789-00</td>
                        <td>12/12/1982</td>
                        <td>
                            <a href="#">Alterar</a>
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Marco Botton</td>
                        <td>123.456.789-00</td>
                        <td>12/12/1982</td>
                        <td>
                            <a href="#">Alterar</a>
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Mariah Maclachlan</td>
                        <td>123.456.789-00</td>
                        <td>12/12/1982</td>
                        <td>
                            <a href="#">Alterar</a>
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Valerie Liberty</td>
                        <td>123.456.789-00</td>
                        <td>12/12/1982</td>
                        <td>
                            <a href="#">Alterar</a>
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#">Data Grid Docs</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
</body>
</html>

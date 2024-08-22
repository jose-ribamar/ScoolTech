<!-- resources/views/direcao-workstation.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direção Workstation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .button {
            display: inline-block;
            padding: 20px;
            border: 1px solid black;
            text-align: center;
            width: 150px;
            cursor: pointer;
        }
        .user-options {
            display: flex;
            align-items: center;
        }
        .user-options button {
            margin-left: 10px;
            padding: 5px 10px;
            border: none;
            background-color: #f8f9fa;
            cursor: pointer;
        }
    </style>
</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ScoolTech') }}
        </h2>
    </x-slot>

    <div class="container">

            <div class="py-12">
                <div class="button-group">
                    <div class="button"> <a href="{{ route('direcao.index') }}"> Direção </a> </div>
                    <div class="button"> <a href="{{ route('docente.index') }}"> Docente </a></div>
                    <div class="button"><a href="{{ route('aluno.index') }}"> Aluno (a)</a>  </div>
                    <div class="button"><a href="{{ route('disciplina.index') }}"> Disciplina </a> </div>
                </div>
                <div style="margin-top: 20px;">
                    <div class="button"><a href="{{ route('turma.index') }}"> Turma </a></div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
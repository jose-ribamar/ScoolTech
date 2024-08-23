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
        .turma-title {
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .turma-title svg {
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
        .btn-group {
            display: flex;
            justify-content: space-between;
            position: relative; /* Necessário para o posicionamento do texto */
        }
        .btn-group a, .btn-group button {
            flex-grow: 1;
            margin: 0 2px;
            padding: 5px;
            font-size: 12px;
            position: relative;
        }
        .btn-group button {
            border: none;
        }
        .hover-text {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #000;
            color: #fff;
            padding: 5px;
            border-radius: 3px;
            display: none;
            z-index: 10;
            font-size: 12px;
            white-space: nowrap;
        }
        .btn-group a:hover .hover-text, .btn-group button:hover .hover-text {
            display: block;
        }
    </style>
</head>
<tbody>

    <div class="turma-title">
        <span>Turma <a href="{{ route('lotacao.create') }}"><i class="material-icons">add</i></a></span>
    </div>
    @forelse ($lotacao as $value)
        <tr>
            <td>{{ $value->turma->nome ?? 'Nome da turma não disponível' }}</td>
            <td>{{ $value->docente->nome ?? 'Nome do docente não disponível' }}</td>
            <td>{{ $value->disciplina->nome ?? 'Nome da disciplina não disponível' }}</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary"><i class="material-icons">create</i>
                        <span class="hover-text">Editar</span>
                    </a>
                    <form action="" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?');" style="flex-grow: 1;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="material-icons">close</i>
                            <span class="hover-text">Excluir</span>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">Nenhum registro encontrado.</td>
        </tr>
    @endforelse
</tbody>


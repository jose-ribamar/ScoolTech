<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direção Workstation - Listar</title>
    
    <!-- Bootstrap CSS for base styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
        }
        .container {
            margin-top: 50px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .direcao-title {
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .direcao-title a {
            margin-left: 10px;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }
        .direcao-title a i {
            vertical-align: middle;
        }
        .direcao-title a:hover {
            background-color: #0056b3;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        td {
            border-bottom: 1px solid #ddd;
        }
        .btn {
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            border-radius: 4px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border-radius: 4px;
        }
        .btn-danger:hover {
            background-color: #c82333;
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
            <div class="direcao-title">
                <span>Lotação 
                    <a href="{{ route('matricula.create', ['turma_id' => request('turma_id')]) }}">
                        <i class="material-icons">add</i>
                    </a>
                </span>
            </div>

            <!-- Filtro de Turma -->
            <form method="GET" action="{{ route('matricula.index') }}" class="search-box">
                <select name="turma_id">
                    <option value="">Selecione a turma</option>
                    @foreach ($turmas as $turma)
                        <option value="{{ $turma->id }}" {{ request('turma_id') == $turma->id ? 'selected' : '' }}>
                            {{ $turma->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th style="text-align: center; padding-left: 200px;">Data de matrícula</th>
                            <th style="text-align: right; padding-right: 90px;">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($matricula as $item)
                        <tr>
                            <td>{{ $item->aluno->user->name ?? 'Nome não disponível' }}</td>
                            <td style="text-align: center; padding-left: 200px;">{{ $item->date_creation ?? 'Data não disponível' }}</td>
                            <td style="text-align: right; padding-right: 20px;">
                                <a href="{{ route('matricula.edit', $item->id) }}" class="btn btn-primary">
                                    <i class="material-icons">edit</i> Editar
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('matricula.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $item->id }})">
                                        <i class="material-icons">delete</i> Excluir
                                    </button>
                                </form>
                            </td>   
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Nenhum registro encontrado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            function confirmDelete(id) {
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Não será possível reverter essa ação!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, excluir!', 
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}

        </script>
    </x-app-layout>
</body>
</html>

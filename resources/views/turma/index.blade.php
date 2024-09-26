<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turma - Listar</title>
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
        .turma-title {
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .turma-title a {
            margin-left: 10px;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }
        .turma-title a i {
            vertical-align: middle;
        }
        .turma-title a:hover {
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

    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: `
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                showConfirmButton: true,
            });
        });
    </script>
    @endif

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <div class="title"> {{ __('Turma') }} </div>
                
            </h2>
            <p id="delete-warning" class="alert alert-warning" style="display: none; margin-top: 10px;">
                Turma com registros, não pode ser excluída.
        
        </x-slot></p>

        <div class="container">
           
            
            <div class="turma-title">
                <span>Turma <a href="{{ route('turma.create') }}"><i class="material-icons">add</i></a></span>
            </div>

            

            <div class="table-container">
                @include('turma._list')
            </div>
        </div>
    </x-app-layout>

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

</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Lotação</title>
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
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <div class="title"> {{ __('Edição de Lotação') }} </div>
            </h2>
        </x-slot>

        <div class="container">
            <form action="{{ route('lotacao.update', $lotacao->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="turma_id">Turma</label>
                    <input type="text" class="form-control" id="turma_id" value="{{ $lotacao->turma->name }}" disabled>
                    <input type="hidden" name="turma_id" value="{{ $lotacao->turma_id }}">
                </div>

                <div class="form-group">
                    <label for="docente_id">Docente</label>
                    <select name="docente_id" id="docente_id" class="form-control">
                        @foreach($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->user->name ?? 'Docentes não cadastrados' }}
                                {{ $docente->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="disciplina_id">Disciplina</label>
                    <select name="disciplina_id" id="disciplina_id" class="form-control">
                        @foreach($disciplinasDisponiveis as $disciplina)
                            <option value="{{ $disciplina->id }}" {{ $lotacao->disciplina_id == $disciplina->id ? 'selected' : '' }}>
                                {{ $disciplina->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </x-app-layout>
</body>
</html>

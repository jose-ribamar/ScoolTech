<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direção Workstation - Criar Matrícula</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <x-guest-layout>
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>
            <x-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('matricula.store') }}">
                @csrf
                <div>
                    <x-label for="turma" value="{{ __('Nome da Turma') }}" />
                    <x-input id="turma" class="block mt-1 w-full" type="text" name="turma" value="{{ $turma->name }}" readonly />
                    <input type="hidden" name="turma_id" value="{{ $turma->id }}">
                </div>
                <div class="mt-4">
                    <x-label for="aluno_id" value="{{ __('Nome do Aluno') }}" />
                    <select id="aluno_id" name="aluno_id" class="block mt-1 w-full" required>
                        @foreach($alunos as $aluno)
                            <option value="{{ $aluno->id }}">{{ $aluno->user->name ?? 'Nome não disponível' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <x-label for="date_creation" value="{{ __('Data de Matrícula') }}" />
                    <x-input id="date_creation" class="block mt-1 w-full" type="date" name="date_creation" required />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Salvar') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </x-guest-layout>
</body>
</html>

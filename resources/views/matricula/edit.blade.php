<form method="POST" action="{{ route('matricula.update', ['matricula' => $matricula->id]) }}">
    @csrf
    @method('PUT')

    <div>
        <x-label for="name" value="{{ __('Turma') }}" />
        <td>{{ $matricula->turma->name ?? 'Nome não disponível' }}</td>
    </div>

    <div>
        <x-label for="name" value="{{ __('Aluno') }}" />
        <td>{{ $matricula->aluno->user->name ?? 'Nome não disponível' }}</td>
    </div>

    <div class="mt-4">
        <x-label for="date_creation" value="{{ __('Data de matrícula') }}" />
        <x-input id="date_creation" class="block mt-1 w-full" type="date" name="date_creation"
            value="{{ old('date_creation', $matricula->date_creation) }}" required autofocus autocomplete="date_creation" />
    </div>

    <x-button class="ms-4">
        {{ __('Atualizar') }}
    </x-button>
</form>

<form method="POST" action="{{ $disciplina->exists ? route('disciplina.update', $disciplina->id) : route('disciplina.store') }}">
    @csrf
    @if ($disciplina->exists)
        @method('PUT')
    @else
        @method('POST') 
    @endif

    <div>
        <x-label for="name" value="{{ __('Nome') }}" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $disciplina->name) }}" required autofocus autocomplete="name" />
    </div>

    <div class="mt-4">
        <x-label for="date_creation" value="{{ __('Data de Criação') }}" />
        <x-input id="date_creation" class="block mt-1 w-full" type="date" name="date_creation" value="{{ old('date_creation', $disciplina->date_creation) }}" required autocomplete="date_creation" />
    </div>

    <x-button class="ms-4">
        {{ __('Atualizar') }}
    </x-button>
</form>

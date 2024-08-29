<!-- Check if $turma is set, indicating that we are in edit mode -->
<form method="POST" action="{{ isset($turma) ? route('turma.update', $turma->id) : route('turma.store') }}">
    @csrf
    @if(isset($turma))
        @method('PUT')
    @endif

    <div>
        <x-label for="name" value="{{ __('Nome') }}" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $turma->name ?? '')" required autofocus autocomplete="name" />
    </div>

    <div class="mt-4">
        <x-label for="ano" value="{{ __('Ano Escolar') }}" />
        <select id="ano" class="block mt-1 w-full" name="ano" required autofocus>
            @for ($ano = 1; $ano <= 9; $ano++)
                <option value="{{ $ano }}" {{ old('ano', $turma->ano ?? '') == $ano ? 'selected' : '' }}>
                    {{ $ano }}º ano
                </option>
            @endfor
        </select>
    </div>

    <div class="mt-4">
        <x-label for="date_creation" value="{{ __('Data de Criação') }}" />
        <x-input id="date_creation" class="block mt-1 w-full" type="date" name="date_creation" :value="old('date_creation', $turma->date_creation ?? '')" required autofocus autocomplete="date_creation" />
    </div>

    <div class="mt-4">
        <x-button class="ms-4">
            {{ isset($turma) ? __('Atualizar') : __('Registrar') }}
        </x-button>
    </div>
</form>

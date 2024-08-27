<form method="POST" action="{{ route('turma.store') }}">
    @csrf

    <div>
        <x-label for="name" value="{{ __('Nome') }}" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
    </div>

    <div class="mt-4">
        <x-label for="ano" value="{{ __('Ano Escolar') }}" />
        <select id="ano" class="block mt-1 w-full" name="ano" required autofocus>
            @for ($ano = 1; $ano <= 9; $ano++)
                <option value="{{ $ano }}" {{ old('ano') == $ano ? 'selected' : '' }}>
                    {{ $ano }}º ano
                </option>
            @endfor
        </select>
    </div>
    
    


    <div class="mt-4">
        <x-label for="date_creation" value="{{ __('Data de Criação') }}" />
        <x-input id="date_creation" class="block mt-1 w-full" type="date" name="date_creation" :value="old('date_creation')" required autofocus autocomplete="date_creation" />
    </div>

        <x-button class="ms-4">
            {{ __('Registrar') }}
        </x-button>
    </div>
</form>
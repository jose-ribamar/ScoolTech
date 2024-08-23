<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('lotacao.store') }}">
            @csrf

            <div>
                <x-label for="turma" value="{{ __('Turma') }}" />
                <x-input id="turma" class="block mt-1 w-full" type="text" name="turma" value="{{ $turma->name }}" readonly />
                <input type="hidden" name="turma_id" value="{{ $turma->id }}">
            </div>

            <div class="mt-4">
                <x-label for="docente_id" value="{{ __('Docente') }}" />
                <select id="docente_id" class="block mt-1 w-full" name="docente_id" required>
                    @foreach($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-label for="disciplina_id" value="{{ __('Disciplina') }}" />
                <select id="disciplina_id" class="block mt-1 w-full" name="disciplina_id" required>
                    @foreach($disciplinas as $disciplina)
                        <option value="{{ $disciplina->id }}">{{ $disciplina->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Salvar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

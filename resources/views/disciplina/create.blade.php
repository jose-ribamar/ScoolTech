<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('disciplina.store') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
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
    </x-authentication-card>
</x-guest-layout>

<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Postularme a esta vacante
    </h3>
    @if (session()->has('message'))
    <p class="border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 rounded-lg">
        {{session('message')}}
    </p>
    @elseif (session()->has('error'))
    <div class="border border-red-400 bg-red-100 text-red-700 font-bold p-2 my-5 rounded-lg">
        <p class="font-bold">Opps!</p>
        <span class="block sm:inline font-normal">{{session('error')}}</span>
    </div>

    @else
    <form class="w-96 mt-5" wire:submit.prevent='Apply'>
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')" />
            <x-text-input id="cv" class="block mt-1 w-full" type="file" wire:model="cv" accept=".pdf" />
            @error('cv')
            <livewire:show-alert :message="$message" />
            @enderror
        </div>
        <x-primary-button class="my-5">
            {{ __('Postularme') }}
        </x-primary-button>
    </form>
    @endif
</div>
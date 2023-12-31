<form class="md:w-1/2 space-y-5" wire:submit.prevent='createVacancy'>
    <!-- Title Info -->
    <div>
        <x-input-label for="title" :value="__('Titulo Vacante')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title"
            placeholder="Titulo de la Vacante" :value="old('title')" />
        @error('title')
        <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <!-- Salary Info -->
    <div>
        <x-input-label for="salary" :value="__('Salario Mensual')" />
        <select id="salary" wire:model="salary"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option>-- Seleccione --</option>
            @foreach ($salaries as $salary)
            <option value="{{$salary->id}}"> {{$salary->salary}} </option>
            @endforeach
        </select>

        @error('salary')
        <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <!-- Category Info -->
    <div>
        <x-input-label for="category" :value="__('Categoría')" />
        <select id="category" wire:model="category"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option>-- Seleccione --</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}"> {{$category->category}} </option>
            @endforeach
        </select>
        @error('category')
        <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <!-- Company Info -->
    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company"
            placeholder="Empresa: ej. Netflix, Uber, Shopify" :value="old('company')" />
        @error('company')
        <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <!-- Last Date Info -->
    <div>
        <x-input-label for="last_day" :value="__('Ultimon Día para Postularse')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day"
            :value="old('last_day')" />
        @error('last_day')
        <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <!-- Vacancy Description -->
    <div>
        <x-input-label for="description" :value="__('Descripción del Puesto')" />
        <textarea id="description" wire:model="description" placeholder="Descripcion general del puesto, experiencia"
            class="resize-none w-full h-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
        @error('description')
        <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <!-- Upload Image -->
    <div>
        <x-input-label for="image" :value="__('Imagen')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="image" accept="image/*" />

        <div class="my-5 w-80">
            @if ($image)
            <p class="block font-bold text-sm uppercase mb-2 text-gray-500 dark:text-gray-300">Previsualización:</p>
            <img src="{{$image->temporaryUrl()}}" alt="Previsualización de la imagen">
            @endif
        </div>

        @error('image')
        <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <x-primary-button>
        {{ __('Crear Vacante') }}
    </x-primary-button>
</form>
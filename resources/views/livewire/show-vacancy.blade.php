<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3 capitalize">
            {{$vacancy->title}}
        </h3>
    </div>

    <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10 justify-evenly justify-items-center rounded-lg">
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
            <span class="normal-case font-normal">{{$vacancy->company}}</span>
        </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Ultimo día para postularse:
            <span class="normal-case font-normal">{{$vacancy->last_day->toFormattedDateString()}}</span>
        </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoría:
            <span class="normal-case font-normal">{{$vacancy->category->category}}</span>
        </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario:
            <span class="normal-case font-normal">{{$vacancy->salary->salary}}</span>
        </p>
    </div>

    <div class="md:grid md:grid-cols-6 gap-6">
        <div class="col-span-2 mb-5 md:mb-0">
            <img src="{{asset('storage/vacancies/'.$vacancy->image)}}" alt="{{" Imagen Vacante ".$vacancy->title}}">
        </div>

        <div class="col-span-4">
            <h2 class="font-bold text-2xl text-gray-800 mb-5">Descripción del Puesto</h2>
            <p>{{$vacancy->description}}</p>
        </div>
    </div>

    @guest
    <div class="mt-5 bg-gray-50 border-dashed p-5 text-center">
        <p class="font-bold text-gray-800">
            ¿Deseas Aplicar a esta vacante? <a href="{{route('register')}}" class="font-bold text-indigo-600">Obten una
                cuenta para aplicar a esta y a otras vacantes</a>
        </p>
    </div>
    @endguest
    @auth
    @cannot('create', App\model\Vacancy::class)
    <livewire:apply-for-vacancy :vacancy="$vacancy" />
    @endcannot
    @endauth
</div>
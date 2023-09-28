<div>
    <livewire:filter-vacancies />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-12">Nuestras Vacantes Disponibles</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-300">
                @forelse ($vacancies as $vacancy)
                <div class="md:flex md:justify-between md:items-center py-5">
                    <div class="md:flex-1">
                        <a href="{{route('vacancies.show', $vacancy->id)}}"
                            class="text-3xl font-extrabold text-gray-700 capitalize">{{$vacancy->title}}
                        </a>
                        <p class="text-base text-gray-600 my-2 capitalize">{{$vacancy->company}}</p>
                        <p class="text-sm font-bold text-gray-600 my-2">{{$vacancy->category->category}}</p>
                        <p class="text-base text-gray-600 my-2">{{$vacancy->salary->salary}}</p>
                        <p class="font-bold text-sm text-gray-600 my-2">
                            Último dia para postularse:
                            <span class="font-normal">{{$vacancy->last_day->format('d/m/Y')}}</span>
                        </p>
                    </div>

                    <div class="my-5 md:my-0">
                        <a href="{{route('vacancies.show', $vacancy->id)}}"
                            class="bg-indigo-600 uppercase text-sm font-bold text-white p-3 rounded-lg block text-center">Ver
                            Vacante</a>
                    </div>
                </div>
                @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay Vacantes Actualmente</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
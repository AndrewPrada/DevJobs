<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-10">Mis Notificaciones</h1>
                    @forelse ($notifications as $notification)
                    <div class="divide-y divide-gray-200">
                        <div class="p-5 lg:flex lg:justify-between lg:items-center">
                            <div>
                                <p>
                                    Tienes un nuevo Candidato en:
                                    <span class="font-bold">{{$notification->data['vacancy_name']}}</span>
                                </p>

                                <p>
                                    Publicado:
                                    <span class="font-bold">{{$notification->created_at->diffForHumans()}}</span>
                                </p>
                            </div>

                            <div class="my-4 lg:my-0">
                                <a href="{{route('applicant.index', $notification->data['vacancy_id'])}}"
                                    class=" bg-indigo-600 uppercase text-sm font-bold text-white p-3 rounded-lg">Ver
                                    Candidatos</a>
                            </div>
                        </div>

                        @empty
                        <p class="text-center text-gray-600">No hay nuevas notificaciones</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacancies as $vacancy)
        <div
            class="p-6 border-b border-gray-200 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
            <div class="leading-10 flex flex-col">
                <a href="{{route('vacancies.show',$vacancy->id)}}" class="text-xl font-bold capitalize">
                    {{$vacancy->title}}
                </a>
                <a href="#" class="text-sm text-gray-600 font-bold capitalize">{{$vacancy->company}}</a>
                <p class="text-sm text-gray-500 font-semibold">Último dia: {{$vacancy->last_day->format('d-m-Y')}}</p>
            </div>
            <div class="flex flex-col gap-3 items-stretch mt-5 md:flex-row md:mt-0">
                <a href="{{route('applicant.index', $vacancy)}}"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-sm text-center font-bold uppercase">
                    {{$vacancy->applicants->count()}}
                    Candidatos
                </a>
                <a href="{{route('vacancies.edit',$vacancy->id)}}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-sm text-center font-bold uppercase">
                    Editar
                </a>
                <button wire:click="$dispatch('showAlert', {{$vacancy->id}})"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-sm text-center font-bold uppercase">
                    Eliminar
                </button>
            </div>
        </div>
        @empty
        <p class="p-3 text-center text-sm text-gray-600">Noy hay vacantes que mostrar</p>
        @endforelse
    </div>

    <div class="flex justify-center sm:block mt-10">
        {{$vacancies->links()}}
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('showAlert', vacancyId => {

        Swal.fire({
            title: '¿Seguro?',
            text: "¡No podrás revertirlo!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, bórralo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Delete Vacancy
                Livewire.dispatch('deleteVacancy',[vacancyId]);

                Swal.fire(
                '¡Borrado!',
                'Tu archivo ha sido eliminado.',
                'success'
                )
            }
        });
    });
    
    

</script>
@endpush
<x-student>
    <x-slot name="hero">
        @include('teachers.partials.hero')
    </x-slot>
    <section id="header" class="bg-dark text-light pt-2">
        @include('teachers.partials.buttons-lesson')
    </section>
    <section id="body">
        @if (session('success'))
            <span class="text-light position-fixed top-0 mt-3 end-0 me-4 bg-success px-2 py-3 rounded fs-5"><i class="fas fa-check-circle"></i> {{session('success')}}</span>
        @endif
        <div class="container mt-3">
            <h2>Lecciones de la sección: {{$section->title}}</h2>
            <p class="fs-5">Crea lecciones siguiendo las normas de la plataforma, recuerda tener cuidado en el manejo de archivos</p>
            @livewire('teacher.lessons-teacher',['section'=>$section])
        </div>
    </section>
    @push('scripts')
    <script>
        Livewire.on('deleteLessIndex',lessonId=>{
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, borrar esto!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('teacher.lessons-teacher','delete',lessonId);
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            });
        });
    </script>
    @endpush

</x-student>
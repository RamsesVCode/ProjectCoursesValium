<x-student>
    <x-slot name="hero">
        @include('teachers.partials.hero')
    </x-slot>
    <section id="header" class="bg-dark text-light pt-2">
        @include('teachers.partials.button-course-edit')
    </section>
    <section id="body">
        <div class="container mt-3">
            <h2>Lecciones del curso</h2>
            <p class="fs-5 my-0">Establece las lecciones de tu curso y ordenalos por secciones para que tus estudiantes tengan una comoda navegación
                (Tu curso debe tener por lo menos una sección con 5 lecciones para que se considere su aprobación)
            </p>
            @livewire('teacher.course-lessons',['course'=>$course])
        </div>
    </section>
    @push('scripts')
    <script>
        Livewire.on('deleteSec',sectionId=>{
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
                    Livewire.emitTo('teacher.course-lessons','deleteSection',sectionId);
                    Swal.fire(
                    'Eliminado!',
                    'El requerimiento ha sido eliminado',
                    'Exitoso'
                    )
                }
            });
        });
        Livewire.on('deleteLess',lessonId=>{
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
                    Livewire.emitTo('teacher.course-lessons','deleteLesson',lessonId);
                    Swal.fire(
                    'Eliminado!',
                    'El requerimiento ha sido eliminado',
                    'Exitoso'
                    )
                }
            });
        });
    </script>
    @endpush

</x-student>
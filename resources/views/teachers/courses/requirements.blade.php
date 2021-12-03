<x-student>
    <x-slot name="hero">
        @include('teachers.partials.hero')
    </x-slot>
    <section id="header" class="bg-dark text-light pt-2">
        @include('teachers.partials.button-course-edit')
    </section>
    <section id="body">
        <div class="container mt-3">
            <h2>Requerimientos del curso</h2>
            <p class="fs-5 my-0">Define apropiadamente los requerimientos previos de tu curso para ayudar a los estudiantes
                (Tu curso debe tener por lo menos tres requerimientos para que puedar ser aprobado)
            </p>
            <div class="row">
                <div class="col">
                    @livewire('teacher.course-requirements',['course'=>$course])
                </div>
                <div class="col">
                    <div class="mt-2 shadow py-3 px-4 mx-auto" style="max-width: 400px;font-family:'Open sans'">
                        <h3 class="text-center">¿Tienes problemas para definir tus requerimientos?</h3>
                        <h5>¡Aqui tenemos algunos ejemplos que te pueden ayudar! <a href="" class="text-decoration-none">Ver más</a></h5>
                        <ul class="list-unstyled">
                            <li class="fs-5 d-flex gap-2 align-items-start"><i class="fas fa-check-circle text-success mt-2"></i> <span>Conocer de algoritmos shell y codificado</span></li>
                            <li class="fs-5 d-flex gap-2 align-items-start"><i class="fas fa-check-circle text-success mt-2"></i> <span>Saber que es MVC y como aplicarlo</span></li>
                            <li class="fs-5 d-flex gap-2 align-items-start"><i class="fas fa-check-circle text-success mt-2"></i> <span>Dominar POO en JAVA</span></li>
                            <li class="fs-5 d-flex gap-2 align-items-start"><i class="fas fa-check-circle text-success mt-2"></i> <span>Dominar AJAX en JAVA</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
        Livewire.on('deleteRequirement',requirementId=>{
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
                    Livewire.emitTo('teacher.course-requirements','delete',requirementId);
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
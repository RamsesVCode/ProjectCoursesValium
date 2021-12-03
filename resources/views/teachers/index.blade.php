<x-student>
    <style>
        /* Toasts */
        /* .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
        }
        .colored-toast .swal2-title {
        color: white;
        }
        
        .colored-toast .swal2-close {
        color: white;
        }
        
        .colored-toast .swal2-html-container {
        color: white;
        }
        .colored-toast{
            font-size: 18px;
            margin-bottom:0;
            padding-bottom:0;
            max-height: max-content;
        } */
    </style>
    <x-slot name="hero">
        @include('teachers.partials.hero')
    </x-slot>
    <section id="header" class="bg-dark text-light pt-2">
        @include('teachers.partials.buttons')
    </section>
    <section id="body">
        @if (session('success'))
            <span class="text-light position-fixed top-0 mt-3 end-0 me-4 bg-success px-2 py-3 rounded fs-5"><i class="fas fa-check-circle"></i> {{session('success')}}</span>
        @endif
        <div class="container">
            @livewire('teacher.courses-teacher')
        </div>
    </section>
    @push('scripts')
    <script>
        // DeleteCourse
        Livewire.on('deleteCourse',courseId=>{
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
                    Livewire.emitTo('teacher.courses-teacher','delete',courseId);
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            });
        });

        // Toast
        // Swal.fire({
        // title: {{session('success')}},
        // showConfirmButton: false,
        // iconColor: 'white',
        // icon:'success',
        // timer:2000,
        // timerProgressBar:true,
        // customClass: {
        //     popup: 'colored-toast'
        // },
        // toast: true,
        // position: 'top-right'
        // })
    </script>
    @endpush

</x-student>

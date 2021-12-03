<x-student>
    <x-slot name="hero">
        @include('teachers.partials.hero')
    </x-slot>
    <section id="header" class="bg-dark text-light pt-2">
        @include('teachers.partials.buttons-lesson')
    </section>
    <section id="body">
        <div class="container mt-3">
            <h2>Formulario de creación de lecciones</h2>
            <p class="fs-5">Crea lecciones siguiendo las normas de la plataforma, recuerda tener cuidado en el manejo de archivos</p>
            {!! Form::open(['route' => ['teacher.sections.lessons.store',$section],'method'=>'post']) !!}
                @include('teachers.lessons.partials.form')
            {!! Form::submit('Crear lección', ['class'=>'btn btn-danger fs-5 text-light']) !!}
            {!! Form::close() !!}
        </div>
    </section>
    @push('scripts')
    <script>
        // CKEDITOR
        ClassicEditor
        .create( document.querySelector('#description') )
        .catch( error => {
            console.error( error );
        } );
        // CKEDITOR.replace('description');
    </script>
    @endpush

</x-student>
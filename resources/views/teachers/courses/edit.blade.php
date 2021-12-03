<x-student>
    <x-slot name="hero">
        @include('teachers.partials.hero')
    </x-slot>
    <section id="header" class="bg-dark text-light pt-2">
        {{-- @include('teachers.partials.buttons') --}}
        @include('teachers.partials.button-course-edit')
    </section>
    <section id="body">
        <div class="container mt-3">
            <h2>Formulario de edición de curso</h2>
            <p class="fs-5">Puede seguir personalizando este curso para obtener mejores resultado</p>
            {!! Form::model($course, ['route'=>['teacher.courses.update',$course],'method'=>'put','files'=>true]) !!}
                @include('teachers.courses.partials.form')
                {!! Form::submit('Guardar Cambios', ['class'=>'btn btn-success text-light']) !!}
            {!! Form::close() !!}
        </div>
    </section>
    @push('scripts')
    <script>
        // Slug
        $(document).ready( function() {
            $("#title").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
        // CKEDITOR
        ClassicEditor
        .create( document.querySelector('#description') )
        .catch( error => {
            console.error( error );
        } );
        // CKEDITOR.replace('description');
        // Image
        document.getElementById("image").addEventListener('change',(event)=>{
            var file = event.target.files[0];
            var name = file.name;
            var size = Math.round(file.size/1024,2)+"KB";
            var myme = file.type;
            if(myme=="image/jpg" || myme=="image/jpeg"){
                document.getElementById("error-image").style.display ="none";

                document.getElementById('name-file').style.display ="block";
                document.getElementById('size').style.display ="block";
                document.getElementById('myme').style.display ="block";
                document.getElementById('name-file').innerHTML = "Nombre del archivo: "+name;
                document.getElementById('size').innerHTML = "Tamaño: "+size;
                document.getElementById('myme').innerHTML = "Tipo: "+myme;
                
                let reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = function(event){
                    document.getElementById('visor').src=event.target.result;
                };
            }else{
                document.getElementById('name-file').style.display ="none";
                document.getElementById('size').style.display ="none";
                document.getElementById('myme').style.display ="none";
                document.getElementById('visor').src="";
                document.getElementById("error-image").style.display ="block";
                document.getElementById("error-image").innerHTML = "<span class='text-danger'>Archivo no aceptado</span>";
            }
        });
    </script>
    @endpush

</x-student>
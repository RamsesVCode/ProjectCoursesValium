<x-student>
    <x-slot name="hero">
        @include('teachers.partials.hero')
    </x-slot>
    <section id="header" class="bg-dark text-light pt-2">
        @include('teachers.partials.buttons-lesson')
    </section>
    <section id="body">
        <div class="container mt-3">
            <h2>Formulario de edición de lecciones</h2>
            <p class="fs-5">Recomendamos tener cuidado durante la modificación de tus lecciones, recuerda que realizamos reviciones periodicas de la consistencia de los cursos</p>
            {!! Form::model($lesson,['route' => ['teacher.sections.lessons.update',['section'=>$section,'lesson'=>$lesson]],'method'=>'put']) !!}
                @include('teachers.lessons.partials.form')
            {!! Form::submit('Guardar cambios', ['class'=>'btn btn-danger fs-5 text-light']) !!}
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
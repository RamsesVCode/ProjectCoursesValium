<x-student>
    <x-slot name="hero">
        @include('teachers.partials.hero')
    </x-slot>
    <section id="header" class="bg-dark text-light pt-2">
        @include('teachers.partials.buttons-resource')
    </section>
    <section id="body">
        <div class="container mt-3">
            <h2>Formulario de edición de recursos</h2>
            <p class="fs-5">Recuerda actualizar tus archivos periodicamente para que no queden obsoletos</p>
            {!! Form::model($resource,['route' => ['teacher.lessons.resources.update',['lesson'=>$lesson,'resource'=>$resource]],'method'=>'put','files'=>true]) !!}
            @include('teachers.resources.partials.form')
            {!! Form::submit('Actualizar recurso', ['class'=>'btn btn-danger fs-5 text-light']) !!}
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

        // File
        document.getElementById("file").addEventListener('change',(event)=>{
            var file = event.target.files[0];
            var name = file.name;
            var size = Math.round(file.size/1024,2)+"KB";
            var myme = file.type;
            
            if(myme=="image/jpg" || myme=="image/jpeg"){
                let reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = function(event){
                    document.getElementById('file-image').src=event.target.result;
                };
                
            }else if(myme=="application/x-zip-compressed"){
                document.getElementById('file-image').src="{{asset('images/zip.png')}}";
            }else if(myme=="application/pdf"){
                document.getElementById('file-image').src="{{asset('images/pdf.png')}}";
            }
            if(myme=="image/jpg" || myme=="image/jpeg" || myme=="application/x-zip-compressed" || myme=="application/pdf"){
                document.getElementById("sent").innerHTML = `
                    <p class="fs-5 my-0 mt-1">Nombre: ${name}</p>
                    <p class="fs-5 my-0 mt-1">Tamaño: ${size}</p>
                    <p class="fs-5 my-0 mt-1">Tipo: ${myme}</p>
                `;
            }else{
                document.getElementById('file-image').src="";
                document.getElementById("sent").innerHTML = "<p class='text-danger'>Error de tipo</p>";
            }
        });
    </script>
    @endpush

</x-student>
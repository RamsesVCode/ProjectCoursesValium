<x-student>
    <x-slot name="hero">
        @include('teachers.partials.hero')
    </x-slot>
    <section id="header" class="bg-dark text-light pt-2">
        @include('teachers.partials.buttons-resource')
    </section>
    <section id="body">
        @if (session('success'))
            <span class="text-light position-fixed top-0 mt-3 end-0 me-4 bg-success px-2 py-3 rounded fs-5"><i class="fas fa-check-circle"></i> {{session('success')}}</span>
        @endif
        <div class="container mt-3">
            <h2>Recursos de la lección: {{$lesson->name}}</h2>
            <p class="fs-5">Recuerda mantener tus archivos actualizados y con un tamaño moderado</p>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('teacher.lessons.resources.create',$lesson)}}" class="btn btn-danger text-light fs-5"><i class="fas fa-plus-square"></i> Crear recurso</a>
            </div>
            <div class="table-responsive" style="font-family: 'Open Sans'">
                <table class="table table-hover">
                    <tr style="background-color: #f2f2f2">
                        <th class="p-3">{{__("Id")}}</th>
                        <th class="p-3">{{__("Name")}}</th>
                        <th class="p-3">{{__("Description")}}</th>
                        <th class="p-3">{{__("Tipo")}}</th>
                        <th class="p-3" style="min-width: max-content;">{{__("Creación")}}</th>
                        <th class="p-3" colspan="2">{{__("Acciones")}}</th>
                    </tr>
                    @foreach ($lesson->resources as $resource)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$resource->name}}</td>
                            <td>{!!Str::limit($resource->description,80,'...')!!}</td>
                            <td>
                                @if ($resource->type=='Pdf')
                                    <i class="fas fa-file-pdf fs-4 text-danger"></i> 
                                @endif
                                @if ($resource->type=='Image')
                                    <i class="fas fa-file-image fs-4 text-secondary"></i> 
                                @endif
                                @if ($resource->type=='Zip')
                                    <i class="fas fa-file-archive fs-4 text-primary"></i> 
                                @endif
                                {{$resource->type}} 
                            </td>
                            <td>{{$lesson->created_at->diffForHumans()}}</td>
                            <td><a href="{{route('teacher.lessons.resources.edit',['lesson'=>$lesson,'resource'=>$resource])}}" class="text-success text-decoration-none" title="Editar"><i class="fas fa-pen"></i></a></td>
                            <td>
                                <a href="#" class="text-danger text-decoration-none" title="Eliminar"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>    
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
    </script>
    @endpush

</x-student>
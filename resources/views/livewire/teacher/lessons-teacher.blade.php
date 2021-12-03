<div class="mt-4">
    {{-- Buttons --}}
    <ul class="list-unstyled d-flex gap-2">
        <a class="btn btn-danger text-light" href="{{route('teacher.sections.lessons.create',$section)}}">Crear lección</a>
        <li class="ms-auto">
            <div class="border rounded px-2 fs-5" style="border-color:#c7c7c7 !important">
                <i class="fas fa-search"></i>
                <input type="text" wire:model="search" class="border-0 input-search-student" placeholder="Buscar lección">
            </div>
        </li>
    </ul>
    {{-- LESSONS --}}
    <div class="table-responsive" style="font-family: 'Open Sans'">
        <table class="table table-hover">
            <tr style="background-color: #f2f2f2">
                <th class="p-3">{{__("Id")}}</th>
                <th class="p-3">{{__("Nombre")}}</th>
                <th class="p-3">{{__("Url")}}</th>
                <th class="p-3">{{__("Plataforma")}}</th>
                <th class="p-3">{{__("Recursos")}}</th>
                <th class="p-3" style="min-width: max-content;">{{__("Creación")}}</th>
                <th class="p-3" colspan="3">{{__("Acciones")}}</th>
            </tr>
            @foreach ($lessons as $lesson)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$lesson->name}}</td>
                    <td>{{$lesson->url}}</td>
                    <td>{{$lesson->platform->name}}</td>
                    <td>{{$lesson->resources->count()}}</td>
                    <td>{{$lesson->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('teacher.sections.lessons.edit',['section'=>$section,'lesson'=>$lesson])}}" class="text-success text-decoration-none" title="Editar"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('teacher.lessons.resources.create',$lesson)}}" class="text-primary text-decoration-none"><i class="fas fa-cloud-upload-alt" title="Subir recursos"></i></a></td>
                    <td>
                        <a href="#" class="text-danger text-decoration-none" wire:click.prevent="$emit('deleteLessIndex',{{$lesson->id}})" title="Eliminar"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>    
            @endforeach
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <span>{{$lessons->links()}}</span>
    </div>
</div>
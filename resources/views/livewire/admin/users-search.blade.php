<div class="mt-4" style="font-family: 'Open Sans';">
    {{-- Buttons --}}
    <ul class="list-unstyled d-flex gap-2">
        <li>
            <a wire:click.prevent="resetVars()" class="py-2 px-3 fs-5 text-decoration-none text-dark btn-student btn-student-active" style="border:1px solid black;color:white !important;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Todos los usuarios
            </a>
        </li>
        <li class="dropdown">
            <a class="py-2 dropdown-toggle px-3 fs-5 text-decoration-none text-dark" style="border:1px solid black;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="true">
                Rol
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="cursor: pointer">
                <li class=""><a class="dropdown-item">Estudiante</a></li>
                <li class=""><a class="dropdown-item">Instructor</a></li>
            </ul>
        </li>        
        <li class="ms-auto">
            <div class="border rounded px-2 me-2 fs-5" style="border-color:#c7c7c7 !important">
                <i class="fas fa-search"></i>
                <input type="text" wire:model="search" class="border-0 input-search-student" placeholder="Buscar usuario"/>
            </div>
        </li>
    </ul>
    {{-- Filters --}}
    <div class="d-flex justify-content-between align-items-center">
        <p class="fs-5" style="font-family: Roboto">{{__("Filtrado por ")}}
            {{-- @if (!$this->categoryId && !$this->levelId)
                <span>
                    {{__("\"Todos los cursos\"")}}
                </span>
            @endif
            @if ($this->categoryId)
                <span>
                    Categoria: {{$this->categoryName}}
                </span>
            @endif
            @if ($this->levelId)
                <span>
                    Nivel: {{$this->levelName}}
                </span>
            @endif --}}
        </p>
        {{-- <a href="" class="btn btn-danger text-light"><i class="fas fa-plus"></i> Crear Curso</a> --}}
    </div>
    {{-- COURSES --}}
    <div class="table-responsive" style="font-family: 'Open Sans';background-color:white !important;">
        <table class="table table-hover text-center">
            @if ($users->count()>0)
                <tr style="background-color: #f2f2f2">
                    <th class="p-3">{{__("Id")}}</th>
                    <th class="p-3">{{__("Nombre")}}</th>
                    <th class="p-3">{{__("Rol")}}</th>
                    <th class="p-3">{{__("Cursos tomados")}}</th>
                    <th class="p-3">{{__("Cursos creados")}}</th>
                    <th class="p-3">{{__("Destacado")}}</th>
                    <th class="p-3" style="min-width: max-content;">{{__("Creación")}}</th>
                    <th class="p-3" colspan="3">{{__("Acciones")}}</th>
                </tr>
            @endif
            @forelse ($users as $user)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td style="min-width: max-content;" class="text-start">
                        <img src="{{Storage::url($user->profile_photo_path)}}" class="rounded-circle me-2" width="40px" height="40px" alt=""/>
                        {{$user->name}}
                    </td>
                    <td>
                        Estudiante
                    </td>
                    <td>
                        {{$user->courses_enrolled->count()}}
                    </td>
                    <td>
                        {{$user->courses->count()}}
                    </td>
                    <td>{{$user->featured ? 'Si' : 'No'}}</td>
                    {{-- <td>
                        <span
                        @switch($course->status)
                            @case('DRAFT')
                                class="bg-secondary rounded text-light px-1"
                                @break
                            @case('PENDING')
                                class="bg-warning rounded text-light px-1"
                                @break
                            @case('PUBLISHED')
                                class="bg-success rounded text-light px-1"
                                @break
                            @case('REJECTED')
                                class="bg-danger rounded text-light px-1"
                                @break
                            @endswitch
                        >
                            {{$this->translateStatus($course->status)}}
                        </span>
                    </td> --}}
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('teacher.courses.edit',$user)}}" class="text-success text-decoration-none"><i class="fas fa-pen"></i></a></td>
                    <td><a href="#" class="text-primary text-decoration-none"><i class="fas fa-eye"></i></a></td>
                    <td>
                        <a href="#" class="text-danger text-decoration-none" wire:click.prevent="$emit('deleteCourse',{{$user->id}})"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @empty    
                <div class="alert" style="background-color: white">
                    No hay resultados
                </div>
            @endforelse
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <span>{{$users->links()}}</span>
    </div>
</div>

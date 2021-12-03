<div class="mt-4">
    {{-- Buttons --}}
    <ul class="list-unstyled d-flex gap-2">
        <li>
            <a wire:click.prevent="resetVars()" class="py-2 px-3 fs-5 text-decoration-none text-dark btn-student btn-student-active" style="border:1px solid black;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Todos los cursos
            </a>
        </li>
        <li class="dropdown">
            <a class="py-2 dropdown-toggle px-3 fs-5 text-decoration-none text-dark btn-student" style="border:1px solid black;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Categoria
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="cursor: pointer">
                @foreach ($this->categories as $category)
                    <li class="" wire:click="changeCategory({{$category->id}})"><a class="dropdown-item">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle py-2 px-3 fs-5 text-decoration-none text-dark btn-student" style="border:1px solid black;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Nivel
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="cursor: pointer">
                @foreach ($levels as $level)
                    <li wire:click="changeLevel({{$level->id}})"><a class="dropdown-item">{{$level->name}}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="ms-auto">
            <div class="border rounded px-2 fs-5" style="border-color:#c7c7c7 !important">
                <i class="fas fa-search"></i>
                <input type="text" wire:model="search" class="border-0 input-search-student" placeholder="Buscar Curso">
            </div>
        </li>
    </ul>
    {{-- Filters --}}
    <div class="d-flex justify-content-between align-items-center">
        <p class="fs-5" style="font-family: Roboto">{{__("Filtrado por ")}}
            @if (!$this->categoryId && !$this->levelId)
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
            @endif
        </p>
        <a href="{{route('teacher.courses.create')}}" class="btn btn-danger text-light"><i class="fas fa-plus"></i> Crear Curso</a>
    </div>
    {{-- COURSES --}}
    <div class="table-responsive" style="font-family: 'Open Sans'">
        <table class="table table-hover">
            <tr style="background-color: #f2f2f2">
                <th class="p-3">{{__("Id")}}</th>
                <th class="p-3">{{__("Curso")}}</th>
                <th class="p-3">{{__("Estado")}}</th>
                <th class="p-3">{{__("Destacado")}}</th>
                <th class="p-3">{{__("Categoría")}}</th>
                <th class="p-3">{{__("Nivel")}}</th>
                <th class="p-3">{{__("Precio")}}</th>
                <th class="p-3" style="min-width: max-content;">{{__("Creación")}}</th>
                <th class="p-3" colspan="3">{{__("Acciones")}}</th>
            </tr>
            @foreach ($courses as $course)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td style="min-width: max-content;">
                        <img src="{{Storage::url($course->image->url)}}" class="rounded-circle me-2" width="40px" height="40px" alt="">
                        {{$course->title}}
                    </td>
                    <td>
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
                    </td>
                    <td>{{$course->featured ? 'Si' : 'No'}}</td>
                    <td>{{$course->category->name}}</td>
                    <td>{{$course->level->name}}</td>
                    <td class="{{$course->price->mount==0 ? 'text-danger' : ''}}">
                        {{$course->price->mount!=0 ? $course->price->mount : 'Gratis'}}
                    </td>
                    <td>{{$course->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('teacher.courses.edit',$course)}}" class="text-success text-decoration-none"><i class="fas fa-pen"></i></a></td>
                    <td><a href="#" class="text-primary text-decoration-none"><i class="fas fa-eye"></i></a></td>
                    <td>
                        <a href="#" class="text-danger text-decoration-none" wire:click.prevent="$emit('deleteCourse',{{$course->id}})"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>    
            @endforeach
        </table>
    </div>
    </div>
    <div class="d-flex justify-content-center">
        <span>{{$courses->links()}}</span>
    </div>
</div>
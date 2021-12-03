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
                    <li wire:click="$set('levelId',{{$level->id}})"><a class="dropdown-item">{{$level->name}}</a></li>
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
    {{-- Cards --}}
    <div class="row row-cols-lg-4 row-cols-xl-5 row-cols-md-3" style="font-family:'Open sans';">
        @forelse ($courses as $course)
            <div class="col">
                <div class="card mb-3">
                    <img src="{{Storage::url($course->image->url)}}" style="object-fit: cover" height="120px" alt="">
                    <div class="card-body border border-top-0" style="border-color: #d2d2d2">
                        <h5 class="text-muted text-desborded" style="height: 40px;">{{$course->title}}</h5>
                        <p class="text-desborded my-0">{{$course->description}}</p>
                        <p class="my-0">Completado: <span class="text-success">{{$this->coursePercent($course->id)}} %</span></p>
                        <a href="{{route('courses.advance',$course)}}" class="d-block text-center text-decoration-none">Ir al curso</a>
                    </div>
                </div>
            </div> 
        @empty
            <div class="alert alert-danger">
                No hay resultados
            </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        <span>{{$courses->links()}}</span>
    </div>
</div>
<section id="filters" class="px-3 px-sm-0 pt-3">
    <h2 class="display-6 fw-bold mx-3 mx-sm-0" style="font-family:Roboto">Acceso de por vida a cada uno de los cursos</h2>
    <p class="fs-5 mx-3 mx-sm-0">Puedes utilizar nuestros filtros de busqueda para encontrar mas rapidamente el curso que estas buscando</p>
    <div>
        <ul class="d-flex list-unstyled gap-2">
            <li>
                <a wire:click="resetFilters" class="btn p-2 text-light fs-5 bg-secondary" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-layer-group"></i> Todos <span class="d-sm-inline d-none">los cursos</span></a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle btn p-2 text-light fs-5 bg-secondary" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-tags"></i> Categoria</a>
                <ul class="dropdown-menu" style="cursor: pointer;">
                    @foreach ($categories as $category)
                        <li class="dropdown-item" wire:click="$set('category_id',{{$category->id}})">{{__($category->name)}}</li>  
                    @endforeach                    
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle btn p-2 text-light fs-5 bg-secondary" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-project-diagram"></i> Nivel</a>
                <ul class="dropdown-menu" style="cursor: pointer;">
                    @foreach ($levels as $level)
                        <li class="dropdown-item" wire:click="$set('level_id',{{$level->id}})">{{__($level->name)}}</li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <div class="fs-4 text-dark">
            @if($category_id==null && $level_id==null)
                <span>"Todos los cursos"</span>
            @else
                @if($category_id)
                    <span>Categoria "{{$this->category_name}}"</span>
                @endif
                @if($level_id)
                    <span class="mb-2 mb-sm-0 d-inline-block">Nivel "{{$this->level_name}}"</span>
                @endif
            @endif
        </div>
        <div class="p-0 p-md-3 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2" style="padding-bottom:0 !important;">
            @forelse ($courses as $course)
                <x-course-card :course="$course"/>
            @empty
                <div class="col-12 p-0 m-0 fs-4">
                    <div class="alert alert-danger">No hay resultados</div>
                </div>
            @endforelse
        </div>
        {{$courses->links()}}
    </div>
    
</section>
<section id="categories" class="px-3 px-sm-0">
    <h2 class="display-6 fw-bold mx-3 mx-sm-0" style="font-family:Roboto">Una amplia cantidad de cursos</h2>
    <p class="fs-5 mx-3 mx-sm-0">Puedes acceder a mas de 20.000 cursos en la categoria que desees y con constantes actualizaciones.</p>
    <div>
        <ul class="d-flex list-unstyled">
            @foreach ($categories as $category)
                <li class="btn-lg me-1 {{$category->id==$category_id ? 'bg-valium-active text-light' : ''}}" wire:click="$set('category_id','{{$category->id}}')" style="cursor: pointer;">
                    {{$category->name}}
                </li>
            @endforeach
        </ul>
        <div class="p-0 p-md-3 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2" style="padding-bottom:0 !important;">
            @foreach ($courses as $course)
                <x-course-card :course="$course" style="margin-bottom:0 !important;"/>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mb-2">
            <a href="" class="btn text-light fs-5 d-flex align-items-center" style="background-color: #392C70;"><span class="me-1">Ver más</span> <i class="fas fa-angle-double-right"></i></a>
        </div>
    </div>
</section>

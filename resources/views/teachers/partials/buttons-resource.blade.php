<div class="container" id="aprendizaje">
    <h1 class="mt-4">Gestión de recursos</h1>
    <ul class="list-unstyled d-flex gap-4 my-0 py-0 fs-5">
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.courses.index') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.courses.index')}}">{{__("Mis cursos")}}</a></li>
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.lessons.resources.index') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.lessons.resources.index',$lesson)}}">{{__("Recursos lección actual")}}</a></li>
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.lessons.resources.create') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.lessons.resources.create',$lesson)}}">{{__("Crear recurso")}}</a></li>
    </ul>
</div>
<div class="container" id="aprendizaje">
    <h1 class="mt-4">Gestión de lecciones</h1>
    <ul class="list-unstyled d-flex gap-4 my-0 py-0 fs-5">
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.courses.index') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.courses.index')}}">{{__("Mis cursos")}}</a></li>
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.sections.lessons.index') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.sections.lessons.index',$section)}}">{{__("Lecciones seccion actual")}}</a></li>
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.sections.lessons.create') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.sections.lessons.create',$section)}}">{{__("Crear lección")}}</a></li>
    </ul>
</div>
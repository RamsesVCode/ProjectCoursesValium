<div class="container" id="aprendizaje">
    <h1 class="mt-4">Instructor</h1>
    <ul class="list-unstyled d-flex gap-4 my-0 py-0 fs-5">
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.courses.index') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.courses.index')}}">Mis cursos</a></li>
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.courses.create') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.courses.create')}}">Nuevo</a></li>
        <li style="cursor: pointer;">Certificaciones</li>
    </ul>
</div>
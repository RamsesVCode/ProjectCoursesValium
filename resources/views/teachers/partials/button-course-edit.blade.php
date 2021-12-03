<div class="container" id="aprendizaje">
    <h1 class="mt-4">Edición de curso</h1>
    <ul class="list-unstyled d-flex gap-4 my-0 py-0 fs-5">
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.courses.edit') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.courses.edit',$course)}}">Mi curso</a></li>
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.courses.goals') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.courses.goals',$course)}}">Objetivos</a></li>
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.courses.requirements') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.courses.requirements',$course)}}">Requerimientos</a></li>
        <li style="cursor: pointer;" class="pb-1 {{request()->routeIs('teacher.courses.lessons') ? 'teacher-active' : ''}}"><a class="text-light text-decoration-none" href="{{route('teacher.courses.lessons',$course)}}">Lecciones</a></li>
    </ul>
</div>
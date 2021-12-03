<section id="visor">
    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="embed-responsive bg-dark">
                {{-- {!!$this->current_lesson->iframe!!} --}}
            </div>
            {{-- NAV TAB --}}
            <div class="mt-2">
                <ul class="nav nav-pills mb-3 fs-5 border-bottom" style="border-color: #eceaea;max-width:max-content;" id="pills-tab" role="tablist">
                    <li class="nav-item me-2 nav-tab-button-active" role="presentation">
                      <button class="nav-link nav-tab-button" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">Descripción</button>
                    </li>
                    <li class="nav-item me-2" role="presentation">
                      <button class="nav-link nav-tab-button" id="pills-questions-tab" data-bs-toggle="pill" data-bs-target="#pills-questions" type="button" role="tab" aria-controls="pills-questions" aria-selected="false">Comentarios y opiniones</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link nav-tab-button" id="pills-resources-tab" data-bs-toggle="pill" data-bs-target="#pills-resources" type="button" role="tab" aria-controls="pills-resources" aria-selected="false">Recursos</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" style="font-size: 16px" id="pills-description" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h5 class="mt-3 mb-2 fw-bold">1. {{$this->current_lesson->name}}</h5>
                        <p class="my-0">{{$this->current_lesson->description}}</p>
                        @if (!$this->current_lesson->completed)
                            <p class="my-0 text-muted">Marcar lección como completada <i class="ms-3 far fa-check-square fs-4 text-primary" style="cursor: pointer;" wire:click="checkCompleted()"></i></p>
                        @else
                            <p class="my-0 text-muted">Marcar lección como no completada <i class="ms-3 fas fa-check-square fs-4 text-primary" style="cursor: pointer;" wire:click="checkCompleted()"></i></p>
                        @endif
                        <h5 class="mt-2 mb-0 fw-bold">Detalles específicos</h5>
                        <p class="my-0">{{$this->current_lesson->comments_count}} estudiantes comentaron en esta lección. <a href="" class="text-decoration-none">Ir a los comentarios</a></p>
                        <p class="my-0">La lección cuenta con {{$this->current_lesson->resources_count}} recursos. <a href="" class="text-decoration-none">Ver los recursos</a></p>
                    </div>
                    <div class="tab-pane fade" id="pills-questions" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @livewire('course-lesson-comments', ['lesson' => $this->current_lesson])
                    </div>
                    
                    <div class="tab-pane fade" id="pills-resources" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h5 class="my-0">Te invitamos a revizar los recursos publicados en la lección</h5>
                        <hr width="90%" color="#eceaea" class="mx-auto">
                        @if ($this->resources)
                            @foreach ($this->resources as $resource) 
                                <div class="row">
                                    <div class="col-lg-9 col-12">
                                        <h5 class="fw-bold mb-0">{{$resource->name}}</h5>
                                        <p class="my-0 py-0" style="font-size: 16px;">{{$resource->description}}</p>
                                    </div>
                                    <div class="text-end pe-3 col-lg-3 col-12">
                                        @if($resource->type=='Pdf')
                                            <button type="button" wire:click="downloadFile('{{$resource->url}}')" class="btn btn-danger text-light"><i class="fas fa-file-pdf"></i> Descargar PDF</button>
                                        @endif
                                        @if($resource->type=='Image')
                                            <button type="button" wire:click="downloadFile('{{$resource->url}}')" class="btn btn-primary text-light"><i class="fas fa-file-image"></i> Descargar IMAGEN</button>
                                        @endif
                                        @if($resource->type=='Zip')
                                            <button type="button" wire:click="downloadFile('{{$resource->url}}')" class="btn btn-success text-light"><i class="fas fa-file-archive"></i> Descargar ZIP</button>
                                        @endif
                                    </div>
                                </div>
                                <hr width="90%" color="#eceaea" class="mx-auto">
                            @endforeach
                        @endif
                    </div>
                </div>
                    {{-- BUTTONS --}}
                <div class="d-flex justify-content-between mt-4">
                    @if ($this->prevLesson())
                        <button class="btn btn-lg btn-outline-dark" wire:click="changeLesson({{$this->prevLesson()}})"><i class="fas fa-chevron-left"></i> {{__("Anterior")}}</button>
                    @endif    
                    @if ($this->nextLesson())
                        <button class="ms-auto btn btn-lg btn-outline-dark" wire:click="changeLesson({{$this->nextLesson()}})">{{__("Siguiente")}} <i class="fas fa-chevron-right"></i></button>
                    @endif                
                </div>          
            </div>
        </div>
        <div class="col-lg-4 col-12" style="font-family: 'Open Sans'">
            {{-- TITLE - TEACHER --}}
            <div class="p-2 shadow-sm mb-3 border mt-lg-0 mt-4" style="border-color:#eceaea !important">
                <p class="fs-5 m-0 p-0 fw-bold text-center">{{$course->title}}</p>
                <a href="#" class="text-decoration-none d-block mx-2">Prof. {{$course->teacher->name}}</a>
            </div>
            {{-- ADVANCE PERCENT --}}
            <div class="shadow rounded p-2 border" style="border-color: #eceaea !important">
                <div class="d-flex gap-3 align-items-center">
                    <div class="flex-1">
                        <h5 class="fw-bold">Progreso del curso</h5>
                        <div class="w-100 rounded mb-1 overflow-hidden" style="height: 11px;background-color:#ccc;">
                            <div class="bg-primary" style="width: {{$this->advance}}%;height:100%;"></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="max-width:max-content;">
                        <i class="fas fa-trophy fs-3" style="color:#392C70;"></i>
                    </div>
                </div>
                <p class="fs-6 my-0 d-flex justify-content-between">
                    <span>{{$this->countCompletedLessons($this->course->lessons)}} de {{$this->totalLessons()}} completados ({{$this->advance}}%)</span> 
                    @if ($this->countCompletedLessons($this->course->lessons) == $this->totalLessons())
                        <a href="" class="text-decoration-none">Obtener Certificado</a>    
                    @endif
                </p>
            </div>
            {{-- SECTIONS --}}
            <div class="mt-3">
                <p class="fw-bold w-100 my-0 px-3 d-flex align-items-center border border-bottom-0 fs-5" style="border-color:#d9d7d7;background-color:#f8fafc;padding:10px 0;">
                    SECCIONES DEL CURSO
                </p>
                @foreach ($this->sections as $section)
                    <div class="" id="acordeon" >
                        <button class="w-100 py-2 px-3 text-start d-flex align-items-center justify-content-between accordion-h" type="button" data-bs-toggle="collapse" data-bs-target="#menu-{{$loop->iteration}}" id="accordion-header-{{$loop->iteration}}" style="{{!$loop->first ? 'border-top:0 !important' : ''}}" onclick="changeStateArrow(this)">
                            <span class="fs-6">Sección {{$loop->iteration}}: {{$section->title}}</span>
                            <i class="bi bi-chevron-down fs-5 me-2 d-inline-block {{$loop->first ? 'animate-rotateZNeg' : ''}}" id="arrow"></i>
                        </button>
                        {{-- <div class="collapse {{$loop->first ? 'show' : ''}} accordion-b" id="menu-{{$loop->iteration}}" style=""> --}}
                        <div class="collapse {{$section->lessons->contains($this->current_lesson) ? 'show' : ''}} accordion-b" id="menu-{{$loop->iteration}}" style="">
                            <div class="p-3 py-2">                                
                                @foreach ($section->lessons as $lesson)
                                    <ul class="list-unstyled m-0 p-0">
                                        <li class="my-1 p-0 d-flex gap-2 align-items-start" style="font-size: 16px;">
                                            @if ($this->current_lesson->id == $lesson->id)
                                                @if ($this->current_lesson->completed)
                                                    <i class="d-inline-block rounded-circle circle-course-status" style="border-color:yellow;"></i>    
                                                @else
                                                    <i class="d-inline-block rounded-circle circle-course-status" style="border-color:#ccc;"></i>
                                                @endif
                                                
                                            @else
                                                @if ($lesson->completed)
                                                    <i class="d-inline-block rounded-circle circle-course-status" style="background-color:yellow;border-color:rgba(255, 255, 0, 0.932);"></i>
                                                @else
                                                    <i class="d-inline-block rounded-circle circle-course-status" style="background-color:#ccc;border-color:rgb(175, 174, 174);"></i>
                                                @endif
                                            @endif
                                            <span class="" style="cursor: pointer;" wire:click="changeLesson('{{$lesson->id}}')">{{$lesson->name}}</span>
                                            <i class="d-inline-block ms-auto me-2 fas fa-unlock text-secondary" style="margin-top:5px"></i>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        function changeStateArrow(element){
            if(!element.classList.contains('collapsed')){
                element.children[1].classList.remove("animate-rotateZPos");
                element.children[1].classList.add("animate-rotateZNeg");
            }else{
                element.children[1].classList.remove("animate-rotateZNeg");
                element.children[1].classList.add("animate-rotateZPos");
            }
        }
    </script>
@endpush
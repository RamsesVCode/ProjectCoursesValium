<div class="row">
    <div class="col">
        @forelse ($sections as $section)
            <div class="shadow p-2 rounded px-3 text-light mt-2 d-flex gap-3 justify-content-between" x-data="{open:false}" style="background-color: #0c977d;width:100%;">
                @if($section->id == $section_edit->id)
                    <form class="d-flex justify-content-between w-100 gap-2" wire:submit.prevent="update()">
                        <input wire:model="section_edit.title" class=" d-inline-block w-100 border-0 fs-5" style="outline:none !important;" type="text">
                        <div style="min-width: max-content;font-size: 22px;" class="d-flex align-items-center gap-2">
                            <i class="fas fa-window-close text-light" wire:click="resetSec()" style="cursor:pointer;"></i>
                            <button type="submit" class="text-light border-0" style="outline:none;background-color:transparent;"><i class="fas fa-save"></i></button>
                        </div>
                    </form>                        
                @else
                    <h4 class="fs-5 m-0 p-0" style="max-width:580px;">Sección {{$loop->iteration}}: {{$section->title}}</h4>
                    <div style="min-width: max-content;font-size: 22px;" class="d-flex align-items-center gap-2">
                        <i class="fas fa-edit text-light" wire:click="edit({{$section->id}})" style="cursor:pointer;"></i>
                        <i class="fas fa-trash text-light" style="cursor:pointer;" wire:click="$emit('deleteSec',{{$section->id}})"></i>
                        <i class="fas fa-sitemap text-light" style="cursor:pointer;" wire:click="setCurrentSection({{$section->id}})"></i>
                    </div>
                @endif
            </div>
                @if($section->id == $section_edit->id)
                    @error('section_edit.title')
                        <p class="text-danger">("{{$message}}")</p>
                    @enderror
                @endif    
        @empty
            <div class="alert alert-light shadow mt-3 fs-5" style="max-width: max-content">
                <div class="d-flex align-items-center gap-3">
                    No hay registros
                    <i class="fas fa-frown fa-2x text-danger"></i>
                </div>
            </div>
        @endforelse
        <div x-data="{open:false}" class="mt-3">
            <button x-show="!open" class="btn btn-success text-light fs-5" @click="open=!open">
                <span>Agregar sección al curso</span>
                <i class="fas fa-plus-square text-light fs-4"></i>
            </button>
            <form wire:submit.prevent="save()" class="mt-3" style="font-family: 'Open sans'" x-show="open">
                <label class="form-label fs-5">{{__("Describe la sección")}}</label>
                <textarea name="title" wire:model="title" class="form-control mb-2" style="resize: none" rows="2"></textarea>
                @error('title')
                    <span class="text-danger d-block mb-2">{{$message}}</span>
                @enderror
                <button type="button" class="btn btn-secondary text-light" wire:click="$set('title','')" @click="open=false">Cancelar</button>
                <input type="submit" class="btn btn-primary text-light" @click="open=false" value="Guardar">
            </form>
        </div>
    </div>
    <div class="col">
        @if($current_section)
            <div class="d-flex justify-content-between align-items-center">
                <h5>Sección: {{$current_section->title}}</h5>
                <a href="{{route('teacher.sections.lessons.index',$current_section)}}" class="btn btn-info text-light fs-5">
                    <span>Ir a lecciones</span>
                    <i class="fas fa-share text-light fs-4"></i>
                </a>
            </div>
            @forelse ($current_section->lessons as $lesson)
                <div class="shadow p-2 rounded px-3 text-light mt-2 d-flex gap-3 justify-content-between" style="background-color: #A2A2A2;width:100%;">
                    <h4 class="fs-5 m-0 p-0" style="max-width:580px;">Lección {{$loop->iteration}}: {{$lesson->name}}</h4>
                    <div style="min-width: max-content;font-size: 22px;" class="d-flex align-items-center gap-2">
                        <i class="fas fa-edit text-light" wire:click="" style="cursor:pointer;"></i>
                        <i class="fas fa-trash text-light" style="cursor:pointer;" wire:click="$emit('deleteLess',{{$lesson->id}})"></i>
                    </div>
                </div>
            @empty
                <div class="alert alert-light shadow mt-3 fs-5" style="max-width: max-content">
                    <div class="d-flex align-items-center gap-3">
                        No hay registros
                        <i class="fas fa-frown fa-2x text-danger"></i>
                    </div>
                </div>
            @endforelse
            <div class="mt-3">
                <a href="{{route('teacher.sections.lessons.create',['section'=>$current_section])}}" class="btn btn-danger text-light fs-5">
                    <span>Agregar lección</span>
                    <i class="fas fa-plus-square text-light fs-4"></i>
                </a>
            </div>
        @endif
    </div>
</div>
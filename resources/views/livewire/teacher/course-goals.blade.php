<div>
    @forelse ($goals as $goal)
    <div class="shadow p-2 rounded px-3 text-light mt-2 d-flex gap-3 justify-content-between" style="background-color: #57629b;width:100%;">
        @if($goal->id == $goal_edit->id)
            <form class="d-flex justify-content-between w-100 gap-2" wire:submit.prevent="update()">
                <input wire:model="goal_edit.description" class=" d-inline-block w-100 border-0 fs-5" style="outline:none !important;" type="text">
                <div style="min-width: max-content;font-size: 22px;" class="d-flex align-items-center gap-2">
                    <i class="fas fa-window-close text-light" wire:click="resetGoal()" style="cursor:pointer;"></i>
                    <button type="submit" class="text-light border-0" style="outline:none;background-color:transparent;"><i class="fas fa-save"></i></button>
                </div>
            </form>            
        @else
            <h4 class="fs-5 m-0 p-0" style="max-width:580px;">{{$goal->description}}</h4>
            <div style="min-width: max-content;font-size: 22px;" class="d-flex align-items-center gap-2">
                <i class="fas fa-edit text-light" wire:click="edit({{$goal->id}})" style="cursor:pointer;"></i>
                <i class="fas fa-trash text-light" style="cursor:pointer;" wire:click="$emit('deleteGoal',{{$goal->id}})"></i>
            </div>
        @endif
    </div>
        @if($goal->id == $goal_edit->id)
            @error('goal_edit.description')
                <p class="text-danger">("{{$message}}")</p>
            @enderror
        @endif    
    @empty
        <div class="alert alert-light shadow mt-3 fs-5">
            <div class="d-flex align-items-center gap-3">
                No hay registros
                <i class="fas fa-frown fa-2x text-danger"></i>
            </div>
        </div>
    @endforelse
    <div x-data="{open:false}" class="mt-3">
        <button x-show="!open" class="btn btn-success text-light fs-5" @click="open=true">
            <span>Agregar objetivo al curso</span>
            <i class="fas fa-plus-square text-light fs-4"></i>
        </button>
        <form wire:submit.prevent="save()" class="mt-3" style="font-family: 'Open sans'" x-show="open">
            <label class="form-label fs-5">{{__("Describe el objetivo")}}</label>
            <textarea name="description" wire:model="description" class="form-control mb-2" style="resize: none" rows="2"></textarea>
            @error('description')
                <span class="text-danger d-block mb-2">{{$message}}</span>
            @enderror
            <button type="button" class="btn btn-secondary text-light" wire:click="$set('description','')" @click="open=false">Cancelar</button>
            <input type="submit" class="btn btn-primary text-light" @click="open=false" value="Guardar">
        </form>
    </div>
</div>

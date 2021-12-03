<div>
    <h5>Te invitamos a realizar un comentario sobre esta lección</h5>
    <div class="mb-2">
        <button class="p-2 px-3 border border-dark btn-comment" wire:click="resetOwner()">Todos los comentarios</button>
        <button class="p-2 px-3 border border-dark btn-comment" wire:click="changeToUser()" style="font-size: 16px;background-color:transparent;">Mis comentarios</button>
    </div>
    {{-- Comments --}}
    @if($this->comments)
        @foreach ($this->comments as $comment)
        <div class="d-flex gap-2 mb-0">
            <img src="{{$comment->user->profile_photo_path}}" width="45" height="45" class="d-flex rounded-circle mt-2" alt="">
            <div class="p-2 pb-1">
                <h5 class="gap-2 fs-6 my-0 text-primary">
                    <span class="me-2">{{$comment->user->name}}</span>
                    <span class="text-muted">{{$comment->created_at->diffForHumans()}}</span>
                </h5>
                <span class="d-inline-block me-2 mb-1 fs-5">{{$comment->body}}</span>
            </div>
        </div>        
        @endforeach
    @endif
    {{-- User authenticated --}}
    <hr width="90%" color="#ccc">
    @if (auth()->check())
        <div class="d-flex gap-2 my-0">
            <img src="{{Storage::url(auth()->user()->profile_photo_path)}}" width="45" height="45" class="d-flex rounded-circle mt-2" alt="">
            <div class="p-2 pb-1">
                <h5 class="gap-2 fs-6 my-0 mb-1 text-primary">
                    {{auth()->user()->name}}
                </h5>
                <div x-data="{open:false}">
                    <a href="" class="text-dark fs-5" x-show="!open" @click.prevent="open=!open">Realizar comentario</a>
                    <form action="#" x-show="open" wire:submit.prevent="saveComment()">
                        <input type="text" wire:model="body" placeholder="Ingresar tu comentario" style="border:none;outline:none !important;border-bottom:1px solid #ccc;font-size:16px;width:110%">
                        @error('body')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        <input type="submit" class="btn btn-primary mt-2 text-light" value="Guardar">
                        <input type="reset" class="btn btn-secondary mt-2 text-light" value="Cancelar" @click="open=!open">
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

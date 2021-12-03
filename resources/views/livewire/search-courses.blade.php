<div style="" x-data="{search:@entangle('search')}">
    <form action="" class="d-flex gap-0 row" style="width:100%;margin-left:0 !important;">
        <input class="d-inline-block input-search col-md-8 col fs-5" x-on:click.away="search=''" wire:click="$set(search,'')" wire:model="search" type="text" name="search" placeholder="Buscar curso">
        <button type="submit" class="btn col text-light fs-5" style="background-color: #403a3f;min-width:max-content;max-width:max-content;"><i class="fas fa-search"></i></button>
    </form>
    @if($search)
    <div class="row d-flex gap-0" style="width:100%;margin-left:0 !important;position:relative">
        <ul class="list-unstyled col-md-8 col-11 p-0 overflow-hidden border text-start" style="border-radius: 0 0 8px 8px;position: absolute;border-color:#ccc;">
            @forelse ($this->results as $result)
                <li><a href="{{route('courses.show',$result)}}" class="d-flex py-3 px-3 text-dark text-decoration-none item-list-courses">{{$result->title}}</a></li>
            @empty
                <li class="py-3 px-3 text-dark text-decoration-none" style="background-color:white;">No hay resultados</li>
            @endforelse
        </ul>
    </div>
    @endif
</div>

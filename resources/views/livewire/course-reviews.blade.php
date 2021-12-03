<div id="course-reviews">
    <h2 class="mb-1">Valoraciones del curso</h2>
    <p class="fs-5 my-0">Nuestros usuarios valoran nuestros cursos de acuerdo a su experiencia, tu tambien puedes valorar este curso.</p>
    <div class="" id="container-reviews">
        @if (auth()->check())
            @can('enrolled', $course)
                <div class="d-flex gap-3 mb-3" style="font-family: 'Open Sans">
                    <img src="{{Storage::url(auth()->user()->profile_photo_path)}}" width="45" height="45" class="d-flex rounded-circle" alt="">
                    <div x-data="{open : false}" class="rounded p-3 bg-light flex-grow-1" style="border: 1px solid #d9d7d7;background-color:#FAFAFA !important;max-width:80%;">
                        <h5 class="gap-2 fs-6 my-0 text-primary">{{auth()->user()->name}}</h5>
                        <a href="#" class="my-2 btn btn-danger text-light fs-5" x-show="!open" @click.prevent="open = true">Valorar Curso</a>
                        <form class="" action="#" method="POST" x-show="open">
                            <span class="fs-5 mb-1">Selecciona una cantidad de estrellas</span>
                            <ul class="list-unstyled d-flex my-0 py-0 mb-1 gap-2 fs-1 justify-content-center" style="">
                                <li style="cursor: pointer"><i class="fas fa-star" style="color:#ccc;"></i></li>
                                <li style="cursor: pointer"><i class="fas fa-star" style="color:#ccc;"></i></li>
                                <li style="cursor: pointer"><i class="fas fa-star" style="color:#ccc;"></i></li>
                                <li style="cursor: pointer"><i class="fas fa-star" style="color:#ccc;"></i></li>
                                <li style="cursor: pointer"><i class="fas fa-star" style="color:#ccc;"></i></li>
                            </ul>
                            <p class="my-0 py-0 fs-5 mb-1">
                                Describe tu experiencia
                                <textarea type="text" class="form-control fs-5 py-2 px-3" style="background-color: white;resize: none;" name="comment"></textarea>
                            </p>
                            <p class="text-end my-0 py-0 pt-1">
                                <button type="button" class="btn btn-primary btn-lg text-light" @click="open = false">Cancelar</button>
                                <input type="submit" class="btn btn-secondary btn-lg" style="" value="Valorar">
                            </p>
                        </form>
                    </div>
                </div>  
            @endcan
        @endif
        <hr width="90%" class="mx-auto">
        @forelse ($reviews as $review)
            <div class="d-flex gap-3 mb-3">
                <img src="{{Storage::url($review->user->profile_photo_path)}}" width="45" height="45" class="d-flex rounded-circle" alt="">
                <div class="rounded p-2 bg-light w-100" style="border: 1px solid #d9d7d7;background-color:#F7F7F7 !important;">
                    <h5 class="gap-2 fs-6 my-0 text-primary">{{$review->user->name}}</h5>
                    <div class="d-flex gap-1">
                        <ul class="list-unstyled d-flex my-0 py-0" style="gap:1px;">
                            <li><i class="fas fa-star" style="{{ $review->rating>=1 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                            <li><i class="fas fa-star" style="{{ $review->rating>=2 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                            <li><i class="fas fa-star" style="{{ $review->rating>=3 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                            <li><i class="fas fa-star" style="{{ $review->rating>=4 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                            <li><i class="fas fa-star" style="{{ $review->rating>=5 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                        </ul>
                        <span class="d-inline-block me-2 mb-lg-2 mb-1">({{$review->rating}})</span>
                        <span class="text-muted">{{$review->created_at->diffForHumans()}}</span>
                    </div>
                    <p class="my-0 py-0">{{$review->comment}}</p>
                </div>
            </div>    
        @empty
            <div class="alert alert-danger">
                Aún no hay valoraciones
            </div>
        @endforelse
    </div>
</div>
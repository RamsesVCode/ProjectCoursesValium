@props(['course'])
<div {{$attributes->merge(['class'=>'col mx-auto mx-sm-0'])}}>
    <div class="card" style="margin-bottom:15px;">
        @if ($course->image->url)
            <img src="{{Storage::url($course->image->url)}}" alt="" class="card-img " style="height: 150px !important;object-fit:cover;">
        @else
            <img src="{{asset('images/course.jpg')}}" alt="" class="card-img " style="height: 150px !important;object-fit:cover;">
        @endif
        <div class="card-body" style="border: 1px solid #e8e4e4 !important;border-top:none !important;">
            <h5 class="fw-bold fs-5 mb-0 text-desborded" style="height:45px !important;">
                {{$course->title}}
            </h5>
            <small class="text-muted">Prof. {{$course->teacher->name}}</small>
            <div class="d-flex align-items-center">
                <p class="me-2 mb-0 fs-5">{{$course->average_reviews}}</p>
                <ul class="list-unstyled d-flex me-2 mb-0">
                    <li><i class="fas fa-star" style="{{ $course->average_reviews>=1 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                    <li><i class="fas fa-star" style="{{ $course->average_reviews>=2 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                    <li><i class="fas fa-star" style="{{ $course->average_reviews>=3 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                    <li><i class="fas fa-star" style="{{ $course->average_reviews>=4 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                    <li><i class="fas fa-star" style="{{ $course->average_reviews>=5 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                </ul>
                <p class="mb-0 text-muted">({{$course->reviews_count}})</p>
            </div>
            @if ($course->price->mount>0)
                <h4 class="fs-5 mt-0">{{$course->price->mount}} US$</h4>
            @else
                <span class="text-danger fs-5 fw-bold">!GRATIS¡</span>
            @endif
            <a href="{{route('courses.show',$course)}}" class="btn bg-valium-inactive fs-5 btn-show-course" style="width: 100%">Ver Curso</a>
        </div>        
    </div>
</div>
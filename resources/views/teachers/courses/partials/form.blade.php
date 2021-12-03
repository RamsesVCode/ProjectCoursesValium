<div class="row g-5 fs-5">
    <div class="col">
        <div class="mb-3">
            {!! Form::label('title', 'Título', ['class' => 'form-label']) !!}
            {!! Form::text('title', null, ['class' => 'form-control','placeholder' => 'Título del curso']) !!}
            @error('title')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('slug', 'Slug', ['class' => 'form-label']) !!}
            {!! Form::text('slug', null, ['class' => 'form-control','readonly'=>true]) !!}
            @error('slug')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('description', 'Descripción', ['class' => 'form-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            @error('description')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('category_id', 'Categoria', ['class' => 'form-label']) !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-select']) !!}
            @error('category_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('level_id', 'Nivel', ['class' => 'form-label']) !!}
            {!! Form::select('level_id', $levels, null, ['class'=>'form-select']) !!}
            @error('level_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('price_id', 'Precio', ['class' => 'form-label']) !!}
            {!! Form::select('price_id', $prices, null, ['class'=>'form-select']) !!}
            @error('price_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col">
        {!! Form::label('image', 'Selecciona una imagen', ['class' => 'form-label']) !!}
        {!! Form::file('image', ['class'=>'form-control']) !!}
        @error('image')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="p-2" id="image-container">
            @isset($course)
                <img src="{{Storage::url($course->image->url)}}" id="visor" width="500px" class="d-block mx-auto mt-2" style="max-height: 320px;object-fit:cover;">
            @else
                <img src="" id="visor" width="500px" class="d-block mx-auto mt-2" style="max-height: 320px;object-fit:cover;">
            @endisset        
            <p class="my-0 mt-3 ms-3" id="name-file"></p>
            <p class="my-0 ms-3" id="size"></p>
            <p class="my-0 ms-3" id="myme"></p>
            <p class="my-0 ms-3" id="error-image"></p>
        </div>
    </div>
</div>
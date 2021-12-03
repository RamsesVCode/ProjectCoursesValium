<div class="row g-5">
    <div class="col-7">
        <div class="mb-3">
            {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombre de la lección']) !!}
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('description', 'Descripción', ['class' => 'form-label']) !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            @error('description')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('url', 'Enlace de video', ['class' => 'form-label']) !!}
            {!! Form::text('url', null, ['class'=>'form-control','placeholder'=>'Enlace']) !!}
            @error('url')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('platform_id', 'Selecciona la plataforma', ['class' => 'form-label']) !!}
            {!! Form::select('platform_id', $platforms, null, ['class'=>'form-select']) !!}
            @error('platform_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
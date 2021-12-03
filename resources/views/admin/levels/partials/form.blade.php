<div>
    <div class="mb-3">
        {!! Form::label('name', 'Nombre', ['class'=>'form-label']) !!}
        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombre del nivel']) !!}
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
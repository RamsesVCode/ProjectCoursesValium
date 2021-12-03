<div>
    <div class="mb-3">
        {!! Form::label('name', 'Nombre', ['class'=>'form-label']) !!}
        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombre de la categoria']) !!}
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3">
        {!! Form::label('description', 'Descripción', ['class'=>'form-label']) !!}
        {!! Form::textarea('description', null, ['class'=>'form-control','style'=>'resize:none;','rows'=>4]) !!}
        @error('description')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
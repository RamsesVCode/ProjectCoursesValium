<div>
    {{-- <div class="mb-3">
        {!! Form::label('name', 'Nombre', ['class'=>'form-label']) !!}
        {!! Form::number('name', null, ['class'=>'form-control','placeholder'=>'Nombre del precio','readonly'=>true,'min'=>0]) !!}
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div> --}}
    <h2 style="font-size: 16px !important"><span class="text-danger">!Ciudado¡</span> Utilice punto (.) en lugar de coma (,)</h2>
    <div class="mb-3">
        {!! Form::label('mount', 'Monto', ['class'=>'form-label']) !!}
        {!! Form::number('mount', null, ['class'=>'form-control','placeholder'=>'Monto','min'=>0,'step'=>0.01]) !!}
        @error('mount')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
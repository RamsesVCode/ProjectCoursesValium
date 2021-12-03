<div class="row g-5">
    <div class="col-7">
        <div class="mb-3">
            {!! Form::label('name', 'Nombre', ['class'=>'form-label']) !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombre del recurso']) !!}
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('description', 'Descripción', ['class'=>'form-label']) !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            @error('description')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('type', null, ['class'=>'form-label']) !!}
            {!! Form::select('type', $types, null, ['class'=>'form-select']) !!}
            @error('type')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('file', null, ['class'=>'form-label']) !!}
            {!! Form::file('file', ['class'=>'form-control']) !!}
            @error('file')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-5">
        <h3>Archivo seleccionado</h3>  
        <div id="box">
            <img src="
                @isset($resource)
                    @if($resource->type=='Pdf')
                        {{asset('images/pdf.png')}}
                    @endif
                    @if($resource->type=='Zip')
                        {{asset('images/zip.png')}}
                    @endif
                    @if($resource->type=='Image')
                        {{Storage::url($resource->url)}}
                    @endif
                @else
                    {{asset('images/pdf.png')}}
                @endif
            " alt="" width="420px" height="270px" style="object-fit: cover;border:0 !important;outline:0 !important;" id="file-image">
            <p id="sent" class="mt-2"></p>
            @isset($resource)
                <p class="text-muted fs-5">
                    @if($resource->type=='Pdf')
                        El archivo actual es PDF
                    @endif
                    @if($resource->type=='Zip')
                        El archivo actual es ZIP
                    @endif
                    @if($resource->type=='Image')
                        El archivo actual es IMAGEN
                    @endif
                </p>
            @endif
        </div>
    </div>
</div>
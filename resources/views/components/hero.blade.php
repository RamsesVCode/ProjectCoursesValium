@props(['link'])
<div style="background-image:url({{$link}}); height:580px;background-size:cover;" {{$attributes->merge(['class'=>''])}}>
    <div style="background-color: rgba(0,0,0,.4); height:inherit;width:inherit;" class="row">
        {{$form}}
        {{$slot}}
    </div>
</div>
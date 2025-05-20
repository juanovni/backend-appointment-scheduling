@props(['class'])

<div class="{{$class}}">
    <div class="col-md-12">
        {{ $slot }}
    </div>
</div>
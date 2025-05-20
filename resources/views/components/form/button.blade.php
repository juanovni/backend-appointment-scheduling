@if(!isset($field_class))
@php
$field_class = 'row';
@endphp
@endif

<x-form.field :class="$field_class">
    @foreach ($buttons as $button)
    <{{$button['tag']}}
        @if(isset($button['id']))
        id="{{ $button['id'] }}"
        @endif

        @if(isset($button['route']))
        href="{{ $button['route'] }}"
        @endif

        @if (isset($button['from_modal']) && $button['from_modal'])
        data-bs-dismiss="modal"
        @endif

        type="{{$button['type']}}"
        class="{{$button['class']}}">

        @if (isset($button['btn_icon_class']))
        <i class="{{$button['btn_icon_class']}}"></i>
        @endif
        <span class="indicator-label">{{ $button['button_label'] }}</span>
        <span class="indicator-progress">Por favor espere...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </{{$button['tag']}}>
    @endforeach
</x-form.field>
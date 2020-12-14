
<{{ $tag }}
    {!! $href !!}
    type="button"
    class="btn
        {{ $color }}
        {{ $size }}
        {{ $state }}
        {{ $round ? 'btn-rounded' : '' }}
        {{ $gradient ? 'btn-gradient' : '' }}
        {{ $block ? 'btn-block' : '' }}
    "
>

    <i class="fa {{ $icon }}"></i> {{ $text }}

</{{ $tag }}>

@php
    $floatingButton = collect($floatingButton)->pluck('value', 'key');
    $title = $floatingButton->get('title');
    $bgColor = $floatingButton->get('background_color');
    $bgColor = $bgColor === 'transparent' ? 'var(--primary-color)' : $bgColor;
    $url = $floatingButton->get('url');
    switch ($floatingButton->get('type')) {
        case 'phone':
            $url = 'tel:' . $url;
            break;
        case 'email':
            $url = 'mailto:' . $url;
            break;
        case 'whatsapp':
            $url = 'https://wa.me/' . $url;
            break;
    }
@endphp
<li class="flex-grow-1 sb-mobile">
    <a href="{{ $url }}" @if($floatingButton->get('open_in_the_new_tab')) target="_blank" @endif class="ring-animation sb-mobile-link">
        @if ($icon = ($floatingButton->get('icon_image') ?: $floatingButton->get('icon')))
            <div class="sb-mobile-icon">
                @if ($floatingButton->get('icon_image'))
                    {{ RvMedia::image($icon, $title, attributes: ['class' => 'sb-icon']) }}
                @else
                    <x-core::icon :name="$icon" />
                @endif
            </div>
        @endif

        <div class="sb-mobile-label">{{ $title }}</div>
    </a>
</li>

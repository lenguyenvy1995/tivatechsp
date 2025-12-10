@php
    $title = $shortcode->title ?? '';
    $subtitle = $shortcode->suptitle ?? '';
    $count = (int) ($shortcode->number_tabs ?? 3);
    $tabs = [];

    for ($i = 1; $i <= $count; $i++) {
        $tabs[] = [
            'title' => $shortcode->{'tab_' . $i . '_title'} ?? '',
            'image' => $shortcode->{'tab_' . $i . '_img'} ?? '',
        ];
    }

    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_img ? RvMedia::getImageUrl($shortcode->background_img) : null;

    $variablesStyle = [];

    if ($bgImage) {
        $variablesStyle['background-image'] = "url('$bgImage')";
    } elseif ($bgColor) {
        $variablesStyle['background-color'] = $bgColor;
    }
@endphp
<section class="shortcode-customer shortcode-customer-actual-pictures py-4"
    style="{{ collect($variablesStyle)->map(fn($v, $k) => "$k: $v")->implode('; ') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                @if ($subtitle)
                    <div class="section-subtitle text-center">{{ $subtitle }}</div>
                @endif
                @if ($title)
                    <h2 class="section-title text-center">{{ $title }}</h2>
                @endif
            </div>
            <div id="gallery-light" class="actual-pictures-gallery justified-gallery">
                @foreach ($tabs as $index => $tab)
                    @if (!empty($tab['image']))
                        <a href="{{ RvMedia::getImageUrl($tab['image']) }}" class="gallery-item">
                            <img src="{{ RvMedia::getImageUrl($tab['image']) }}" alt="Hình ảnh {{ $index + 1 }}" />
                        </a>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</section>

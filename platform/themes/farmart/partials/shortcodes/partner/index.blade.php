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
<section class="shortcode-customer shortcode-customer-partner  py-4"
    style="{{ collect($variablesStyle)->map(fn($v, $k) => "$k: $v")->implode('; ') }}">
    <div class="container">
        <div class="row">
            @if ($title)
            <div class="col-12 ">
                @if ($subtitle)
                    <div class="section-subtitle text-center">{{ $subtitle }}</div>
                @endif
              
                    <h2 class="section-title text-center">{{ $title }}</h2>
              
            </div>
            @endif
            <div class="col-12">
                <div class="product-deals-day-body slick-slides-carousel"
                    data-slick="{{ json_encode([
                        'rtl' => BaseHelper::siteLanguageDirection() == 'rtl',
                        'appendArrows' => '.arrows-wrapper',
                        'arrows' => true,
                        'dots' => false,
                        'autoplay' => $shortcode->is_autoplay == 'yes',
                        'infinite' => $shortcode->infinite == 'yes' || $shortcode->is_infinite == 'yes',
                        'autoplaySpeed' => in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options())
                            ? $shortcode->autoplay_speed
                            : 3000,
                        'speed' => 800,
                        'slidesToShow' => 5,
                        'slidesToScroll' => 1,
                        'swipeToSlide' => true,
                        'responsive' => [
                            [
                                'breakpoint' => 1400,
                                'settings' => [
                                    'slidesToShow' => 5,
                                ],
                            ],
                            [
                                'breakpoint' => 1199,
                                'settings' => [
                                    'slidesToShow' => 4,
                                ],
                            ],
                            [
                                'breakpoint' => 1024,
                                'settings' => [
                                    'slidesToShow' => 3,
                                ],
                            ],
                            [
                                'breakpoint' => 767,
                                'settings' => [
                                    'arrows' => true,
                                    'dots' => false,
                                    'slidesToShow' => 2,
                                    'slidesToScroll' => 2,
                                ],
                            ],
                        ],
                    ]) }}">


                   @foreach ($tabs as $index => $tab)
                   @if (!empty($tab['image']))
                       @php
                           $alt = !empty($tab['title']) ? $tab['title'] : 'Hình ảnh ' . ($index + 1);
                       @endphp
                       <a href="{{ RvMedia::getImageUrl($tab['image']) }}">
                           <img src="{{ RvMedia::getImageUrl($tab['image'], 'thumb') }}" alt="{{ $alt }}" />
                       </a>
                   @endif
               @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

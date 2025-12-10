@php
    $slick = [
        'rtl' => BaseHelper::siteLanguageDirection() == 'rtl',
        'appendArrows' => '.arrows-wrapper',
        'arrows' => true,
        'dots' => true,
        'autoplay' => $shortcode->is_autoplay == 'yes',
        'infinite' => $shortcode->infinite == 'yes' || $shortcode->is_infinite == 'yes',
        'autoplaySpeed' => in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options())
            ? $shortcode->autoplay_speed
            : 3000,
        'speed' => 800,
        'slidesToShow' => $shortcode->slides_to_show ?: 3,
        'slidesToScroll' => 1,
        'responsive' => [
            [
                'breakpoint' => 1199,
                'settings' => [ 'slidesToShow' => 2 ],
            ],
            [
                'breakpoint' => 767,
                'settings' => [
                    'arrows' => false,
                    'dots' => true,
                    'slidesToShow' => 1,
                    'slidesToScroll' => 1,
                ],
            ],
        ],
    ];

    // =============================
    //  BACKGROUND FIX CHUẨN 100%
    // =============================
    $bgImage = $shortcode->background_img ? RvMedia::getImageUrl($shortcode->background_img) : null;
    $bgColor = $shortcode->background_color ?: '#ffffff';

    $style = '';

    if($bgImage) {
        $style .= "background-image: url('$bgImage') !important;";
        $style .= "background-size: cover !important;";
        $style .= "background-position: center !important;";
        $style .= "background-repeat: no-repeat !important;";
    } else {
        $style .= "background-color: $bgColor !important;";
    }

    // loại bỏ style trong htmlAttributes() để nó không override nữa
    $attributes = $shortcode->htmlAttributes();
    $attributes = str_replace('style="', 'data-style="', $attributes);

@endphp

{{-- =============================
     VIEW HIỂN THỊ SHORTCODE
============================= --}}
<div class="widget-testimonials py-4 {{ $bgImage ? 'has-bg-img' : '' }}" {!! $attributes !!} style="{{ $style }}">
    <div class="container">

        @if ($shortcode->title)
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary">{{ $shortcode->title }}</h2>

                @if ($shortcode->subtitle)
                    <p class="text-muted">{{ $shortcode->subtitle }}</p>
                @endif
            </div>
        @endif

        <div class="row">
            {{-- ảnh dự án --}}
            <div class="col-md-6">
                <div class="testimonial-image rounded overflow-hidden">
                    {{ RvMedia::image($shortcode->project_image, $shortcode->title, 'full', false, ['class' => 'w-100']) }}
                </div>
            </div>

            {{-- slider --}}
            <div class="col-md-6 my-auto">
                <div class="testimonials-slider slick-slides-carousel" data-slick='@json($slick)'>

                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-item">
                            <div class="row align-items-center gx-5">

                                <div class="testimonial-content mt-4 mt-md-0 pe-lg-4">
                                    <div class="testimonial-content-left">

                                        <div class="testimonial-user">
                                            <div class="testimonial-content-left-header testimonial-user-info">
                                                <h3 class="header-title">{{ $testimonial->name }}</h3>
                                                @if ($testimonial->company)
                                                    <p class="header-company"> {{ $testimonial->company }}</p>
                                                @endif
                                            </div>

                                            <div class="testimonial-avatar">
                                                {{ RvMedia::image($testimonial->image, $testimonial->name, 'thumb') }}
                                            </div>
                                        </div>

                                        {{-- rating --}}
                                        <div class="testimonial-rating text-warning mb-3">
                                            @php $stars = $testimonial->shortcode_stars ?? 5; @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <x-core::icon name="{{ $i <= $stars ? 'ti ti-star-filled' : 'ti ti-star' }}"/>
                                            @endfor
                                        </div>

                                        <p class="testimonial-content-left-description">{!! BaseHelper::clean($testimonial->content) !!}</p>
                                    </div>

                                    <div class="testimonial-content-right">
                                        <div class="quote-icon text-end pe-3">
                                            <x-core::icon name="ti ti-quote"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>

{{-- CSS chống override Farmart --}}
<style>
    .widget-testimonials.has-bg-img {
        --block-testimonials-background-color: transparent !important;
        background-color: transparent !important;
    }
</style>
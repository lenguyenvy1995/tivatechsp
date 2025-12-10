<section class=" shortcode-customer-introduce  shortcode-customer-introduce-style-1 shortcode-customer " style="{{ collect($variablesStyle)->map(fn($v, $k) => "$k: $v")->implode('; ') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="introcude-left">
                    <img src="{{ RvMedia::getImageUrl($shortcode->img) }}" alt="">
                </div>
            </div>
            <div class="col-md-6 my-auto">
                <div class="introcude-right pt-4 pt-md-0">

                    @if($shortcode->subtitle)
                        <h3 class="sub-title">{{ $shortcode->subtitle }}</h3>
                    @endif
                
                    @if($shortcode->title)
                        <h2 class="title mb-3">{{ $shortcode->title }}</h2>
                    @endif
                
                    @if($shortcode->description)
                        <div class="description mb-3">
                            {!! $shortcode->description !!}
                        </div>
                    @endif
                
                    @if($shortcode->button_link)
                        <a href="{{ $shortcode->button_link }}" class="btn-tivatech">XEM THÊM</a>
                    @endif
                
                </div>
            </div>
        </div>
    </div>
</section>
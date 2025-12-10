<section class=" shortcode-customer shortcode-customer-subitem shortcode-customer-subitem-style-3 py-4"
    style="{{ collect($variablesStyle)->map(fn($v, $k) => "$k: $v")->implode('; ') }}">
    <div class="container">
        @if ($shortcode->title)
        <div class="row">
            <div class="col-12">
                <h2 class="title text-center mb-3">{{ $shortcode->title }}</h2>
                @if ($shortcode->subtitle)
                    <p class="sub-title text-center fs-6">{{ $shortcode->subtitle }}</p>
                @endif
            </div>
        </div>
    @endif
        <div class="row row-cols-xxl-4 row-cols-lg-4 row-cols-md-3 row-cols-2 justify-content-center g-4">
            @foreach ($tabs as $index => $tab)
                @php
                    $alt = !empty($tab['title']) ? $tab['title'] : 'Hình ảnh ' . ($index + 1);
                    $imageUrl = RvMedia::getImageUrl($tab['image'] ?? null);
                @endphp

                <div class="col">
                    @if (!empty($tab['url']))
                        <a href="{{ $tab['url'] }}">
                            <div class="subitem-card card">
                                @if (!empty($tab['image']))
                                    <div class="subitem-card-top">
                                        <img src="{{ $imageUrl }}" alt="{{ $alt }}" class="img-fluid" />
                                    </div>
                                @endif
                                <div class="subitem-card-content">
                                    @if (!empty($tab['title']))
                                        <h3 class="subitem-card-content-title">{{ $tab['title'] }}</h3>
                                    @endif
                                    @if (!empty($tab['description']))
                                    <p class="subitem-card-content-description">{{ $tab['description'] }}</p>
                                @endif
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

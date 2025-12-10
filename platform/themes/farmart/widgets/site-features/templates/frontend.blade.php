<div
    class="row {{ in_array($sidebar, ['pre_footer_sidebar', 'footer_sidebar', 'bottom_footer_sidebar']) ? 'row-cols-xxl-5 row-cols-lg-4 row-cols-md-3 row-cols-1 justify-content-center g-2' : 'row-cols-1 bg-light mb-5 py-3 px-4 g-0' }}">
    @for ($i = 1; $i <= 5; $i++)
        @if ($title = Arr::get(Arr::get($config['data'], $i), 'title'))
            <div class="col py-2">
                <div class="site-info__item d-flex align-items-start">
                    <div class="site-info__image my-auto">
                        <img
                            class="lazyload"
                            data-src="{{ RvMedia::getImageUrl(Arr::get(Arr::get($config['data'], $i), 'icon'), null, false, RvMedia::getDefaultImage()) }}"
                            alt="{{ $title }}"
                        >
                    </div>
                    <div class="site-info__content">
                        <h2 class="site-info__title h4 fw-bold">{{ $title }}</h2>
                        <div class="site-info__desc">{!! BaseHelper::clean(nl2br(Arr::get(Arr::get($config['data'], $i), 'subtitle'))) !!}</div>
                    </div>
                </div>
            </div>
        @endif
    @endfor
</div>

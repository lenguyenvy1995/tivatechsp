@php
    $footerBgColor = theme_option('footer_background_color', '#ffffff');
    $footerBgImage = theme_option('footer_background_image');
    $footerStyle = '';

    if ($footerBgImage) {
        $footerStyle =
            'background-image: url(' .
            RvMedia::getImageUrl($footerBgImage) .
            '); background-size: cover; background-repeat: no-repeat;';
    } elseif ($footerBgColor) {
        $footerStyle = 'background-color: ' . $footerBgColor . ';';
    }
@endphp
<footer id="footer">
    @if ($preFooterSidebar = dynamic_sidebar('pre_footer_sidebar'))
        <div class="footer-info border-top">
            <div class="container-xxxl py-3">
                {!! $preFooterSidebar !!}
            </div>
        </div>
    @endif
    @if ($footerSidebar = dynamic_sidebar('footer_sidebar'))
        <div class="footer-widgets pb-5" style="{{ $footerStyle }}">
            <div class="container">
                <div class="row border-top justify-content-center py-5">
                    {!! $footerSidebar !!}
                </div>
            </div>
            <div class="container-fluid  bg-dark">
                <div class="row border-top py-4">
                    <div class="col-12">
                        <div
                            class="d-flex gap-3 justify-content-center align-items-center text-center bottom-footer-wrapper">
                            <div class="copy">
                                <p class="m-0 text-white"> Copyright © {{ date('Y') }} <span
                                        class="text-uppercase text-white">{!! Theme::getSiteCopyright() !!} </span> - design by <a
                                        href="https://tivatech.vn">TIVATECH.VN</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
    @if ($bottomFooterSidebar = dynamic_sidebar('bottom_footer_sidebar'))
        <div class="container-xxxl">
            <div class="footer__links" id="footer-links">
                {!! $bottomFooterSidebar !!}
            </div>
        </div>
    @endif

</footer>
@if (is_plugin_active('ecommerce'))
    <div class="panel--sidebar" id="navigation-mobile">
        <div class="panel__header">
            <span class="svg-icon close-toggle--sidebar">
                <svg>
                    <use href="#svg-icon-arrow-left" xlink:href="#svg-icon-arrow-left"></use>
                </svg>
            </span>
            <h3>{{ __('Categories') }}</h3>
        </div>
        <div class="panel__content" data-bb-toggle="init-categories-dropdown"
            data-bb-target=".product-category-dropdown-wrapper"
            data-url="{{ route('public.ajax.categories-dropdown') }}">
            <ul class="menu--mobile product-category-dropdown-wrapper"></ul>
        </div>
    </div>
@endif

<div class="panel--sidebar" id="menu-mobile">
    <div class="panel__header">
        <span class="svg-icon close-toggle--sidebar">
            <svg>
                <use href="#svg-icon-arrow-left" xlink:href="#svg-icon-arrow-left"></use>
            </svg>
        </span>
        <h3>{{ __('Menu') }}</h3>
    </div>
    <div class="panel__content">
        {!! Menu::renderMenuLocation('main-menu', [
            'view' => 'menu',
            'options' => ['class' => 'menu--mobile'],
        ]) !!}

        {!! Menu::renderMenuLocation('header-navigation', [
            'view' => 'menu',
            'options' => ['class' => 'menu--mobile'],
        ]) !!}

        <ul class="menu--mobile">

            @if (is_plugin_active('ecommerce'))
                @if (EcommerceHelper::isCompareEnabled())
                    <li><a href="{{ route('public.compare') }}"><span>{{ __('Compare') }}</span></a></li>
                @endif

                @if (count($currencies) > 1)
                    <li class="menu-item-has-children">
                        <a href="#">
                            <span>{{ get_application_currency()->title }}</span>
                            <span class="sub-toggle">
                                <span class="svg-icon">
                                    <svg>
                                        <use href="#svg-icon-chevron-down" xlink:href="#svg-icon-chevron-down">
                                        </use>
                                    </svg>
                                </span>
                            </span>
                        </a>
                        <ul class="sub-menu">
                            @foreach ($currencies as $currency)
                                @if ($currency->id !== get_application_currency_id())
                                    <li><a
                                            href="{{ route('public.change-currency', $currency->title) }}"><span>{{ $currency->title }}</span></a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endif
            @if (is_plugin_active('language'))
                @php
                    $supportedLocales = Language::getSupportedLocales();
                @endphp

                @if ($supportedLocales && count($supportedLocales) > 1)
                    @php
                        $languageDisplay = setting('language_display', 'all');
                    @endphp
                    <li class="menu-item-has-children">
                        <a href="#">
                            @if ($languageDisplay == 'all' || $languageDisplay == 'flag')
                                {!! language_flag(Language::getCurrentLocaleFlag(), Language::getCurrentLocaleName()) !!}
                            @endif
                            @if ($languageDisplay == 'all' || $languageDisplay == 'name')
                                {{ Language::getCurrentLocaleName() }}
                            @endif
                            <span class="sub-toggle">
                                <span class="svg-icon">
                                    <svg>
                                        <use href="#svg-icon-chevron-down" xlink:href="#svg-icon-chevron-down">
                                        </use>
                                    </svg>
                                </span>
                            </span>
                        </a>
                        <ul class="sub-menu">
                            @foreach ($supportedLocales as $localeCode => $properties)
                                @if ($localeCode != Language::getCurrentLocale())
                                    <li>
                                        <a
                                            href="{{ Language::getSwitcherUrl($localeCode, $properties['lang_code']) }}">
                                            @if ($languageDisplay == 'all' || $languageDisplay == 'flag')
                                                {!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}
                                            @endif
                                            @if ($languageDisplay == 'all' || $languageDisplay == 'name')
                                                <span>{{ $properties['lang_name'] }}</span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</div>
<div class="panel--sidebar panel--sidebar__right" id="search-mobile">
    <div class="panel__header">
        @if (is_plugin_active('ecommerce'))
            <x-plugins-ecommerce::fronts.ajax-search class="form--quick-search bb-form-quick-search w-100">
                <div class="search-inner-content">
                    <div class="text-search">
                        <div class="search-wrapper">
                            <x-plugins-ecommerce::fronts.ajax-search.input type="text"
                                class="search-field input-search-product" />
                            <button class="btn" type="submit" aria-label="Submit">
                                <span class="svg-icon">
                                    <svg>
                                        <use href="#svg-icon-search" xlink:href="#svg-icon-search"></use>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <a class="close-search-panel close-toggle--sidebar" href="#" aria-label="Search">
                            <span class="svg-icon">
                                <svg>
                                    <use href="#svg-icon-times" xlink:href="#svg-icon-times"></use>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </x-plugins-ecommerce::fronts.ajax-search>
        @endif
    </div>
</div>

@if (is_plugin_active('ecommerce'))
    {!! Theme::partial('ecommerce.quick-view-modal') !!}
    {!! Theme::partial('ecommerce.quick-shop-modal') !!}
@endif
{!! Theme::partial('toast') !!}

<div class="panel-overlay-layer"></div>
<div id="back2top">
    <span class="svg-icon">
        <svg>
            <use href="#svg-icon-arrow-up" xlink:href="#svg-icon-arrow-up"></use>
        </svg>
    </span>
</div>

<script data-pagespeed-no-defer data-pagespeed-no-transform>
    'use strict';

    window.trans = {
        "View All": "{{ __('View All') }}",
        "No reviews!": "{{ __('No reviews!') }}"
    };

    window.siteConfig = {
        "url": "{{ BaseHelper::getHomepageUrl() }}",
        "img_placeholder": "{{ theme_option('lazy_load_image_enabled', 'yes') == 'yes' ? image_placeholder() : null }}",
        "countdown_text": {
            "days": "{{ __('days') }}",
            "hours": "{{ __('hours') }}",
            "minutes": "{{ __('mins') }}",
            "seconds": "{{ __('secs') }}"
        }
    };

    @if (is_plugin_active('ecommerce') && EcommerceHelper::isCartEnabled())
        window.siteConfig.ajaxCart = "{{ route('public.ajax.cart') }}";
        window.siteConfig.cartUrl = "{{ route('public.cart') }}";
    @endif
</script>

{!! Theme::footer() !!}
<!-- Justified Gallery -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/justifiedGallery/dist/css/justifiedGallery.min.css">
<script src="https://cdn.jsdelivr.net/npm/justifiedGallery/dist/js/jquery.justifiedGallery.min.js"></script>
<!-- LightGallery -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.min.js"></script>
<script>
    const lgZoom = window.lgZoom;
    const lgThumbnail = window.lgThumbnail;
</script>
</body>

</html>

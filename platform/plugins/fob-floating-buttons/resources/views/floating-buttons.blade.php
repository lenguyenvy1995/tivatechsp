<div class="floating-buttons"
    data-position="{{ setting('fob-floating-buttons.position', 'bottom_right') }}"
    data-offset-x="{{ setting('fob-floating-buttons.offset_x', 20) }}"
    data-offset-y="{{ setting('fob-floating-buttons.offset_y', 100) }}"
>
    @php
        $rawShowFull = setting('fob-floating-buttons.show_full_info', 'no');
        $showFull = $rawShowFull === 'yes' || $rawShowFull === 1 || $rawShowFull === '1';

        $mobileStyle = setting('fob-floating-buttons.style_mobile_buttons', 'style1');

        $mobileViewMap = [
            'style1' => 'floating-button-item-mobile',
            'style2' => 'floating-button-item',
            'style3' => 'floating-button-item-show-info',
        ];

        $mobileView = $mobileViewMap[$mobileStyle] ?? 'floating-button-item';
    @endphp

   {{-- DESKTOP --}}
<ul class="sb-bar {{ $mobileStyle === 'style1' ? 'd-none d-sm-block' : '' }}">
    @foreach ($floatingButtons as $floatingButton)
        @includeFirst(
            $showFull
                ? [
                    'theme::plugins/fob-floating-buttons/floating-button-item-show-info',
                    'plugins/fob-floating-buttons::floating-button-item-show-info',
                ]
                : [
                    'theme::plugins/fob-floating-buttons/floating-button-item',
                    'plugins/fob-floating-buttons::floating-button-item',
                ],
            ['floatingButton' => $floatingButton]
        )
    @endforeach
</ul>

    {{-- MOBILE --}}
    @if ($mobileStyle === 'style1')
        <div class="module-on-mobile-style1 d-block d-md-none">
            <ul class="list-button-mobile-style1 list-button-mobile">
                @foreach ($floatingButtons as $floatingButton)
                    @includeFirst(
                        [
                            "theme::plugins/fob-floating-buttons/{$mobileView}",
                            "plugins/fob-floating-buttons::{$mobileView}",
                        ],
                        ['floatingButton' => $floatingButton]
                    )
                @endforeach
            </ul>
        </div>
    @elseif(in_array($mobileStyle, ['style2', 'style3']))
        <ul class="sb-bar d-block d-md-none">
            @foreach ($floatingButtons as $floatingButton)
                @includeFirst(
                    [
                        "theme::plugins/fob-floating-buttons/{$mobileView}",
                        "plugins/fob-floating-buttons::{$mobileView}",
                    ],
                    ['floatingButton' => $floatingButton]
                )
            @endforeach
        </ul>
    @endif
</div>
@php
    $style = $shortcode->style ?? 'style1';

    $allowedStyles = ['style1', 'style2', 'style3']; // thêm nếu có nhiều style
    if (!in_array($style, $allowedStyles)) {
        $style = 'style1';
    }
    $count = (int) ($shortcode->number_tabs ?? 3);
    $tabs = [];

    for ($i = 1; $i <= $count; $i++) {
        $tabs[] = [
            'title' => $shortcode->{'tab_' . $i . '_title'} ?? '',
            'description' => $shortcode->{'tab_' . $i . '_description'} ?? '',
            'url' => $shortcode->{'tab_' . $i . '_url'} ?? '',
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

{!! Theme::partial("shortcodes.subitem.styles.$style", compact('shortcode', 'variablesStyle', 'tabs')) !!}



@php
    $style = $shortcode->style ?? 'style1';

    $allowedStyles = ['style1', 'style2']; // thêm nếu có nhiều style
    if (!in_array($style, $allowedStyles)) {
        $style = 'style1';
    }

    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_img ? RvMedia::getImageUrl($shortcode->background_img) : null;

    // Ưu tiên bg-image nếu có, nếu không thì mới dùng bg-color
    $variablesStyle = [];

    if ($bgImage) {
        $variablesStyle['background-image'] = "url('$bgImage')";
    } elseif ($bgColor) {
        $variablesStyle['background-color'] = $bgColor;
    }
@endphp

{!! Theme::partial("shortcodes.introduce.styles.$style", compact('shortcode', 'variablesStyle')) !!}
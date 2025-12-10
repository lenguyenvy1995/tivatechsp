@php
    // Giá trị style được chọn
    $selected = $value ?? 'style1';

    // Tổng số style có
    $totalStyles = $total ?? 4;

    // Đường dẫn ảnh tuyệt đối (tương đối root domain)
    $basePath = rtrim($theme_path ?? '', '/');

    $styles = [];

    for ($i = 1; $i <= $totalStyles; $i++) {
        $key = "style{$i}"; // KEY là style1, style2,...

        $styles[$key] = [
            'label' => "Loại số {$i}",
            'image' => "{$basePath}/{$i}.jpg", // file ảnh 1.png, 2.png …
        ];
    }
@endphp

<style>
    .form-style-selector {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .form-style-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        border: 2px solid #ddd;
        border-radius: 6px;
        overflow: hidden;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-style-option.selected {
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
    }

    .form-style-option img {
        width: 100%;
        max-width: 480px;
        display: block;
    }

    .form-style-option-label {
        margin: 10px 0;
        font-weight: 500;
    }
</style>

<div class="form-group mb-3">
    <label>{{ $label ?? 'Style' }}</label>
    <div class="form-style-selector">
        @foreach ($styles as $key => $style)
            @php $isActive = $selected === $key; @endphp
            
            <label class="form-style-option {{ $isActive ? 'selected' : '' }}">
                
                <input
                    type="radio"
                    name="{{ $name ?? 'style' }}"
                    value="{{ $key }}"
                    {{ $isActive ? 'checked' : '' }}
                    onchange="
                        this.closest('.form-style-selector')
                            .querySelectorAll('.form-style-option')
                            .forEach(el => el.classList.remove('selected'));
                        this.closest('.form-style-option').classList.add('selected');
                    "
                >

                <img src="{{ $style['image'] }}" alt="{{ $style['label'] }}">
                <div class="form-style-option-label">{{ $style['label'] }}</div>

            </label>

        @endforeach
    </div>
</div>
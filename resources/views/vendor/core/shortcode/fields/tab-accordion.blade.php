@php
    $prefix = $name_prefix ?? 'tab';
    $number = (int)($number ?? 3);
    $fields = $fields ?? ['title', 'description'];
@endphp
<style>
    .accordion-group {
        border: 1px solid #d1d5db;
        border-radius: 6px;
        margin-bottom: 12px;
        background: #f3f4f6;
        overflow: hidden;
        transition: box-shadow 0.3s;
    }

    .accordion-header {
        padding: 12px 16px;
    font-weight: 600;
    cursor: pointer;
    background: #ffffff;
    border-radius: 6px;
    display: flex;
    color: #5f5f5f;
    align-items: center;
    justify-content: space-between;
    transition: background-color 0.3s;
    }

    .accordion-header:hover {
        background-color: #f5f5f5;
    }

    .accordion-icon {
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .accordion-group.open .accordion-icon {
        transform: rotate(90deg);
    }

    .accordion-body {
        max-height: 0;
        overflow: hidden;
        padding: 0 16px;
        background: #f6f8fb;
        transition: all 0.3s ease;
        border-top: 1px solid #d1d5db;
    }

    .accordion-group.open .accordion-body {
        padding: 16px;
        max-height: 2000px; /* đủ lớn để hiển thị mượt */
    }
</style>



<script>
    document.addEventListener('click', function(e) {
        const header = e.target.closest('.accordion-header');
        if (!header) return;
        const group = header.closest('.accordion-group');
        group.classList.toggle('open');
    });
</script>

@for ($i = 1; $i <= $number; $i++)
    @php
        $group = "{$prefix}_{$i}";
    @endphp
    <div class="accordion-group">
        <div class="accordion-header">
            Tab #{{ $i }}
            <span class="accordion-icon">▶</span>
        </div>
        <div class="accordion-body">
            @foreach ($fields as $field)
                @php
                    $inputName = "{$group}_{$field}";
                    $inputValue = old($inputName, $attributes[$inputName] ?? '');
                @endphp

                @if ($field === 'description')
                    <div class="form-group mb-3">
                        <label for="{{ $inputName }}">Mô tả</label>
                        <textarea class="form-control" name="{{ $inputName }}" rows="4">{{ $inputValue }}</textarea>
                    </div>
                @elseif ($field === 'img')
                    <div class="form-group mb-3">
                        <label>Hình ảnh</label>
                        {!! Form::mediaImage($inputName, $inputValue) !!}
                    </div>
                @else
                    <div class="form-group mb-3">
                        <label for="{{ $inputName }}">{{ ucfirst($field) }}</label>
                        <input type="text" class="form-control" name="{{ $inputName }}" value="{{ $inputValue }}">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endfor
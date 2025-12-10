@php
    $childCategories = $category->children ?? collect();
    if ($childCategories->isEmpty()) {
        $childCategories = \Botble\Ecommerce\Models\ProductCategory::query()
            ->where('status', 'published')
            ->where('parent_id', $category->id ?? null)
            ->orderBy('order')
            ->get();
    }
@endphp
@if ($childCategories->isNotEmpty())
    <div class="container categories-children py-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center text-uppercase">{{ __('Danh Mục Sản Phẩm') }}</h3>
            </div>
        </div>
        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2">
            @foreach ($childCategories as $child)
                <div class="col category_innner">
                    <a class="category_innner_link" href="{{ $child->url }}">
                        @if ($child->icon_image)
                            <img class="img-fluid" src="{{ RvMedia::getImageUrl($child->icon_image) }}"
                                 alt="{{ $child->name }}" width="18" height="18">
                        @elseif ($child->icon)
                            <i class="{{ $child->icon }}"></i>
                        @endif
                        <h5 class="category_tittle">
                            {{ $child->name }}
                        </h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif
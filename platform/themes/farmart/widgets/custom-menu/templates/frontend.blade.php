@php
    $menu = Menu::generateMenu([
        'slug' => $config['menu_id'],
        'options' => ['class' => 'ps-0'],
        'view' => 'menu-default',
    ]);
@endphp

@if($menu)
    <div class="col-xl-3">
        <div class="col">
            <div class="widget widget-custom-menu">
                <h2 class="h5 fw-bold widget-title mb-4">{{ $config['name'] }}</h2>
                {!! $menu !!}
            </div>
        </div>
    </div>
@endif

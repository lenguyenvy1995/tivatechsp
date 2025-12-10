
<div class="col-xl-3">
    <div class="col ">
        <div class="widget widget-map-by-tivatech">
            @if ($config['title'])
            <h2 class="h5 fw-bold widget-title mb-4">{{ $config['title'] }}</h2>
            @endif
            <div class="widget-content">
                {!! BaseHelper::clean($config['content']) !!}
            </div>
        </div>
    </div>
</div>
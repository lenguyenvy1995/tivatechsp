<div class="form-group">
    <label for="widget-title">{{ __('Title') }}</label>
    <input type="text" class="form-control" name="title" value="{{ $config['title'] }}">
</div>

<div class="form-group">
    <label for="widget-content">{{ __('Content') }}</label>
    <textarea class="form-control" rows="4" name="content">{{ $config['content'] }}</textarea>
</div>
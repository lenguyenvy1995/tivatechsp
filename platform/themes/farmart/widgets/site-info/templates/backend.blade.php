<div class="mb-3">
    <label>{{ trans('core/base::forms.name') }}</label>
    <input
        class="form-control"
        name="name"
        type="text"
        value="{{ $config['name'] }}"
    >
</div>
<div class="mb-3">
    <div class="form-group mb-3">
        <label>Logo Website (4x1)</label>
        {!! Form::mediaImage('icon', $config['icon'] ?? '') !!}
    </div>
</div>
<div class="mb-3">
    <label>{{ trans('core/base::forms.description') }}</label>
    <textarea
        class="form-control"
        name="about"
        rows="3"
    >{{ $config['about'] }}</textarea>
</div>

<div class="mb-3">
    <label>{{ __('Address') }}</label>
    <input
        class="form-control"
        name="address"
        type="text"
        value="{{ $config['address'] }}"
    >
</div>

<div class="mb-3">
    <label>{{ __('Address2') }}</label>
    <input
        class="form-control"
        name="address2"
        type="text"
        value="{{ $config['address2'] }}"
    >
</div>
<div class="mb-3">
    <label>{{ __('Phone') }}</label>
    <input
        class="form-control"
        name="phone"
        type="text"
        value="{{ $config['phone'] }}"
    >
</div>
<div class="mb-3">
    <label>{{ __('Phone2') }}</label>
    <input
        class="form-control"
        name="phone2"
        type="text"
        value="{{ $config['phone2'] }}"
    >
</div>
<div class="mb-3">
    <label>{{ __('Phone3') }}</label>
    <input
        class="form-control"
        name="phone3"
        type="text"
        value="{{ $config['phone3'] }}"
    >
</div>
<div class="mb-3">
    <label>{{ __('Email') }}</label>
    <input
        class="form-control"
        name="email"
        type="email"
        value="{{ $config['email'] }}"
    >
</div>

<div class="mb-3">
    <label>{{ __('Working time') }}</label>
    <input
        class="form-control"
        name="working_time"
        type="text"
        value="{{ $config['working_time'] }}"
    >
</div>

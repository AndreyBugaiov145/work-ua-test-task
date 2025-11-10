<form action="{{ route('urls.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="origen_url" class="form-label">{{ __('urls.label_url') }}</label>
        <input type="text" class="form-control" id="origen_url" name="origen_url"
               placeholder="{{ __('urls.placeholder_url') }}" required value="{{ old('origen_url') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">{{ __('urls.label_lifetime') }}</label>
        <div class="row g-2">
            <div class="col-md-3">
                <input type="number" class="form-control" name="hours"
                       placeholder="{{ __('urls.placeholder_hours') }}" min="0"
                       required value="{{ old('hours', 0) }}">
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" name="minutes"
                       placeholder="{{ __('urls.placeholder_minutes') }}" min="0" max="59"
                       required value="{{ old('minutes', 0) }}">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">{{ __('urls.button_create') }}</button>
</form>

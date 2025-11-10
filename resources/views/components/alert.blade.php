@props(['type' => 'info', 'message' => null, 'errors' => null])

@if ($message)
    <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('urls.close') }}"></button>
    </div>
@endif

@if ($errors && $errors->any())
    <div class="alert alert-danger">
        <strong>{{ __('urls.validation_failed') }}</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

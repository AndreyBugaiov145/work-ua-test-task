@props(['urls'])

<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>{{ __('urls.original_url') }}</th>
            <th>{{ __('urls.short_url') }}</th>
            <th>{{ __('urls.expires_at') }}</th>
            <th>{{ __('urls.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($urls as $url)
            <x-url-row :url="$url" :loop="$loop" />
        @endforeach
        </tbody>
    </table>
</div>

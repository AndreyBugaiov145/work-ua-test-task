@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">{{ __('urls.title_create') }}</h1>

    <x-alert type="success" :message="session('success')" />
    <x-alert type="danger" :errors="$errors" />

    <x-url-form />

    @if($urls->count())
        <hr class="my-5">
        <h2 class="mb-4">{{ __('urls.title_list') }}</h2>
        <x-url-table :urls="$urls" />
    @endif
@endsection

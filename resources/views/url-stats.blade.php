@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Історія переходів по: <code>{{ url('/' . $url->created_url) }}</code></h1>

    @if($histories->count())
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>#</th>
                <th>IP</th>
                <th>User-Agent</th>
                <th>Дата та час</th>
            </tr>
            </thead>
            <tbody>
            @foreach($histories as $history)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $history->ip }}</td>
                    <td>{{ Str::limit($history->user_agent, 60) }}</td>
                    <td>{{ $history->visited_at->format('d.m.Y H:i:s') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Ще не було переходів по цьому посиланню.</p>
    @endif

    <a href="{{ route('urls.index') }}" class="btn btn-secondary mt-4">← Назад до списку</a>
@endsection

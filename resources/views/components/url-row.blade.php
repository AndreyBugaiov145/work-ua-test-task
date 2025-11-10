@props(['url', 'loop'])

@php
    $isExpired = \Carbon\Carbon::parse($url->expired_at)->isPast();
@endphp

<tr class="{{ $isExpired ? 'table-secondary' : '' }}">
    <td>{{ $loop->iteration }}</td>

    <td class="{{ $isExpired ? 'text-decoration-line-through text-muted' : '' }}">
        {{ $url->origen_url }}
    </td>

    <td>
        <a href="{{ url('/' . $url->created_url) }}"
           class="{{ $isExpired ? 'text-decoration-line-through text-muted' : '' }}"
           target="_blank">
            {{ url('/' . $url->created_url) }}
        </a>
    </td>

    <td>{{ $url->expired_at_local->format('d.m.Y H:i') }}</td>

    <td>
        <a href="{{ route('url.stats', $url->id) }}" class="btn btn-sm btn-outline-secondary">
            {{ __('urls.button_stats') }}
        </a>

        <form action="{{ route('urls.destroy', $url->id) }}" method="POST" class="d-inline"
              onsubmit="return confirm('{{ __('urls.confirm_delete') }}')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
                {{ __('urls.button_delete') }}
            </button>
        </form>
    </td>
</tr>

@php
    $items = request()->input('items');
@endphp

<ul class="pagination justify-content-end">
    <li class="page-item {{ $pagination['current'] == 1 ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $pagination['current'] == 1 ? '#' : request()->url() . '?page=1&items=' . $items }}">Primeira</a>
    </li>
    <li class="page-item {{ $pagination['current'] == 1 ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $pagination['current'] == 1 ? '#' : request()->url() . '?page=' . ($pagination['current'] - 1). '&items=' . $items }}">Anterior</a>
    </li>

    @php
        $start = $pagination['current'] - 2;
        $end   = $pagination['current'] + 2;

        if ($start < 1) {
            $start = 1;
        }

        if ($end > $pagination['total']) {
            $end = $pagination['total'];
        }
    @endphp

    @for ($i = $start; $i <= $end; ++$i)
        @if ($i == $pagination['current'])
            <li class="page-item active">
                <span class="page-link">{{ $i }}</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ request()->url() . '?page=' . $i . '&items=' . $items }}">{{ $i }}</a>
            </li>
        @endif
    @endfor

    <li class="page-item {{ $pagination['current'] == $pagination['total'] ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $pagination['current'] == $pagination['total'] ? '#' : request()->url() . '?page=' . ($pagination['current'] + 1) . '&items=' . $items }}">Próxima</a>
    </li>
    <li class="page-item {{ $pagination['current'] == $pagination['total'] ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $pagination['current'] == $pagination['total'] ? '#' : request()->url() . '?page=' . $pagination['total'] . '&items=' . $items }}">Última</a>
    </li>
</ul>

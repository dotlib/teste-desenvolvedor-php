@props([
    'status'
])

<div class="rounded-full inline-block px-2 py-0.5 text-sm font-medium tracking-tight
        {{ $status->value === 0 ? 'bg-gray-100 text-gray-700' : '' }}
        {{ $status->value === 1 ? 'bg-orange-100 text-orange-700' : '' }}
        {{ $status->value === 2 ? 'bg-yellow-100 text-yellow-700' : '' }}
        {{ $status->value === 3 ? 'bg-green-100 text-green-700' : '' }}
    ">
    {{ strtolower($status->description) }}
</div>
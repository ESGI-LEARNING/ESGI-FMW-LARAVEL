@props(['href', 'active'])

@php
    $classes = ($active ?? false)
                ? 'sidebar-link sidebar-active'
                : 'sidebar-link';
@endphp

<li>
    <a href="{{ $href }}" class="{{ $classes}}">
        {{ $slot }}
    </a>
</li>

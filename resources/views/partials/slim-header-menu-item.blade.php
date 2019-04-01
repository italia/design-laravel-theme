<li>
    <a href="{{ $item['href'] }}"
            {{ $item['target'] ?? false ? 'target="' . $item['target'] . '"' : '' }}
    >{{ $item['text'] }}
    </a>
</li>
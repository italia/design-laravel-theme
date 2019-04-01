<li><a class="list-item"
       href="{{ $item['url'] }}"
       title="Vai alla pagina: {{ $item['text'] }}"
       @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
    >{{ $item['text'] }}</a></li>
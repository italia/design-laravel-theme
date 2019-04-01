<li class="list-inline-item"><a class="p-2 text-white" href="{{ $item['url'] }}" target="_blank">
        <svg class="icon icon-sm icon-white align-top">
            <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#') }}it-{{ $item['icon'] }}"></use>
        </svg>
        <span class="sr-only">{{ $item['text'] }}</span></a></li>
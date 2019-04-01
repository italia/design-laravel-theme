<li>
    <a href="{{ $item['url'] }}" aria-label="{{ $item['text'] }}" target="_blank">
        <svg class="icon">
            <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#') }}it-{{ $item['icon'] }}"></use>
        </svg>
    </a>
</li>
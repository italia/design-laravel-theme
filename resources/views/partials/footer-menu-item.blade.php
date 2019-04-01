<div class="col-lg-3 col-md-3 col-sm-6 ">
    <h4>
        <a href="{{ $item[0]['url'] }}"
           title="{{ trans('bootstrap-italia::bootstrap-italia.go_to') }}: {{ $item[0]['text'] }}"
           @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
        >{{ $item[0]['text'] }}</a>
    </h4>
    <div class="link-list-wrapper">
        <ul class="footer-list link-list clearfix">
            @foreach ($item as $j => $subitem)
                @if (($j !== 0) && (isset($subitem['text'])))

                    <li><a class="list-item"
                           href="{{ $subitem['url'] }}"
                           title="{{ trans('bootstrap-italia::bootstrap-italia.go_to') }}: {{ $subitem['text'] }}"
                           @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
                        >{{ $subitem['text'] }}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
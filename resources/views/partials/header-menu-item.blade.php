@if (isset($item['dropdown']))
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
            <span>{{ $item['text'] }}</span>
            <svg class="icon icon-xs">
                <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#it-expand') }}"></use>
            </svg>
        </a>
        <div class="dropdown-menu">
            <div class="link-list-wrapper">
                <ul class="link-list">
                    @foreach ($item['dropdown'] as $subitem)
                        @if (is_array($subitem))
                            <li><a class="list-item"
                                   href="{{ $subitem['href'] }}"
                                   @if (isset($subitem['target'])) target="{{ $subitem['target'] }}" @endif
                                ><span>{{ $subitem['text'] }}</span></a></li>
                        @elseif ($subitem === '-')
                            <li><span class="divider"></span></li>
                        @else
                            <li>
                                <h3 class="no_toc" id="heading">{{ $subitem }}</h3>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </li>
@elseif (isset($item['megamenu']))
    <li class="nav-item dropdown megamenu">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
            <span>{{ $item['text'] }}</span>
            <svg class="icon icon-xs">
                <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#it-expand') }}"></use>
            </svg>
        </a>
        <div class="dropdown-menu">
            <div class="row">
                @foreach($item['megamenu'] as $submenu)
                    <div class="col-12 col-lg-4">
                    <div class="link-list-wrapper">
                        <ul class="link-list">
                            @foreach ($submenu as $subitem)
                                @if (is_array($subitem))
                                    <li>
                                        <a class="list-item"
                                           href="{{ $subitem['href'] }}"
                                           @if (isset($subitem['target'])) target="{{ $subitem['target'] }}" @endif
                                        ><span>{{ $subitem['text'] }}</span></a>
                                    </li>
                                @elseif ($subitem === '-')
                                    <li><span class="divider"></span></li>
                                @else
                                    <li>
                                        <h3 class="no_toc" id="heading">{{ $subitem }}</h3>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link {{ $item['active'] ? 'active' : '' }}"
                            href="{{ $item['url'] }}"
                            @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
        ><span>{{ $item['text'] }}</span>
        </a>
    </li>
@endif
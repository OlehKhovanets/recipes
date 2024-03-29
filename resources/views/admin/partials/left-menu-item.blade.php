{{--{{dump($type)}}--}}
<li class="nav-item">
    <a class="nav-link @if( $isActive === true )active @endif" href="{{ $route }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">{{ $name }}</span>
    </a>
</li>

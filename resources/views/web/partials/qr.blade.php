<div class="qr-code {{ $class }}">
    @if(\Illuminate\Support\Facades\Auth::check())
        @if(Request::has('branch') || Request::has('search'))
            {!! QrCode::size(150)->margin(2)->color(162, 207, 252)->generate(\Illuminate\Support\Facades\Request::fullUrl() . '&qr_code=' . \Illuminate\Support\Facades\Auth::user()->qr_token) !!}
        @else
            {!! QrCode::size(150)->margin(2)->color(162, 207, 252)->generate(\Illuminate\Support\Facades\Request::fullUrl() . '?qr_code=' . \Illuminate\Support\Facades\Auth::user()->qr_token) !!}
        @endif
    @else
        {!! QrCode::size(150)->margin(2)->color(162, 207, 252)->generate(\Illuminate\Support\Facades\Request::fullUrl()) !!}
    @endif
    <h6 class="qr-code__text">{{ __('messages.qr') }}</h6>
</div>

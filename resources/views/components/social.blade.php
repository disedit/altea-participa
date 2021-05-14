@if(config('participa.facebook'))
    @php
        $fbText = explode('/', config('participa.facebook'));
        $fbText = (substr($fbText[3], -1) == '/') ? substr($fbText[3], 0, -1) : $fbText[3];
    @endphp
    <li class="nav-item">
        <a href="{{ config('participa.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook">
            <i class="fab fa-facebook" aria-hidden="true"></i>
            <span class="d-xs-inline d-lg-none">/{{ $fbText }}</span>
        </a>
    </li>
@endif

@if(config('participa.twitter'))
    <li class="nav-item">
        <a href="https://instagram.com/alteaparticipa" target="_blank" rel="noopener" aria-label="Instagram">
            <i class="fab fa-instagram" aria-hidden="true"></i>
        </a>
    </li>
@endif

@if(config('participa.council_url'))
    @php
        $simpleUrl = config('participa.council_url');
        $simpleUrl = preg_replace('/(https?\:\/\/)(www\.)?/', '', $simpleUrl);
    @endphp
    <li class="nav-item">
        <a href="{{ config('participa.council_url') }}" target="_blank" rel="noopener">
            <i class="far fa-home" aria-hidden="true"></i> {{ $simpleUrl }}
        </a>
    </li>
@endif

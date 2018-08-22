@php
    $languages = config('participa.languages');
    $current_language = config('app.locale', 'ca');
@endphp

<div class="dropdown">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $languages[$current_language] }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <div class="dropdown-divider"></div>
        @foreach($languages as $code => $language)
            @unless($current_language == $code)
                <a class="dropdown-item" href="{{ secure_url('lang/' . $code) }}" lang="{{ $code }}">{{ $language }}</a>
            @endunless
        @endforeach
  </div>
</div>

@php
    $logoUrl = (config('participa.navbar') == 'colorful')
                    ? config('participa.logo_dark')
                    : config('participa.logo');

    $prelink = url('/about');
@endphp

<nav class="navbar fixed-top navbar-expand-lg
  {{ (config('participa.navbar') == 'colorful') ? 'navbar-dark' : 'navbar-light' }}
  {{ (!Request::segment(1)) ? 'navbar-full' : 'navbar-compact' }}
  {{ ($inPerson) ? 'navbar-scrolled' : '' }}">
  <a class="navbar-brand" href="/">
      <h1>
          @if($logoUrl)
              <img src="{{ secure_asset('images/' . $logoUrl) }}" alt="{{ config('app.name', 'Participa') }}" width="150" />
          @else
              {{ config('app.name', 'Participa') }}
          @endif
    </h1>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav navbar-main-links" role="presentation">
        <li class="nav-item">
          <a href="{{ $prelink }}#calendar" data-scroll>@lang('participa.nav.calendar')</a>
        </li>
        <li class="nav-item">
          <a href="{{ $prelink }}#proposals" data-scroll>@lang('participa.nav.proposals')</a>
        </li>
        <li class="nav-item">
          <a href="{{ $prelink }}#info" data-scroll>@lang('participa.nav.info')</a>
        </li>
        <li class="nav-item">
          <a href="{{ $prelink }}#archive" data-scroll>@lang('participa.nav.archive')</a>
        </li>
    </ul>

    <ul class="navbar-nav navbar-social ml-auto d-lg-none d-xl-flex" role="presenation">
        @include('components/social')
    </ul>

    <nav id="languages" aria-label="@lang('participa.select_language')" class="navbar-nav navbar-languages languages ml-lg-auto ml-xl-0">
        @include('components/languages')
    </nav>
  </div>
</nav>

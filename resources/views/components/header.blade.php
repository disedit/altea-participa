@php
    $logoUrl = (config('participa.navbar') == 'colorful')
                    ? config('participa.logo_dark')
                    : config('participa.logo');
@endphp

<nav class="navbar fixed-top navbar-expand-xl
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
          <a href="/participa">@lang('participa.nav.budget')</a>
          <ul class="nav-submenu">
            <li><a href="/participa">2021</a></li>
            <li><a href="/archive/3">2020</a></li>
            <li><a href="/archive/2">2019</a></li>
            <li><a href="/archive/1">2018</a></li>
            <li><a href="/archive/2017">2017</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="/associacions">@lang('participa.nav.associations')</a>
        </li>
        <li class="nav-item">
          <a href="/altea-decideix">@lang('participa.nav.decideix')</a>
        </li>
        <li class="nav-item">
          <a href="/activitats">@lang('participa.nav.activities')</a>
        </li>
        <li class="nav-item">
          <a href="/documents">@lang('participa.nav.docs')</a>
        </li>
        <li class="nav-item">
          <a href="/memoria-historica">@lang('participa.nav.memory')</a>
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

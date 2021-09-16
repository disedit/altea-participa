@extends('layouts.public')

@section('title', __('sections.associations') . ' - ')
{{-- @section('thumbnail', '') --}}

@section('page-header')
    <h2><span>@lang('sections.associations')</span></h2>
@endsection

@section('page-header-aside')
    <div class="ml-lg-auto d-flex align-items-center">
        <a href="/docs/Constituir-Assoc.zip" download class="btn btn-outline-light btn-outline-light--backdrop">
            <i class="far fa-fw fa-cloud-download"></i>
            @lang('sections.associations_create')
        </a>
    </div>
@endsection

@section('content')
    <div id="app"></div>
@endsection

@push('scripts')
    @php
        $globalConfig = [
            'locale' => config('app.locale'),
            'app_name' => config('app.name'),
            'name' => config('participa.municipality', 'Any City'),
            'contact_email' => config('participa.contact_email', 'participa@disedit.com'),
            'url' => config('app.url', ''),
            'cms_url' => 'https://cms.alteaparticipa.es/'
        ];
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script>
        window.GlobalConfig = {!! json_encode($globalConfig) !!};
    </script>
    <script src="{{ mix('js/associations.js') }}"></script>
@endpush

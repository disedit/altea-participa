@php
    $inPerson = (isset($inPerson)) ? $inPerson : false;
@endphp

@extends('layouts.public')

@section('page-header')
    <h2><span>Consulta</span></h2>
@endsection

@section('thumbnail', '/docs/platja/thumbnail-platja.png')

@section('content')
<div class="{{ $inPerson ? 'booth-mode' : '' }}">
    <div aria-hidden="true" class="d-sm-none footer-languages languages">
        @include('components/languages')
    </div>
    <div id="booth"></div>
</div>
@endsection

@push('scripts')
    @php
        $boothConfig = [
            'locale' => config('app.locale'),
            'app_name' => config('app.name'),
            'name' => config('participa.municipality', 'Any City'),
            'contact_email' => config('participa.contact_email', 'participa@disedit.com'),
            'url' => config('app.url', ''),
            'council_url' => config('participa.council_url', ''),
            'twitter' => config('participa.twitter', 'infoDisedit'),
            'anonymous_voting' => config('participa.anonymous_voting', true),
            'min_age' => config('participa.min_age', 16),
            'id_required' => $edition->id_required,
            'sms_max_attempts' => config('participa.sms_max_attempts', 3),
            'max_per_ip' => config('participa.max_per_ip', 3),
            'disable_SMS_verification' => config('participa.disable_SMS_verification', false),
            'loading_template' => $loadingTemplate
        ];
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script>
        window.BoothMode = {{ var_export($inPerson, true) }};
        window.BoothConfig = {!! json_encode($boothConfig) !!};
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
@endpush

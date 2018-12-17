@extends('layouts.public')

@section('content')
<div class="row flex-column flex-sm-row">
    <div class="col-md-8">
        <div class="placeholder results-pending">
            <i class="far fa-comment-alt" aria-hidden="true"></i>
            <h2>@lang('participa.voting_closed')</h2>
            <p>@lang('participa.awaiting_results', ['publish_date' => human_date($edition->publish_results), 'publish_time' => date('H:i', strtotime($edition->publish_results))])</h2>
        </div>
    </div>
    <div class="col-md-4">
        @include('components/sidebar')
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
@endpush

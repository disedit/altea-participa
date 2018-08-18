@extends('layouts.public')

@section('content')
<div class="row">
    <div class="col-lg-8">
        @php
            $about = $edition->about;
            $about = str_replace("[template]", $page['template'], $about);
            $about = str_replace("[options]", $page['options'], $about);
        @endphp
        {!! $about !!}
    </div>
    <div class="col-lg-4">
        @include('components/sidebar')
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#optionModal').on('show.bs.modal', function (e) {
                var option_id = e.relatedTarget.dataset.optionId,
                    option_title = e.relatedTarget.dataset.optionTitle;

                $(".modal-title", this).text(option_title);
                $(".modal-body", this).load('/api/option/' + option_id);
            });
        });
    </script>
@endpush

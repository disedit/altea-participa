@extends('layouts.public')

@section('header')
  @include('components/header', ['inPerson' => false])
  <div id="homepage"></div>
@endsection

@push('scripts')
    @php
      $startTime  = strtotime($edition->start_date);
      $endTime    = strtotime($edition->end_date);
      $startDay   = date('j', $startTime);
      $endDay     = date('j', $endTime);
      $startMonth = date('n', $startTime) - 1;
      $endMonth   = date('n', $endTime) - 1;

      $globalConfig = [
        'locale' => config('app.locale'),
        'projects' => $projects,
        'participa' => [
          'flair' => false,
          'title' => $edition->name,
          'description' => $edition->description,
          'state' => $edition->phase(),
          // TODO
          // 'phase' => $edition->phase(),
          // 'button' => 'Resultats',
          // 'date' => [
          //  'start_day' => $startDay,
          //  'end_day' => $endDay,
          //  'start_month' => $startMonth,
          //  'end_month' => $endMonth
          // Meanwhile...
          'phase' => 'Votació',
          'button' => 'Vota',
          'date' => [
            'start_day' => '21',
            'end_day' => '24',
            'start_month' => 'novembre',
            'end_month' => 'nov'
          ]
        ]
      ];
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script>
      window.GlobalConfig = {!! json_encode($globalConfig) !!};
    </script>
    <script src="{{ mix('js/homepage.js') }}"></script>
    @endpush

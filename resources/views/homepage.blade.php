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
        'participa' => [
          'title' => $edition->name,
          'description' => $edition->description,
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
          'button' => 'Resultats',
          'date' => [
            'start_day' => '1',
            'end_day' => '14',
            'start_month' => 'febrer',
            'end_month' => 'febrer'
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

@extends('layouts.public')

@section('content')
<div class="row results-page">
    <div class="col-md-8">
        @if($edition->winner)
            @php
                $winner = $edition->winner;
                $winner = str_replace("[template]", $page, $winner);
            @endphp
            <h2><i class="far fa-check-circle" aria-hidden="true"></i> @lang('participa.winner')</h2>
            <div class="mb-4">
                {!! $winner !!}
            </div>
        @endif
        
        <h2><i class="far fa-chart-bar" aria-hidden="true"></i> @lang('participa.results')</h2>

        <table class="census table table-bordered">
            @if (config('participa.display_census_number'))
                <colgroup>
                    <col width="25%" />
                    <col width="25%" />
                    <col width="25%" />
                    <col width="25%" />
                </colgroup>
            @else
                <colgroup>
                    <col width="50%" />
                    <col width="50%" />
                </colgroup>
            @endif
            <tbody>
                <tr>
                    @if (config('participa.display_census_number'))
                        <th class="text-right">@lang('participa.census')</th>
                        <td>{{ number($census, 0) }}</td>
                    @endif
                    <th class="text-right">@lang('participa.turnout')</th>
                    <td>
                        {{ number($turnout, 0) }}
                        @if (config('participa.display_census_number'))
                            <span class="results__points">{{ number(($turnout * 100 / $census), 2) . '%' }}</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        @foreach ($results as $block)
            <div class="results">
                <h3>{{ $block['question'] }}</h3>

                <ol class="results-list">
                @foreach ($block['options'] as $option)
                @php
                    $pictures = explode("\n", $option['pictures']);
                    $picture = (isset($pictures[0])) ? $pictures[0] : false;
                @endphp
                    <li>
                        <a class="project" href="#" data-toggle="modal" data-target="#optionModal" data-option-id="{{ $option['id'] }}" data-option-title="{{ $option['option'] }}">
                            <div class="project-thumb">
                                @if($picture)
                                    <img src="{{ $picture }}" alt="" />
                                @endif
                            </div>
                            <h4 class="project-title">
                                {{ $option['option'] }}
                            </h4>
                            <div class="project-description">
                                {{ $option['description'] }}
                            </div>

                            <div class="project-result">
                                <div class="progress">
                                    <div class="d-flex" style="width: {{ $option['percentage'] . '%' }}" aria-valuenow="{{ $option['percentage'] }}" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                                {{ number($option['points'], 2) }}
                            </div>

                            <div class="project-status">
                              <ul>
                                @if($option['cost'])
                                <li>
                                  <span class="project-status-label">@lang('participa.project_cost')</span>
                                  <span class="project-status-divider"></span>
                                  <span class="project-status-value cost">{{ number_format($option['cost'], 0, ',', '.') }}€</span>
                                </li>
                                @endif
                                @if($option['funding'])
                                <li>
                                  <span class="project-status-label">@lang('participa.project_funding')</span>
                                  <span class="project-status-divider"></span>
                                  <span class="project-status-value">{{ $option['funding'] }}</span>
                                </li>
                                @endif
                                @if($option['status'])
                                <li>
                                  <span class="project-status-label">@lang('participa.project_status')</span>
                                  <span class="project-status-divider"></span>
                                  <span class="project-status-value">
                                    {{ $option['status'] }}
                                  </span>
                                </li>
                                @endif
                              </ul>
                          </div>
                        </a>
                    </li>
                @endforeach
                </ol>
            </div>
        @endforeach
    </div>
    <div class="col-md-4">
        @include('components/sidebar')
    </div>
</div>

<!-- Modal -->
<div class="modal option-modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="optionModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('participa.close')</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#optionModal').on('show.bs.modal', function (e) {
                var option_id = e.relatedTarget.dataset.optionId,
                    option_title = e.relatedTarget.dataset.optionTitle;

                $(".modal-title", this).text(option_title);
                $(".modal-body").load('/api/option/' + option_id);
            });
        });
    </script>
@endpush

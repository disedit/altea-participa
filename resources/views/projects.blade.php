@extends('layouts.public')

@section('title', __('sections.projects') . ' - ')

@section('page-header')
    <h2><span>@lang('sections.projects')</span></h2>
    <p class="vote-info__intro d-block"><span>@lang('sections.projects_description')</span></p>
@endsection

@section('page-header-aside')
&nbsp;
@endsection

@section('content')
<div class="row results-page project-statuses">
    <div class="col-md-10">
        <div class="results">
            @foreach($editions as $edition)
                <h2 class="year">
                    <a href="/archive/{{ $edition->id }}">
                        {{ date('Y', strtotime($edition->end_date)) }}
                        <span class="full-results">@lang('sections.projects_full_results') <i class="far fa-arrow-right"></i></span>
                    </a>
                </h2>
                @foreach($edition->questions as $question)
                <ol class="results-list">
                    @foreach ($question->options as $project)
                    @php
                        if (!$project->status) continue;
                        $pictures = explode("\n", $project->pictures);
                        $picture = (isset($pictures[0])) ? $pictures[0] : false;
                    @endphp
                        <li>
                            <a class="project" href="#" data-toggle="modal" data-target="#optionModal" data-option-id="{{ $project->id }}" data-option-title="{{ $project->option }}">
                                <div class="project-thumb">
                                    @if($picture)
                                        <img src="{{ $picture }}" alt="" />
                                    @endif
                                </div>
                                <h4 class="project-title">
                                    {{ $project->option }}
                                </h4>
                                <div class="project-description">
                                    {{ $project->description }}
                                </div>

                                <div class="project-status">
                                    <ul>
                                    @if($project->cost)
                                    <li>
                                        <span class="project-status-label">@lang('participa.project_cost')</span>
                                        <span class="project-status-divider"></span>
                                        <span class="project-status-value cost">{{ number_format($project->cost, 0, ',', '.') }}€</span>
                                    </li>
                                    @endif
                                    @if($project->funding)
                                    <li>
                                        <span class="project-status-label">@lang('participa.project_funding')</span>
                                        <span class="project-status-divider"></span>
                                        <span class="project-status-value">{{ $project->funding }}</span>
                                    </li>
                                    @endif
                                    @if($project->status)
                                    <li>
                                        <span class="project-status-label">@lang('participa.project_status')</span>
                                        <span class="project-status-divider"></span>
                                        <span class="project-status-value is-status color-{{ $project->color }}">
                                        {{ $project->status }}
                                        </span>
                                    </li>
                                    @endif
                                    </ul>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ol>
                @endforeach
            @endforeach
        </div>
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

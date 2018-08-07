@php
  $compact = (!Request::segment(1)) ? false : true;
@endphp
<header class="vote-info {{ (!$compact) ? 'vote-info--full' : 'vote-info--compact' }}" role="banner">
    @if(!$inPerson)
        <div class="left-hands"></div>
        <div class="right-hands"></div>
        <div class="container">
            <div class="row">
                <div class="{{ ($compact) ? 'col-lg-8' : 'col-lg-6' }} vote-info__text">
                    <h2><span>@lang('participa.heading')</span></h2>
                    <p class="vote-info__intro"><span>@lang('participa.subheading')</span></p>

                    @if(isset($edition))
                        <p class="vote-info__action">
                            @if($edition->isOpen())
                                <a data-scroll href="#content" class="big-button"><i aria-hidden="true" class="fa fa-bullhorn"></i> @lang('participa.vote')</a>
                            @elseif($edition->inProposalPhase())
                                <a href="{{ secure_url('propose') }}" class="big-button"><i aria-hidden="true" class="fa fa-comment"></i> @lang('participa.propose_cta')</a>
                            @elseif($edition->isPending())
                                <a data-scroll href="#content" class="big-button"><i aria-hidden="true" class="fa fa-info-circle"></i> @lang('participa.more_info')</a>
                            @elseif($edition->resultsPublished())
                                <a data-scroll href="#content" class="big-button"><i aria-hidden="true" class="fa fa-chart-bar"></i> @lang('participa.results')</a>
                            @endif
                        </p>
                    @endif
                </div>

                @if(!$compact)
                    <div class="vote-info__video col-lg-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/@lang('participa.video_id')" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                @else
                    <div class="vote-info__calendar col-lg-4 d-none d-lg-block">
                        @include('components/calendar')
                    </div>
                @endif
            </div>
        </div>
    @endif
</header>

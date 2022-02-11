@foreach ($projects as $project)
    <div class="col-lg-6 col-xl-4 mb-4">
        <div class="project card">
            <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}">
                <div class="ratio ratio-16x9">
                    <img class="card-img-top" src="{{ pageImage($project->photo_file) }}"
                         alt="{{ $project->seo_title }}">
                </div>
            </a>
            <div class="card-body">
                <div class="card-infos">
                    <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}">
                        <h4 class="card-title mb-4 text-6 text-sm-7 text-lg-6 text-xl-6 text-xxl-7 font-weight-bold">
                            {{ __('messages.project_no') }} {{ $project->title }}</h4>
                    </a>
                    <div class="row features mb-3 gx-2 gx-sm-3 gx-xl-2 gx-xxl-3">
                        <div class="col-auto text-3"><img class="feature-icon me-1"
                                                          src="{{ asset('sites/img/project/map.svg') }}"
                                                          alt="map"/>
                            @switch($project->city)
                                @case(1)
                                {{  __('Istanbul') }}
                                @break
                                @case(2)
                                {{  __('Bodrum') }}
                                @break
                                @case(3)
                                {{  __('Antalya') }}
                                @break
                                @case(4)
                                {{  __('Sapanca') }}
                                @break
                                @case(5)
                                {{  __('Trapzon') }}
                                @break
                                @case(6)
                                {{  __('Kıbrıs') }}
                                @break
                                @case(7)
                                {{  __('Bursa') }}
                                @break
                                @case(8)
                                {{  __('Izmir') }}
                                @break
                            @endswitch
                        </div>
                        <div class="col-auto text-3"><img class="feature-icon me-1"
                                                          src="{{ asset('sites/img/project/hand.svg') }}"
                                                          alt="hand"/> {{ $project->payment_type === 1 ? 'Cash' : 'Installment' }}
                        </div>
                        <div class="col-auto text-3"><img class="feature-icon me-1"
                                                          src="{{ asset('sites/img/project/hourglass.svg') }}"
                                                          alt="hourglass"/>
                            @switch($project->status)
                                @case(1)
                                {{  __('Not available') }}
                                @break
                                @case(2)
                                {{  __('Preparing selling') }}
                                @break
                                @case(3)
                                {{  __('Selling') }}
                                @break
                                @case(4)
                                {{  __('Sold') }}
                                @break
                                @case(5)
                                {{  __('Building') }}
                                @break
                            @endswitch
                        </div>
                    </div>
                    <p class="card-text text-4 mb-5">{!! \Str::limit($project->details , 120, $end='...') !!}</p>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div
                        class="col-auto col-sm-6 price text-primary text-5 text-sm-6 font-weight-semibold">{{ currencyConvert($project->lowest_price) }}
                    </div>
                    <div class="col-auto col-sm-6 more-details">
                        <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug ) }}"
                           class="btn btn-primary btn-line w-100 text-3">{{ __('messages.more_details') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Page Content -->
        <div class="content content-full">
            <div class="row invisible" data-toggle="appear">
                <!-- Row #1 -->
{{--                <div class="col-6 col-xl-3">--}}
{{--                    <a class="block block-link-rotate text-right" href="{{ route('projects.index')}}">--}}
{{--                        <div class="block-content block-content-full clearfix">--}}
{{--                            <div class="float-left mt-10 d-none d-sm-block">--}}
{{--                                <i class="si si-bag fa-3x text-primary"></i>--}}
{{--                            </div>--}}
{{--                            <div class="font-size-h3 font-w600 text-primary-darker" data-toggle="countTo"--}}
{{--                                 data-speed="1000" data-to="{{ $projects }}">{{ $projects }}--}}
{{--                            </div>--}}
{{--                            <div--}}
{{--                                class="font-size-sm font-w600 text-uppercase text-primary-dark">{{ __('Projects') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-6 col-xl-3">--}}
{{--                    <a class="block block-link-rotate text-right" href="{{ route('projects.index') }}">--}}
{{--                        <div class="block-content block-content-full clearfix">--}}
{{--                            <div class="float-left mt-10 d-none d-sm-block">--}}
{{--                                <i class="si si-users fa-3x text-primary"></i>--}}
{{--                            </div>--}}
{{--                            <div class="font-size-h3 font-w600 text-primary-darker" data-toggle="countTo"--}}
{{--                                 data-speed="1000" data-to="{{ $properties }}">{{ $properties }}--}}
{{--                            </div>--}}
{{--                            <div--}}
{{--                                class="font-size-sm font-w600 text-uppercase text-primary-dark">{{ __('Properties') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-6 col-xl-3">--}}
{{--                    <a class="block block-link-rotate text-right" href="javascript:void(0)">--}}
{{--                        <div class="block-content block-content-full clearfix">--}}
{{--                            <div class="float-left mt-10 d-none d-sm-block">--}}
{{--                                <i class="si si-envelope-open fa-3x text-primary"></i>--}}
{{--                            </div>--}}
{{--                            <div class="font-size-h3 font-w600 text-primary-darker" data-toggle="countTo"--}}
{{--                                 data-speed="1000" data-to="{{ $messages }}">{{ $messages }}--}}
{{--                            </div>--}}
{{--                            <div--}}
{{--                                class="font-size-sm font-w600 text-uppercase text-primary-dark">{{ __('Messages') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

                <!-- END Row #1 -->
            </div>
        </div>
        <!-- END Page Content -->
    </div>
@endsection

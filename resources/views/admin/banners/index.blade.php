@extends('layouts.backend')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Banners list') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Banners list') }}</h3>
            </div>
            <div class="block-content">
                <a href="{{ route('banners.create') }}" class="btn btn-alt-success">{{ __('Crate new banner') }}
                    <i class="fa fa-plus"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                            <th>{{ __('Title') }}</th>
                            <th style="width: 30%;">{{ __('Visits') }}</th>
                            <th style="width: 15%;">{{ __('Active') }}</th>
                            <th style="width: 15%;">{{ __('Order') }}</th>
                            <th class="text-center" style="width: 100px;">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($banners as $banner)
                            <tr>
                                <td class="text-center">
                                    <img class="img-fluid"  src="{{ pageImage($banner->file) }}" alt="">
                                </td>
                                <td class="font-w600">{{ $banner->title }}</td>
                                <td>
                                    {{ $banner->visits }}
                                </td>
                                <td>
                                    @if($banner->status === true)
                                        <span class="badge badge-info">{{ __('Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('No') }}</span>
                                    @endif

                                </td>
                                <td class="font-w800">
                                    {{ $banner->row_no }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('banners.edit', $banner) }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('banners.destroy', $banner) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p class="col text-center">{{ __('There is no banners') }}</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </div>
@endsection

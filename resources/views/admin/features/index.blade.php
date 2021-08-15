@extends('layouts.backend')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Features list') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Features list') }}</h3>
            </div>
            <div class="block-content">
                <a href="{{ route('features.create') }}" class="btn btn-alt-success mb-2">{{ __('Crate new feature') }}
                    <i class="fa fa-plus"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                            <th>{{ __('Title') }}</th>
                            <th class="text-center" style="width: 100px;">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($features as $feature)
                            <tr>
                                <td class="text-center">
                                    <img class="img-fluid"  src="{{ pageImage($feature->icon) }}" alt="{{ $feature->seo_title ?? '' }}">
                                </td>
                                <td class="font-w600">{{ $feature->title ?? '' }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('features.edit', $feature) }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('features.destroy', $feature) }}" method="POST">
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
                            <p class="col text-center">{{ __('There is no features') }}</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </div>
@endsection

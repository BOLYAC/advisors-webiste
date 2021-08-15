@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Pages list') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Pages list') }}</h3>
            </div>
            <div class="block-content">
                <a href="{{ route('site-pages.create') }}" class="btn btn-alt-success mb-2">{{ __('Crate new page') }}
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
                        @forelse($topics as $topic)
                        <tr>
                            <td class="text-center">
                                <img class="img-fluid" src="{{ pageImage($topic->photo_file) }}" alt="">
                            </td>
                            <td class="font-w600">{{ $topic->title }}</td>
                            <td>
                                {{ $topic->visits }}
                            </td>
                            <td>
                                @if($topic->status === true)
                                    <span class="badge badge-info">{{ __('Yes') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('No') }}</span>
                                @endif

                            </td>
                            <td class="font-w800">
                                {{ $topic->row_no }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('site-pages.edit', $topic) }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('site-pages.destroy', $topic) }}" method="post">
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
                            <p class="col text-center">{{ __('There is no pages') }}</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </div>
@endsection

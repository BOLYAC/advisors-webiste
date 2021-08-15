@extends('layouts.backend')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('News list') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('News list') }}</h3>
            </div>
            <div class="block-content">
                <a href="{{ route('news.create') }}" class="btn btn-alt-success mb-2">{{ __('Crate new') }}
                    <i class="fa fa-plus"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                            <th>{{ __('Title') }}</th>
                            <th style="width: 15%;">{{ __('Date') }}</th>
                            <th style="width: 5%;">{{ __('Visits') }}</th>
                            <th style="width: 5%;">{{ __('Active') }}</th>
                            <th class="text-center" style="width: 100px;">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td class="text-center">
                                    <img class="img-fluid" src="{{ pageImage($article->photo_file) }}"
                                         alt="{{ $article->seo_title ?? '' }}">
                                </td>
                                <td class="font-w600">{{ $article->title ?? '' }}</td>
                                <td class="font-w600">{{ \Carbon\Carbon::parse($article->date)->format('m-d-Y')}}</td>
                                <td>
                                    {{ $article->visits ?? ''}}
                                </td>
                                <td>
                                    @if($article->status === true)
                                        <span class="badge badge-info">{{ __('Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('No') }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('news.edit', $article) }}" class="btn btn-sm btn-secondary"
                                           data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('news.destroy', $article) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip"
                                                    title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p class="col text-center">{{ __('There is no categories') }}</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </div>
@endsection

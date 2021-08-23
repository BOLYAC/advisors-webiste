@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Faq Questions list') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Faq Questions list') }}</h3>
            </div>
            <div class="block-content block-content-full">
                <a href="{{ route('faqQuestions.create') }}"
                   class="btn btn-alt-success mb-5">{{ __('Crate new Faq Questions') }}
                    <i class="fa fa-plus"></i>
                </a>

                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Details') }}</th>
                        <th>{{ __('Created at') }}</th>
                        <th class="text-center">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($faqQuestions as $key => $faq)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td class="text-center">{{ $faq->title ?? ''}}</td>
                            <td class="font-w600">{!! $faq->details ?? '' !!}</td>
                            <td class="font-w600">{{ $faq->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('faqQuestions.edit', $faq) }}"
                                       class="btn btn-sm btn-secondary"
                                       data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('faqQuestions.destroy', $faq) }}" method="post">
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

                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Page Content -->
    </div>
@endsection

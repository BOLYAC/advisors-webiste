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
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Stories') }}</a>
            <span class="breadcrumb-item active">{{ __('Stories list') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Stories list') }}</h3>
            </div>
            <div class="block-content block-content-full">
                <a href="{{ route('insta-stories.create') }}"
                   class="btn btn-alt-success mb-5">{{ __('Crate new story') }}
                    <i class="fa fa-plus"></i>
                </a>

                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                        <th>{{ __('Created at') }}</th>
                        <th>{{ __('Order') }}</th>
                        <th class="text-center">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($stories as $key => $story)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td class="text-center">
                                <img class="img-fluid" src="{{ pageImage($story->photo_file) }}" alt="">
                            </td>
                            <td class="font-w600">{{ $story->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $story->row_no ?? ''}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('insta-stories.edit', $story) }}"
                                       class="btn btn-sm btn-secondary"
                                       data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('insta-stories.destroy', $story) }}" method="post">
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

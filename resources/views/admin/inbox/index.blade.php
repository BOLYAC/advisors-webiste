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

    <script>
        $(document).ready(function () {
            $('.js-dataTable-full-1').DataTable({
                "order": [[0, "desc"]],
                "iDisplayLength": 50,
                "scrollX": true,
            });
        });
    </script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Messages list') }}</a>
            <span class="breadcrumb-item active">{{ __('Messages list') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Messages list') }}</h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('subject') }}</th>
                        <th width="20%">{{ __('Message') }}</th>
                        <th width="20%">{{ __('Item') }}</th>
                        <th>{{ __('Sent at') }}</th>
                        <th class="text-center">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($contacts as $key => $contact)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td class="text-center">{{ $contact->name ?? ''}}</td>
                            <td class="font-w600">{{ $contact->email ?? '' }}</td>
                            <td class="font-w600">{{ $contact->phone ?? '' }}</td>
                            <td class="font-w600">{{ $contact->subject ?? '' }}</td>
                            <td class="font-w600">{!! $contact->message ?? '' !!}</td>
                            <td class="font-w600">{{ $contact->item_id ?? '' }}</td>
                            <td class="font-w600">{{ $contact->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <form action="{{ route('contacts.destroy', $contact) }}" method="post">
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
                        <p class="col text-center">{{ __('There is no Messages') }}</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Page Content -->
    </div>
@endsection

@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Stats Widgets with Icons -->
        <h2 class="content-heading">Reports <small>Projects</small></h2>
        <div class="row gutters-tiny">
            <!-- Row #1 -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">
                        </div>
                        <div class="font-size-h3 font-w600">{{ $projects }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Projects</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $projectsActive }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Acive Projects</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $projectsDesaible }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Projects Disable</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $projectsCitizenship }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Projects Citizenship</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $projectsHot }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Projects Hots</div>
                    </div>
                </a>
            </div>
            <!-- END Row #1 -->
        </div>
        <h2 class="content-heading">Reports <small>Blog</small></h2>
        <div class="row gutters-tiny">
            <!-- Row #1 -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $blogs }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Blogs</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $blogsActive }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Acive Blogs</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $blogsDesaible }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Blogs Disable</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $blogsCitizenship }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Blogs Citizenship</div>
                    </div>
                </a>
            </div>
            <!-- END Row #1 -->
        </div>
        <h2 class="content-heading">Reports <small>Other</small></h2>
        <div class="row gutters-tiny">
            <!-- Row #1 -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $contacts }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Contact</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $stories }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Stories</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">

                        </div>
                        <div class="font-size-h3 font-w600">{{ $users }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">User</div>
                    </div>
                </a>
            </div>
            <!-- END Row #1 -->
        </div>
        <div class="row">
            <div class="col">
                <h2 class="content-heading">Reports <small>Latest Projects</small></h2>
                <div class="row invisible mt-5" data-toggle="appear">
                    <!-- Row #3 -->
                    <div class="col-md-12">
                        <div class="block block-rounded block-bordered">
                            <div class="block-header block-header-default border-b">
                                <h3 class="block-title">Latest Projects</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 80px;">ID</th>
                                        <th>Name</th>
                                        <th class="d-sm-table-cell">Created at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($latestProjectsAdd as $p)
                                        <tr>
                                            <td class="d-none d-sm-table-cell">
                                                <a class="font-w600"
                                                   href="{{ route('project.detail', $p->seo_url_slug) }}"
                                                   target="_blank">{{ $p->id }}</a>
                                            </td>
                                            <td>
                                                <a class="font-w600"
                                                   href="{{ route('project.detail', $p->seo_url_slug) }}"
                                                   target="_blank">
                                                    {{ $p->title }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-black">{{ $p->created_at->format('d-m-Y') }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center text-uppercase">Nothing to show</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <h2 class="content-heading">Reports <small>Latest Blog</small></h2>
                <div class="row invisible mt-5" data-toggle="appear">
                    <!-- Row #3 -->
                    <div class="col-md-12">
                        <div class="block block-rounded block-bordered">
                            <div class="block-header block-header-default border-b">
                                <h3 class="block-title">Latest Blog</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 80px;">ID</th>
                                        <th>Name</th>
                                        <th class="d-sm-table-cell">Created at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($latestBlogsAdd as $b)
                                        <tr>
                                            <td class="d-none d-sm-table-cell">
                                                <a class="font-w600"
                                                   href="{{ route('post.details', $b->seo_url_slug) }}"
                                                   target="_blank">{{ $b->id }}</a>
                                            </td>
                                            <td>
                                                <a class="font-w600"
                                                   href="{{ route('post.details', $b->seo_url_slug) }}"
                                                   target="_blank">
                                                    {{ $b->title }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-black">{{ $b->created_at->format('d-m-Y') }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center text-uppercase">Nothing to show</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="content-heading">Most Viewed Pages</h2>
                <div class="row invisible mt-5" data-toggle="appear">
                    <!-- Row #3 -->
                    <div class="col-md-12">
                        <div class="block block-rounded block-bordered">
                            <div class="block-header block-header-default border-b">
                                <h3 class="block-title">Most Viewed Page</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 80px;">Visits</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($mostViewedPage as $pV)
                                        <tr>
                                            <td>
                                                <a class="font-w600"
                                                   href="/{{ $pV->title }}"
                                                   target="_blank">
                                                    {{ $pV->title }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $pV->visits }}
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center text-uppercase">Nothing to show</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <h2 class="content-heading">Most Viewed Project</h2>
                <div class="row invisible mt-5" data-toggle="appear">
                    <!-- Row #3 -->
                    <div class="col-md-12">
                        <div class="block block-rounded block-bordered">
                            <div class="block-header block-header-default border-b">
                                <h3 class="block-title">Most viewed Project</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 80px;">Visits</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($mostViewedProject as $mvp)
                                        <tr>
                                            <td>
                                                <a class="font-w600"
                                                   href="{{ route('post.details', $mvp->seo_url_slug) }}"
                                                   target="_blank">
                                                    {{ $mvp->title }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-black">{{ $mvp->visits }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center text-uppercase">Nothing to show</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <h2 class="content-heading">Most Viewed Blogs</h2>
                <div class="row invisible mt-5" data-toggle="appear">
                    <!-- Row #3 -->
                    <div class="col-md-12">
                        <div class="block block-rounded block-bordered">
                            <div class="block-header block-header-default border-b">
                                <h3 class="block-title">Most viewed Blogs</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 80px;">Visits</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($mostViewedPost as $mvb)
                                        <tr>
                                            <td>
                                                <a class="font-w600"
                                                   href="{{ route('post.details', $mvb->seo_url_slug) }}"
                                                   target="_blank">
                                                    {{ $mvb->title }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-black">{{ $mvb->visits }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center text-uppercase">Nothing to show</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

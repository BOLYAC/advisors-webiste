<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class BannerController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [];
        $rules += ['file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']];


        $request->validate($rules);


        $request_data = $request->all();


        $next_nor_no = Banner::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }

        $request_data['row_no'] = $next_nor_no;
        $request_data['status'] = $request->has('status') ? 1 : 0;
        $request_data['video_type'] = $request->has('video_type') ? 1 : 0;
        $request_data['visits'] = 0;
        $request_data['created_by'] = Auth::id();

        // Handle image Upload
        if ($request->has('file') && ($request->file('file') instanceof UploadedFile)) {

            $bannerImage = $this->uploadOne($request->file('file'), 'img/banners');
            $request_data['youtube_link'] = $bannerImage;

        }

        $banner = Banner::create($request_data);


        return redirect()->route('banners.index')->withSuccess(__('Banner Created Successfully!'));


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Banner $banner
     * @return void
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {

        $rules = [];
        $rules += ['file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']];

        $request->validate($rules);

        $request_data = $request->all();

        // Handle image Upload
        if ($request->has('video_link') && ($request->file('video_link') instanceof UploadedFile)) {

            $bannerImage = $this->uploadOne($request->file('video_link'), 'img/banners');
            $request_data['youtube_link'] = $bannerImage;

        }

        // create new topic
        $request_data['updated_by'] = Auth::id();
        $request_data['status'] = $request->has('status') ? 1 : 0;
        $request_data['video_type'] = $request->has('video_type') ? 1 : 0;

        $banner->update($request_data);
        return redirect()->route('banners.index')->withSuccess(__('Banner updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Banner $banner
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Banner $banner)
    {
        File::delete('storage/' . optional($banner->translate('en'))->file);
        File::delete('storage/' . optional($banner->translate('ar'))->file);
        $banner->delete();

        return redirect()->route('banners.index')->withSuccess(__('Slide deleted Successfully!'));
    }
}

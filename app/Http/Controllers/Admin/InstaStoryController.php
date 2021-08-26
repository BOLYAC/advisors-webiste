<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InstaStory;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InstaStoryController extends Controller
{
    use UploadAble;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = InstaStory::all();
        return view('admin.stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data = $request->all();

        $next_nor_no = InstaStory::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }
        $request_data['row_no'] = $next_nor_no;
        $request_data['status'] = $request->has('status') ? 1 : 0;
        $request_data['created_by'] = Auth::id();

        // Handle image Upload
        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $categoryImage = $this->uploadOne($request->file('photo_file'), 'img/instagrame-stories');
            $request_data['photo_file'] = $categoryImage;

        }

        InstaStory::create($request_data);
        return redirect()->route('insta-stories.index')->withSuccess(__('Story Created Successfully!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\InstaStory $instaStory
     * @return \Illuminate\Http\Response
     */
    public function edit(InstaStory $instaStory)
    {
        return view('admin.stories.edit', compact('instaStory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InstaStory $instaStory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstaStory $instaStory)
    {
        $request_data = $request->all();

        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $categoryImage = $this->uploadOne($request->file('photo_file'), 'img/instagrame-stories');

            $request_data['photo_file'] = $categoryImage;

        }

        // create new topic
        $request_data['updated_by'] = Auth::id();
        $request_data['status'] = $request->has('status') ? 1 : 0;

        $instaStory->update($request_data);

        return redirect()->route('insta-stories.index')->withSuccess(__('Story updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\InstaStory $instaStory
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstaStory $instaStory)
    {
        File::delete('storage/' . $instaStory->photo_file);
        $instaStory->delete();

        return redirect()->route('insta-stories.index')->withSuccess(__('Story deleted Successfully!'));
    }
}

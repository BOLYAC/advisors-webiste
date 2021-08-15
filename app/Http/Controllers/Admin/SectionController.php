<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class SectionController extends Controller
{
    use UploadAble;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'icon' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];

        $request->validate($rules);

        $request_data = $request->all();

        // Handle image Upload
        if ($request->has('icon') && ($request->file('icon') instanceof UploadedFile)) {
            $featureIcon = $this->uploadOne($request->file('icon'), 'img/sections');
            $request_data['icon'] = $featureIcon;
        }

        Section::create($request_data);

        return redirect()->route('categories.index')->withSuccess(__('Section Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $rules = [
            'icon' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];

        $request->validate($rules);

        $request_data = $request->all();

        // Handle image Upload
        if ($request->has('icon') && ($request->file('icon') instanceof UploadedFile)) {
            $featureIcon = $this->uploadOne($request->file('icon'), 'img/features');
            $request_data['icon'] = $featureIcon;
        }

        $section->update($request_data);

        return redirect()->route('categories.index')->withSuccess(__('Section updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        File::delete('storage/' . $section->icon);
        $section->delete();

        return redirect()->route('categories.index')->withSuccess(__('Section deleted Successfully!'));
    }
}

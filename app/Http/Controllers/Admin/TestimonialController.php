<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
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

        $next_nor_no = Testimonial::max('row_no');
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

            $categoryImage = $this->uploadOne($request->file('photo_file'), 'img/testimonials');
            $request_data['photo_file'] = $categoryImage;

        }

        Testimonial::create($request_data);
        return redirect()->route('testimonial.index')->withSuccess(__('Testimonial Created Successfully!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {

        $request_data = $request->all();

        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $categoryImage = $this->uploadOne($request->file('photo_file'), 'img/testimonials');

            $request_data['photo_file'] = $categoryImage;

        }

        // create new topic
        $request_data['updated_by'] = Auth::id();
        $request_data['status'] = $request->has('status') ? 1 : 0;

        $testimonial->update($request_data);

        return redirect()->route('testimonial.index')->withSuccess(__('Testimonial updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        File::delete('storage/' . $testimonial->photo_file);
        $testimonial->delete();

        return redirect()->route('testimonial.index')->withSuccess(__('Testimonias deleted Successfully!'));
    }
}

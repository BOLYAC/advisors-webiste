<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Feature;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class FacilityController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
            $facilityIcon = $this->uploadOne($request->file('icon'), 'img/facilities');
            $request_data['icon'] = $facilityIcon;
        }

        Facility::create($request_data);

        return redirect()->route('facilities.index')->withSuccess(__('Facility Created Successfully!'));
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
     * @param Facility $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Facility $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $rules = [
            'icon' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];

        $request->validate($rules);

        $request_data = $request->all();

        // Handle image Upload
        if ($request->has('icon') && ($request->file('icon') instanceof UploadedFile)) {
            $facilityIcon = $this->uploadOne($request->file('icon'), 'img/facilities');
            $request_data['icon'] = $facilityIcon;
        }

        $facility->update($request_data);

        return redirect()->route('facilities.index')->withSuccess(__('Facility updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Facility $facility
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Facility $facility)
    {
        File::delete('storage/' . $facility->icon);
        $facility->delete();

        return redirect()->route('facilities.index')->withSuccess(__('Facility deleted Successfully!'));
    }
}

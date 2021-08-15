<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all();
        return view('admin.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.features.create');
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
            $featureIcon = $this->uploadOne($request->file('icon'), 'img/features');
            $request_data['icon'] = $featureIcon;
        }

        Feature::create($request_data);

        return redirect()->route('features.index')->withSuccess(__('Feature Created Successfully!'));
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
     * @param Feature $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Feature $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
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

        $feature->update($request_data);

        return redirect()->route('features.index')->withSuccess(__('Feature updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feature $feature
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Feature $feature)
    {
        File::delete('storage/' . $feature->icon);
        $feature->delete();

        return redirect()->route('features.index')->withSuccess(__('Feature deleted Successfully!'));
    }
}

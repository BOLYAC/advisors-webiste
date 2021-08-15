<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Feature;
use App\Models\Project;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Section;
use App\Models\Translations\PropertyTranslation;
use App\Traits\UploadAble;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::all();
        $sections = Section::all();
        $facilities = Facility::all();
        $projects = Project::withTranslation('title')->get('id');
        return view('admin.properties.create', compact('features', 'sections', 'facilities', 'projects'));
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
            'photo_file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];

        $request->validate($rules);

        $next_nor_no = Property::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }

        $request_data = $request->all();


        // Handle image Upload
        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $projectImage = $this->uploadOne($request->file('photo_file'), 'img/properties');

            $request_data['photo_file'] = $projectImage;
        }

        // create new topic
        $request_data['row_no'] = $next_nor_no;
        $request_data['created_by'] = Auth::id();
        $request_data['visits'] = 0;
        $request_data['en']['seo_title'] = $request_data['en']['title'];
        $request_data['en']['seo_url_slug'] = Str::of($request_data['en']['title'])->slug('-');
        $request_data['en']['seo_description'] = mb_substr(strip_tags(stripslashes($request_data['en']['details'])), 0, 165, 'UTF-8');
        $request_data['ar']['seo_title'] = $request_data['ar']['title'];
        $request_data['ar']['seo_url_slug'] = Str::of($request_data['ar']['title'])->slug('-');
        $request_data['ar']['seo_description'] = mb_substr(strip_tags(stripslashes($request_data['ar']['details'])), 0, 165, 'UTF-8');
        $request_data['featured'] = $request->has('featured') ? 1 : 0;

        $property = Property::create(collect($request_data)->except(['features', 'facilities', '_token'])->toArray());
        $property->features()->sync($request->input('features'));

        if ($request->has('facilities')) {
            $items = $request_data['facilities'];
            $data2 = array();
            foreach ($items as $key => $val) {
                $data2[$val['facility_id']] = array('distance' => $val['distance']);
            }
            $facilities = collect($data2);
            $property->facilities()->sync($facilities);
        }

        return redirect()->route('properties.edit', $property)->withSuccess(__('Property Created Successfully!'));
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
     * @param Property $property
     * @return void
     */
    public function edit(Property $property)
    {
        $features = Feature::all();
        $sections = Section::all();
        $projects = Project::withTranslation('title')->get('id');
        $property->load('facilities');
        $facilities = Facility::get()->map(function ($facility) use ($property) {
            $facility->value = data_get($property->facilities()->firstWhere('id', $facility->id), 'pivot.distance') ?? null;
            return $facility;
        });
        return view('admin.properties.edit', compact('property', 'features', 'facilities', 'sections', 'projects'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Property $property
     * @return void
     */
    public function update(Request $request, Property $property)
    {

        $rules = [
            'photo_file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];

        $request->validate($rules);

        $request_data = $request->all();


        // Handle image Upload
        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $projectImage = $this->uploadOne($request->file('photo_file'), 'img/properties');

            $request_data['photo_file'] = $projectImage;
        }

        if ($request->hasFile('photos')) {
            foreach ($request_data['photos'] as $image) {
                $pathImage = $this->uploadOne($image, 'img/properties');
                PropertyImage::create([
                    'full' => $pathImage,
                    'property_id' => $property->id,
                ]);
            }
        }

        if (isset($request_data['imageDestroy'])) {
            foreach ($request_data['imageDestroy'] as $image) {
                File::delete('storage/' . $image);
                PropertyImage::findOrFail($image)->delete();
            }
        }

        // create new topic
        $request_data['updated_by'] = Auth::id();
        $request_data['featured'] = $request->has('featured') ? 1 : 0;

        $facilities = collect($request->input('facilities', []))
            ->map(function ($facility) {
                return ['distance' => $facility];
            });

        $property->update(collect($request_data)->except(['features', 'facilities', '_token'])->toArray());
        $property->facilities()->sync($facilities);
        $property->features()->sync($request->input('features'));

        return redirect()->route('properties.edit', $property)->withSuccess(__('Property updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Property $property
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Property $property)
    {
        File::delete('storage/' . $property->photo_file);
        $property->delete();
        return redirect()->route('properties.index')->withSuccess(__('Property deleted Successfully!'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function check_slug(Request $request)
    {
        // New version: to generate unique slugs
        $slug = SlugService::createSlug(PropertyTranslation::class, 'seo_url_slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

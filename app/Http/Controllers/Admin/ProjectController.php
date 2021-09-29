<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Feature;
use App\Models\FloorProject;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Section;
use App\Models\Translations\ProjectTranslation;
use App\Traits\UploadAble;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;


class ProjectController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
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
        return view('admin.projects.create', compact('features', 'sections', 'facilities'));
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

        $next_nor_no = Project::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }

        $request_data = $request->all();

        // Handle image Upload
        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $projectImage = $this->uploadOne($request->file('photo_file'), 'img/project');

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
        $request_data['active'] = $request->has('active') ? 1 : 0;
        $request_data['citizen_status'] = $request->has('citizen_status') ? 1 : 0;

        $project = Project::create(collect($request_data)->except(['features', 'facilities', '_token'])->toArray());
        $project->features()->sync($request->input('features'));
        if ($request->facilities) {
            $items = $request_data['facilities'];
            $data2 = array();
            foreach ($items as $key => $val) {
                $data2[$val['facility_id']] = array('distance' => $val['distance']);
            }
            $facilities = collect($data2);
            $project->facilities()->sync($facilities);
        }

        return redirect()->route('projects.edit', $project)->withSuccess(__('Project Created Successfully!'));
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
     * @param Project $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $features = Feature::all();
        $sections = Section::all();
        $project->load('facilities');


        $facilities = Facility::get()->map(function ($facility) use ($project) {
            $facility->value = data_get($project->facilities()->firstWhere('id', $facility->id), 'pivot.distance') ?? null;
            return $facility;
        });
        return view('admin.projects.edit', compact('project', 'features', 'facilities', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Project $project
     * @return void
     */
    public function update(Request $request, Project $project)
    {
        $rules = [
            'photo_file' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];

        $request->validate($rules);

        $request_data = $request->all();


        // Handle image Upload
        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $projectImage = $this->uploadOne($request->file('photo_file'), 'img/projects');

            $request_data['photo_file'] = $projectImage;
        }

        if (isset($request_data['imageDestroy'])) {
            foreach ($request_data['imageDestroy'] as $key => $image) {
                File::delete('storage/' . $image);
                /*ProjectImage::findOrFail($image)->delete();*/
            }
        }

        if (isset($request_data['row_no_image'])) {
            foreach ($request_data['row_no_image'] as $key => $row_num) {
                ProjectImage::findOrFail($key)->update(['row_no_image' => $row_num]);
            }
        }

        if ($request->hasFile('photos')) {
            foreach ($request_data['photos'] as $image) {
                $pathImage = $this->uploadOne($image, 'img/projects');
                ProjectImage::create([
                    'full' => $pathImage,
                    'project_id' => $project->id,
                ]);
            }
        }

        // create new topic
        $request_data['updated_by'] = Auth::id();
        $request_data['featured'] = $request->has('featured') ? 1 : 0;
        $request_data['active'] = $request->has('active') ? 1 : 0;
        $request_data['citizen_status'] = $request->has('citizen_status') ? 1 : 0;

        $facilities = collect($request->input('facilities', []))
            ->map(function ($facility) {
                return ['distance' => $facility];
            });

        $project->update(collect($request_data)->except(['features', 'facilities', '_token'])->toArray());
        $project->facilities()->sync($facilities);
        $project->features()->sync($request->input('features'));

        return redirect()->route('projects.edit', $project)->with('toast_success', __('Project updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return void
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        File::delete('storage/' . $project->photo_file);
        $project->delete();
        return redirect()->route('projects.index')->withSuccess(__('Project deleted Successfully!'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function check_slug(Request $request)
    {
        // New version: to generate unique slugs
        $slug = SlugService::createSlug(ProjectTranslation::class, 'seo_url_slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function upload(Request $request)
    {
        $project = Project::findOrFail($request->project_id);

        if ($request->has('image')) {

            $image = $this->uploadOne($request->image, 'img/projects');

            $projectImage = new ProjectImage([
                'full' => $image,
            ]);

            $project->images()->save($projectImage);
        }

        return response()->json(['status' => 'Success']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $image = ProjectImage::findOrFail($id);

        if ($image->full != '') {
            $this->deleteOne($image->full);
        }
        $image->delete();

        return redirect()->back();
    }

    public function createNewPlan(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $request_data = $request->except('_token');
        // Handle image Upload
        if ($request->has('floor_full') && ($request->file('floor_full') instanceof UploadedFile)) {

            $projectImage = $this->uploadOne($request->file('floor_full'), 'img/projects');

            $request_data['floor_full'] = $projectImage;

            $project->floors()->create([
                'floor_full' => $request_data['floor_full'],
                'floor_title' => $request_data['floor_title'],
                'floor_price' => $request_data['floor_price'],
                'floor_size' => $request_data['floor_size'],
                'floor_bedrooms' => $request_data['floor_bedrooms'],
                'floor_bathrooms' => $request_data['floor_bathrooms'],
            ]);

        } else {
            $project->floors()->create([
                'floor_title' => $request_data['floor_title'],
                'floor_price' => $request_data['floor_price'],
                'floor_size' => $request_data['floor_size'],
                'floor_bedrooms' => $request_data['floor_bedrooms'],
                'floor_bathrooms' => $request_data['floor_bathrooms'],
            ]);
        }

        return redirect()->route('projects.edit', $project)
            ->with('toast_success', __('Successfully created new plan floor'));
    }

    public function updatePlan(Request $request)
    {
        $request_data = $request->except('_token', 'project_id', 'floor_id');
        // Handle image Upload
        $floor = FloorProject::findOrFail($request->floor_id);
        if ($request->has('floor_full') && ($request->file('floor_full') instanceof UploadedFile)) {

            $projectImage = $this->uploadOne($request->file('floor_full'), 'img/projects');

            $request_data['floor_full'] = $projectImage;
        }
        $floor->update($request_data);

        return redirect()->route('projects.edit', $floor->project_id)
            ->with('toast_success', __('Successfully created new plan floor'));
    }

    public function deletePlan(Request $request)
    {
        $request_data = $request->except('_token', 'project_id', 'floor_id');

        $floor = FloorProject::findOrFail($request->floor_id);

        File::delete('storage/' . $floor->photo_file);
        $floor->delete();

        return redirect()->route('projects.edit', $request->project_id)
            ->with('toast_success', __('Successfully delete plan floor'));
    }
}

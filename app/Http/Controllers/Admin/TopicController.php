<?php

namespace App\Http\Controllers\Admin;

use App\Models\Translations\TopicTranslation;
use App\Traits\UploadAble;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostTopicRequest;
use App\Models\Topic;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;


class TopicController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $topics = Topic::all();
        return view('admin.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $next_nor_no = Topic::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }

        $request_data = $request->all();

        // Handle image Upload
        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $topicImage = $this->uploadOne($request->file('photo_file'), 'img/topics');

            $request_data['photo_file'] = $topicImage;

        }

        // create new topic
        $request_data['row_no'] = $next_nor_no;
        $request_data['created_by'] = Auth::id();
        $request_data['visits'] = 0;
        $request_data['seo_title'] = $request->get('title');
        $request_data['seo_url_slug'] = Str::of($request->get('title'))->slug('-');
        $request_data['seo_description'] = mb_substr(strip_tags(stripslashes($request_data['details'])), 0, 165, 'UTF-8');
        $request_data['status'] = $request->has('status') ? 1 : 0;

        // Save topic details
        $topic = Topic::create($request_data);

        return redirect()->route('site-pages.edit', $topic)->withSuccess( __('Page Created Successfully!') );

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Topic $topic
     * @return Application|Factory|View
     */
    public function edit(Topic $topic)
    {
        return view('admin.topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Topic $topic
     * @return void
     */
    public function update(Request $request, Topic $topic)
    {
        $rules = [
            'photo_file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048',],
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $topicImage = $this->uploadOne($request->file('photo_file'), 'img/topics');

            $request_data['photo_file'] = $topicImage;

        }


        // create new topic
        $request_data['updated_by'] = Auth::id();
        $request_data['status'] = $request->has('status') ? 1 : 0;

        $topic->update($request_data);
        return redirect()->route('site-pages.edit', $topic)->withSuccess( __('Page updated Successfully!') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Topic $topic
     * @return Response
     * @throws \Exception
     */
    public function destroy(Topic $topic)
    {
        File::delete('storage/' . $topic->image);
        File::delete('storage/' . $topic->icon);
        $topic->delete();

        return redirect()->route('site-pages.index')->withSuccess( __('Page deleted Successfully!') );
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function check_slug(Request $request)
    {
        // New version: to generate unique slugs
        $slug = SlugService::createSlug(TopicTranslation::class, 'seo_url_slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

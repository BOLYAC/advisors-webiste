<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Translations\PostTranslation;
use App\Traits\UploadAble;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$rules = [
            'photo_file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];

        $request->validate($rules);*/

        $request_data = $request->all();

        $next_nor_no = Post::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }

        $request_data['seo_url_slug'] = Str::of($request->get('title'))->slug('-');
        $request_data['row_no'] = $next_nor_no;
        $request_data['status'] = $request->has('status') ? 1 : 0;
        $request_data['citizen_status'] = $request->has('citizen_status') ? 1 : 0;
        $request_data['visits'] = 0;
        $request_data['created_by'] = Auth::id();

        // Handle image Upload
        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {
            $categoryImage = $this->uploadOne($request->file('photo_file'), 'img/posts');
            $request_data['photo_file'] = $categoryImage;
        }

        Post::create(collect($request_data)->except(['categories', '_token'])->toArray())
            ->categories()
            ->attach($request->input('categories'));
        return redirect()->route('posts.index')->withSuccess(__('Post Created Successfully!'));
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
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        /*$rules = [
            'photo_file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];

        $request->validate($rules);*/

        $request_data = $request->all();

        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $topicImage = $this->uploadOne($request->file('photo_file'), 'img/posts');

            $request_data['photo_file'] = $topicImage;
        }

        // create new topic
        $request_data['updated_by'] = Auth::id();
        $request_data['status'] = $request->has('status') ? 1 : 0;
        $request_data['citizen_status'] = $request->has('citizen_status') ? 1 : 0;

        $post->update(collect($request_data)->except(['categories', '_token'])->toArray());
        $post->categories()->sync($request->input('categories'));

        return redirect()->route('posts.index')->withSuccess(__('Post updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        File::delete('storage/' . $post->photo_file);
        $post->delete();

        return redirect()->route('posts.index')->withSuccess(__('Post deleted Successfully!'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function check_slug(Request $request)
    {
        // New version: to generate unique slugs
        $slug = SlugService::createSlug(PostTranslation::class, 'seo_url_slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

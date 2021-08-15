<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Translations\CategoryTranslation;
use App\Traits\UploadAble;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];

        $request->validate($rules);

        $request_data = $request->all();

        $next_nor_no = Category::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }
        $request_data['seo_url_slug'] = Str::of($request->get('title'))->slug('-');
        $request_data['row_no'] = $next_nor_no;
        $request_data['status'] = $request->has('status') ? 1 : 0;
        $request_data['visits'] = 0;
        $request_data['created_by'] = Auth::id();

        // Handle image Upload
        if ($request->has('photo') && ($request->file('photo') instanceof UploadedFile)) {

            $categoryImage = $this->uploadOne($request->file('photo'), 'img/categories');
            $request_data['photo'] = $categoryImage;

        }

        if ($request->has('icon') && ($request->file('icon') instanceof UploadedFile)) {

            $categoryIcon = $this->uploadOne($request->file('icon'), 'img/categories');

            $request_data['icon'] = $categoryIcon;

        }

        Category::create($request_data);
        return redirect()->route('category.index')->withSuccess(__('Category Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'dimensions:min_width=1048,max_width=600'],
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->has('photo') && ($request->file('photo') instanceof UploadedFile)) {

            $categoryImage = $this->uploadOne($request->file('photo'), 'img/categories');

            $request_data['photo'] = $categoryImage;

        }

        if ($request->has('icon') && ($request->file('icon') instanceof UploadedFile)) {

            $categoryImage = $this->uploadOne($request->file('icon'), 'img/categories');

            $request_data['icon'] = $categoryImage;

        }

        // create new topic
        $request_data['updated_by'] = Auth::id();
        $request_data['status'] = $request->has('status') ? 1 : 0;

        $category->update($request_data);

        return redirect()->route('category.index')->withSuccess(__('Category updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        File::delete('storage/' . $category->file);
        File::delete('storage/' . $category->icon);
        $category->delete();

        return redirect()->route('category.index')->withSuccess(__('Category deleted Successfully!'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function check_slug(Request $request)
    {
        // New version: to generate unique slugs
        $slug = SlugService::createSlug(CategoryTranslation::class, 'seo_url_slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

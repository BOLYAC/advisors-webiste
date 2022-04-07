<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\InstaStory;
use App\Models\Post;
use App\Models\Project;
use App\Models\Topic;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getReport()
    {
        // Projects
        $latestProjectsAdd = Project::query()->latest()->take(6)->get();
        $projectsDesaible = Project::query()->where('active', false)->count();
        $projectsActive = Project::query()->where('active', true)->count();
        $projectsCitizenship = Project::query()->where('citizen_status', true)->count();
        $projectsHot = Project::query()->where('featured', true)->count();
        $projects = Project::query()->count();
        // Blogs
        $latestBlogsAdd = Post::query()->latest()->take(6)->get();
        $blogsActive = Post::query()->where('status', true)->count();
        $blogsDesaible = Post::query()->where('status', false)->count();
        $blogsCitizenship = Post::query()->where('citizen_status', true)->count();
        $blogs = Post::query()->count();
        // Other
        $contacts = Contact::query()->count();
        $stories = InstaStory::query()->count();
        $users = User::where('status', true)->count();

        // Most viewed pages
        $mostViewedPage = Topic::get()->sortByDesc('visits');
        $mostViewedProject = Project::get()->take(10)->sortByDesc('visits');
        $mostViewedPost = Post::get()->take(10)->sortByDesc('visits');

        return view('admin.dashboard.reports',
            compact('projects',
                'latestProjectsAdd', 'projectsActive', 'projectsDesaible', 'projectsCitizenship', 'projectsHot',
                'blogs', 'latestBlogsAdd', 'blogsActive', 'blogsCitizenship', 'blogsDesaible',
                'mostViewedPage', 'mostViewedProject', 'mostViewedPost',
                'contacts', 'stories', 'users')
        );
    }

    public function getProject(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $key = $request->q;
            $projectResult = Project::where(function ($query) use ($key) {
                $query->whereTranslationLike('title', '%' . $key . '%');
            })->get();
        }

        foreach ($data as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->title];
        }

        return response()->json($formatted_tags);
    }
}

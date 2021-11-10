<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\Property;
use App\Models\Section;
use App\Models\Topic;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    public function landing()
    {
        $banners = \App\Models\Banner::orderBy('row_no')->get();
        $sections = \App\Models\Section::all();
        $projects = \App\Models\Project::where('featured', true)->get()->take(6);
        $citizenProjects = \App\Models\Project::where('citizen_status', true)->get()->take(6);
        $posts = \App\Models\Post::all();
        $citizenPosts = \App\Models\Post::where('citizen_status', true)->get()->take(6);
        $testimonials = \App\Models\Testimonial::where('status', true)->orderBy('row_no')->get();
        $stories = \App\Models\InstaStory::where('status', true)->orderBy('row_no')->get();

        $news = \App\Models\Article::all();
        $topic = Topic::whereTranslationLike('title', '%home%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('home'));
            SEOTools::setCanonical(route('home'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword($topic->seo_keywords);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }

        return view('site.home',
            compact('banners', 'sections', 'projects', 'posts', 'news', 'citizenProjects', 'citizenPosts', 'testimonials', 'stories')
        );
    }

    public function projectList(Request $request, $city = null)
    {
        $projects = \App\Models\Project::query();
        $features = \App\Models\Feature::all();
        $sections = \App\Models\Section::all();
        $popProjects = \App\Models\Project::query()->get()->take(3);
        $topic = Topic::whereTranslationLike('title', '%projects%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('projects'));
            SEOTools::setCanonical(route('projects'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword([$topic->seo_keywords]);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }

        $input = $request->all();

        if ($request->property_type) {
            $projects->where('category_id', $input['property_type']);
        }

        if ($request->city) {
            $projects->whereIn('city', $input['city'] ?? $city);
        }

        if ($request->project_bedrooms) {
            if ($input['project_bedrooms'] < 6) {
                $projects->where('project_bedrooms', $input['project_bedrooms']);
            } else {
                $projects->where('project_bedrooms', '>=', $input['project_bedrooms']);
            }
        }

        $projects = $projects->paginate(6);


        return view('site.projects', compact('projects', 'features', 'sections', 'popProjects', 'topic'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function getProject($slug)
    {
        $categories = Section::all();
        $project = Project::with('images')->whereTranslation('seo_url_slug', $slug)->firstOrFail();
        $popProjects = \App\Models\Project::query()->get()->take(6);
        $project->visits = $project->visits + 1;
        $project->save();

        SEOTools::setTitle(config('settings.site_name') . ' | ' . $project->seo_title);
        SEOTools::setDescription($project->seo_description);
        SEOTools::opengraph()->setUrl(route('project.detail', $project->seo_url_slug));
        SEOTools::setCanonical(route('project.detail', $project->seo_url_slug));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite(config('settings.social_twitter'));
        SEOTools::jsonLd()->addImage($project->photo_file);
        SEOMeta::addKeyword([$project->seo_keywords]);

        return view('site.project', compact('project', 'categories', 'popProjects'));
    }

    public function propertyList()
    {
        $properties = \App\Models\Property::all();
        $features = \App\Models\Feature::all();
        $sections = \App\Models\Section::all();
        $popProperties = \App\Models\Property::query()->get()->take(3);
        $topic = Topic::whereTranslationLike('title', '%properties%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('properties'));
            SEOTools::setCanonical(route('properties'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword([$topic->seo_keywords]);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.properties.index', compact('properties', 'features', 'sections', 'popProperties'));
    }

    public function getProperty($slug)
    {
        $categories = Section::all();
        $property = Property::with('images')->whereTranslation('seo_url_slug', $slug)->firstOrFail();
        $sections = Section::all();
        $property->visits = $property->visits + 1;
        $property->save();

        SEOTools::setTitle(config('settings.site_name') . ' | ' . $property->seo_title);
        SEOTools::setDescription($property->seo_description);
        SEOTools::opengraph()->setUrl(route('project.detail', $property->seo_url_slug));
        SEOTools::setCanonical(route('project.detail', $property->seo_url_slug));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite(config('settings.social_twitter'));
        SEOTools::jsonLd()->addImage($property->photo_file);
        SEOMeta::addKeyword([$property->seo_keywords]);

        return view('site.properties.show', compact('property', 'categories', 'sections'));
    }

    public function blog()
    {
        $category = Category::whereTranslationLike('seo_url_slug', '%blog%')->firstOrFail();
        $posts = $category->posts()->get();
        $categories = Category::all();
        $lastArticles = Post::latest()->take(3)->get();
        $projects = Project::where('featured', true)->take(3)->get();
        $topic = Topic::whereTranslationLike('title', '%blog%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('properties'));
            SEOTools::setCanonical(route('properties'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword([$topic->seo_keywords]);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.articles', compact('posts', 'categories', 'topic', 'lastArticles', 'projects'));
    }

    public function articles()
    {
        $category = Category::whereTranslationLike('seo_url_slug', '%articles%')->firstOrFail();
        $posts = $category->posts()->get();
        $categories = Category::all();
        $lastArticles = Post::latest()->take(3)->get();
        $projects = Project::where('featured', true)->take(3)->get();
        $topic = Topic::whereTranslationLike('title', '%articles%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('properties'));
            SEOTools::setCanonical(route('properties'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword([$topic->seo_keywords]);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.articles', compact('posts', 'categories', 'topic', 'lastArticles', 'projects'));
    }

    public function getCategory($slug)
    {
        $category = Category::whereTranslationLike('seo_url_slug', $slug)->firstOrFail();
        $posts = $category->posts()->get();
        $categories = Category::all();
        $lastArticles = $category->posts()->latest()->take(3)->get();
        $projects = Project::where('featured', true)->take(3)->get();

        $category->visits = $category->visits + 1;
        $category->save();

        SEOMeta::setTitle($category->title);
        SEOMeta::setDescription($category->details);
        SEOMeta::addMeta('article:published_time', $category->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $category->categories->first()->title, 'property');
        SEOMeta::addKeyword($category->seo_keywords);

        OpenGraph::setDescription($category->details);
        OpenGraph::setTitle($category->title);
        OpenGraph::setUrl(route('category.details', $category->seo_url_slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'tr-TR');

        OpenGraph::addImage(pageImage($category->photo_file), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($category->title);
        JsonLd::setDescription($category->details);
        JsonLd::setType('Article');

        return view('site.articles', compact('posts', 'categories', 'category', 'lastArticles', 'projects'));
    }

    public function getPost($slug)
    {
        $categories = Category::all();
        $projects = Project::where('featured', true)->take(3)->get();
        $lastArticles = Post::latest()->take(3)->get();
        $post = Post::whereTranslation('seo_url_slug', $slug)->firstOrFail();
        $post->visits = $post->visits + 1;
        $post->save();

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->details);
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $post->categories->first()->title, 'property');
        SEOMeta::addKeyword($post->seo_keywords);

        OpenGraph::setDescription($post->details);
        OpenGraph::setTitle($post->title);
        OpenGraph::setUrl(route('post.details', $post->seo_url_slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'tr-TR');

        OpenGraph::addImage(pageImage($post->photo_file), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->details);
        JsonLd::setType('Article');

        return view('site.post', compact('post', 'categories', 'projects', 'lastArticles'));
    }

    public function citizenShipPage()
    {
        $topic = Topic::whereTranslationLike('seo_url_slug', '%news%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('news'));
            SEOTools::setCanonical(route('news'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword([$topic->seo_keywords]);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.citizenship', compact('topic'));
    }

    public function news()
    {
        $articles = \App\Models\Article::all();
        $topic = Topic::whereTranslationLike('seo_url_slug', '%news%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('news'));
            SEOTools::setCanonical(route('news'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword([$topic->seo_keywords]);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.news.index', compact('articles', 'topic'));
    }

    public function faqQuestions()
    {
        $faqQuestions = \App\Models\FaqQuestion::all();
        $topic = Topic::whereTranslationLike('seo_url_slug', '%faq%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('faqQuestion'));
            SEOTools::setCanonical(route('faqQuestion'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword($topic->seo_keywords);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.faq', compact('faqQuestions', 'topic'));
    }

    public function getNews($slug)
    {
        $article = Article::whereTranslation('seo_url_slug', $slug)->firstOrFail();
        return view('site.news.show', compact('article'));
    }

    public function about()
    {
        $topic = Topic::whereTranslationLike('seo_url_slug', '%about%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('about'));
            SEOTools::setCanonical(route('about'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword([$topic->seo_keywords]);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.aboutUs', compact('topic'));
    }

    public function contact()
    {
        $topic = Topic::whereTranslationLike('seo_url_slug', '%contact%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('contact'));
            SEOTools::setCanonical(route('contact'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword([$topic->seo_keywords]);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.contact', compact('topic'));

    }

    public function works()
    {
        $topic = Topic::whereTranslationLike('seo_url_slug', '%work%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('contact'));
            SEOTools::setCanonical(route('contact'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword([$topic->seo_keywords]);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.construction.index', compact('topic'));

    }

    public function services()
    {
        $topic = Topic::whereTranslationLike('seo_url_slug', '%services%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('services'));
            SEOTools::setCanonical(route('services'));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword($topic->seo_keywords);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.services');
    }

    public function service()
    {
        $topic = Topic::whereTranslationLike('seo_url_slug', '%Fine Touch Of Luxury%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('services/' . $topic->seo_slug));
            SEOTools::setCanonical(route('services/' . $topic->seo_slug));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword($topic->seo_keywords);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.service');
    }

    public function servicesVirtualTour()
    {
        $topic = Topic::whereTranslationLike('seo_url_slug', '%Virtual Tour 360%')->first();
        if ($topic) {
            SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
            SEOTools::setDescription($topic->seo_description);
            SEOTools::opengraph()->setUrl(route('services/' . $topic->seo_slug));
            SEOTools::setCanonical(route('services/' . $topic->seo_slug));
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite(config('settings.social_twitter'));
            SEOTools::jsonLd()->addImage($topic->photo_file);
            SEOMeta::addKeyword($topic->seo_keywords);
            $topic->visits = $topic->visits + 1;
            $topic->save();
        }
        return view('site.service-virtual-tour');
    }

    public function search(Request $request, $city = null)
    {
        $input = $request->all();
        $sections = \App\Models\Section::all();
        $queryProjects = Project::query();
        if ($request->property_type) {
            $queryProjects->where('category_id', $input['property_type']);
        }

        if ($request->city) {
            $queryProjects->whereIn('city', $input['city'] ?? $city);
        }

        if ($request->project_bedrooms) {
            if ($input['project_bedrooms'] < 6) {
                $queryProjects->where('project_bedrooms', $input['project_bedrooms']);
            } else {
                $queryProjects->where('project_bedrooms', '>=', $input['project_bedrooms']);
            }
        }

        $projects = $queryProjects->paginate(3);

        if($request->ajax()){
            $view = view('site.vendor.data',compact('projects'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('site.projects', compact('projects', 'sections'));
        //return \View::make('site.vendor.resaults', compact('projects'));

        /*$queryProjects = Project::query();
        $sections = Section::all();

        $key = $request->search_input;

        if ($key) {
            $projectResult = Project::where(function ($query) use ($key) {
                $query->whereTranslationLike('title', '%' . $key . '%')
                    ->orWhereTranslationLike('details', '%' . $key . '%');
            })->get();
            $postResult = Post::where(function ($query) use ($key) {
                $query->whereTranslationLike('title', '%' . $key . '%')
                    ->orWhereTranslationLike('details', '%' . $key . '%');
            })->get();

            return view('site.search', compact('projectResult', 'postResult', 'sections'));
        }
        if ($request->property_type) {
            $queryProjects->where('category_id', $input['property_type'])->get();
        }

        if ($request->city) {
            $queryProjects->where('city', $input['city'] ?? $city)->get();
        }

        if ($request->project_bedrooms) {
            if ($input['project_bedrooms'] < 6) {
                $queryProjects->where('project_bedrooms', $input['project_bedrooms'])->get();
            } else {
                $queryProjects->where('project_bedrooms', '>=', $input['project_bedrooms'])->get();
            }
        }
        $projectResult = $queryProjects->get();

        return view('site.search', compact('projectResult', 'sections'));*/
    }

    public function switchCurrency($currency)
    {
        Session::put('currency', $currency);
        return redirect()->back();
    }
}

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

class SiteController extends Controller
{
    public function landing()
    {
        $banners = \App\Models\Banner::orderBy('row_no')->get();
        $sections = \App\Models\Section::all();
        $projects = \App\Models\Project::where('featured',true)->get();
        $properties = \App\Models\Project::where('featured',false)->get();
        //$properties = \App\Models\Property::all()->take(6);
        $posts = \App\Models\Post::all();
        $news = \App\Models\Article::all();
        $topic = Topic::whereTranslationLike('title', '%home%')->first();
        if($topic){
          SEOTools::setTitle(config('settings.site_name') . ' | ' . $topic->seo_title);
          SEOTools::setDescription($topic->seo_description);
          SEOTools::opengraph()->setUrl(route('home'));
          SEOTools::setCanonical(route('home'));
          SEOTools::opengraph()->addProperty('type', 'articles');
          SEOTools::twitter()->setSite(config('settings.social_twitter'));
          SEOTools::jsonLd()->addImage($topic->photo_file);
          SEOMeta::addKeyword([$topic->seo_keywords]);
          $topic->visits = $topic->visits + 1;
          $topic->save();
        }

        return view('site.landing', compact('banners', 'sections', 'projects', 'properties', 'posts', 'news'));
    }

    public function projectList()
    {
        $projects = \App\Models\Project::all();
        $features = \App\Models\Feature::all();
        $sections = \App\Models\Section::all();
        $popProjects = \App\Models\Project::query()->get()->take(3);
        $topic = Topic::whereTranslationLike('title', '%projects%')->first();
        if($topic){
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
        return view('site.projects.index', compact('projects', 'features', 'sections', 'popProjects'));
    }

    public function getProject($slug)
    {
        $categories = Section::all();
        $project = Project::with('images')->whereTranslation('seo_url_slug', $slug)->firstOrFail();
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
        
        return view('site.projects.show', compact('project', 'categories'));
    }

    public function propertyList()
    {
        $properties = \App\Models\Property::all();
        $features = \App\Models\Feature::all();
        $sections = \App\Models\Section::all();
        $popProperties = \App\Models\Property::query()->get()->take(3);
        $topic = Topic::whereTranslationLike('title', '%properties%')->first();
        if($topic){
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
        $posts = \App\Models\Post::all();
        $categories = Category::all();
        $topic = Topic::whereTranslationLike('title', '%blog%')->first();
        if($topic){
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
        return view('site.blog.index', compact('posts', 'categories'));
    }

    public function getPost($slug)
    {
        $categories = Category::all();
        $post = Post::whereTranslation('seo_url_slug', $slug)->firstOrFail();
        $post->visits = $post->visits + 1;
        $post->save();

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->details);
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $post->categories->first()->title, 'property');
        SEOMeta::addKeyword([$post->seo_keywords]);

        OpenGraph::setDescription($post->details);
        OpenGraph::setTitle($post->title);
        OpenGraph::setUrl(route('post.details', $post->seo_url_slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'tr-TR');
        
        OpenGraph::addImage(asset('$post->photo_file'), ['height' => 300, 'width' => 300]);
        
        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->details);
        JsonLd::setType('Article');

        return view('site.blog.show', compact('post', 'categories'));
    }

    public function news()
    {
        $articles = \App\Models\Article::all();
        $topic = Topic::whereTranslationLike('seo_url_slug', '%news%')->first();
        if($topic){
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

    public function getNews($slug)
    {
        $article = Article::whereTranslation('seo_url_slug', $slug)->firstOrFail();
        return view('site.news.show', compact('article'));
    }

    public function about()
    {
        $topic = Topic::whereTranslationLike('seo_url_slug', '%about%')->first();
        if($topic){
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
        return view('site.about', compact('topic'));
    }

    public function contact()
    {
        $topic = Topic::whereTranslationLike('seo_url_slug', '%contact%')->first();
        if($topic){
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
        if($topic){
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

    public function contactSubmit()
    {

    }

    public function search(Request $request, $city = null)
    {
        $input = $request->all();
        $queryProperty = Property::query();
        $queryProjects = Project::query();
        $sections = Section::all();

        // For properties
        if ($request->price) {
            $array = explode(':', $input['price']); // Array of your values
            $min_price = $array[0];
            $max_price = $array[1];
        }

        if ($request->square) {
            $array2 = explode(':', $input['square']); // Array of your values
            $min_square = $array2[0];
            $max_square = $array2[1];
        }

        if (!empty($min_price) && !empty($max_price)) {
            $queryProperty->whereBetween('price', [$min_price, $max_price])->get();
            $queryProjects->whereBetween('lowest_price', [$min_price, $max_price])->get();
        }

        if (!empty($min_square) && !empty($max_square)) {
            $queryProperty->whereBetween('square', [$min_square, $max_square])->get();
            $queryProjects->whereBetween('square', [$min_square, $max_square])->get();
        }


        // If there more filter specification
        /*elseif (!empty($min_price)) {
            $properties = Property::where('price', '>=', $min_price)->get('price');
        } elseif (!empty($max_price)) {
            $properties = Property::where('price', '<=', $max_price)->get('price');
        }*/


        if ($request->type) {
            $queryProperty->where('category_id', $input['type'])->get();
            $queryProjects->where('category_id', $input['type'])->get();
        }

        if ($request->city) {
            $queryProperty->where('city', $input['city'] ?? $city)->get();
            $queryProjects->where('city', $input['city'] ?? $city)->get();
        }

        if ($request->rooms) {
            if ($input['rooms'] < 6) {
                $queryProperty->where('number_bedrooms', $input['rooms'])->get();
            } else {
                $queryProperty->where('number_bedrooms', '>=', $input['rooms'])->get();
            }
        }

        $properties = $queryProperty->get();
        $projects = $queryProjects->get();

        return view('site.search', compact('properties', 'projects', 'sections'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Setting;
use App\Traits\UploadAble;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\Sitemap\SitemapGenerator;

class SettingController extends Controller
{
    use UploadAble;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function toSitemap()
    {
        /*SitemapGenerator::create('https://turkeyadvisors.com')
            ->getSitemap()
            ->add(Url::create('/home')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1))
            ->writeToFile('sitemap.xml');*/
        $sitemap = Sitemap::create()
            ->add(Url::create('/about-us'))
            ->add(Url::create('/contact_us'));

        $posts = Post::all();
        foreach ($posts as $post) {
            $sitemap->add(Url::create("/post/{$post->slug}"));
        }
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }

    /**
     * @param Request $request
     * @param Factory $cache
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, Factory $cache)
    {

        $setting = Setting::first();


        if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {

            if ($setting->site_logo !== null) {
                $this->deleteOne($setting->site_logo);
            }
            $logo = $this->uploadOne($request->file('site_logo'), 'img');

            $setting->update(['site_logo' => $logo]);

        } elseif ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {

            if ($setting->site_favicon !== null) {
                $this->deleteOne($setting->site_favicon);
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
            $setting->update(['site_favicon' => $favicon]);

        } else {

            $keys = $request->except('_token');
            $setting->update($keys);
        }
        $cache->forget('settings');
        return redirect()->route('settings')->withSuccess(__('Setting updated Successfully!'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

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

    /**
     * @param Request $request
     * @param Factory $cache
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request,  Factory $cache)
    {

        $setting = Setting::first();


        if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {

            if ( $setting->site_logo !== null) {
                $this->deleteOne($setting->site_logo);
            }
            $logo = $this->uploadOne($request->file('site_logo'), 'img');

            $setting->update(['site_logo' => $logo]);

        } elseif ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {

            if ( $setting->site_favicon !== null) {
                $this->deleteOne( $setting->site_favicon );
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
            $setting->update(['site_favicon' => $favicon]);

        } else {

            $keys = $request->except('_token');
            $setting->update($keys);
        }
        $cache->forget('settings');
       return redirect()->route('settings')->withSuccess( __('Setting updated Successfully!') );
    }
}

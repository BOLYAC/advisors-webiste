<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\AboutUsPage;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AboutUsPageController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $aboutPage = AboutUsPage::first();
        return view('admin.aboutPage.about-page', compact('aboutPage'));

    }

    public function updatePage(Request $request)
    {
        $aboutUsPage = AboutUsPage::first();
        $request_data = $request->all();
        // Handle image Upload
        if ($request->has('about_us_image') && ($request->file('about_us_image') instanceof UploadedFile)) {

            $aboutUsImage = $this->uploadOne($request->file('about_us_image'), 'img/aboutPage');
            $request_data['about_us_image'] = $aboutUsImage;

        }
        if ($request->has('a_message_from_the_owners_image') && ($request->file('a_message_from_the_owners_image') instanceof UploadedFile)) {

            $messageOwnerImage = $this->uploadOne($request->file('a_message_from_the_owners_image'), 'img/aboutPage');
            $request_data['a_message_from_the_owners_image'] = $messageOwnerImage;

        }
        if ($request->has('our_mission_image') && ($request->file('our_mission_image') instanceof UploadedFile)) {

            $missionImage = $this->uploadOne($request->file('our_mission_image'), 'img/aboutPage');
            $request_data['our_mission_image'] = $missionImage;

        }

        if ($request->has('our_vision_image') && ($request->file('our_vision_image') instanceof UploadedFile)) {

            $visionImage = $this->uploadOne($request->file('our_vision_image'), 'img/aboutPage');
            $request_data['our_vision_image'] = $visionImage;

        }

        if ($request->has('team_image') && ($request->file('team_image') instanceof UploadedFile)) {

            $eamImage = $this->uploadOne($request->file('team_image'), 'img/aboutPage');
            $request_data['team_image'] = $eamImage;

        }

        // create new topic
        $request_data['status'] = $request->has('status') ? 1 : 0;

        $aboutUsPage->update($request_data);
        return redirect()->route('aboutPage.index')->withSuccess(__('About page updated Successfully!'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ServicePage;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ServicePageController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicesPage = ServicePage::first();
        return view('admin.servicePage.services-page', compact('servicesPage'));
    }

    public function updatePage(Request $request)
    {
        $servicesPage = ServicePage::first();
        $request_data = $request->all();
        // Handle image Upload
        if ($request->has('first_image') && ($request->file('first_image') instanceof UploadedFile)) {

            $firstImage = $this->uploadOne($request->file('first_image'), 'img/servicesPage');
            $request_data['first_image'] = $firstImage;

        }
        if ($request->has('second_image') && ($request->file('second_image') instanceof UploadedFile)) {

            $secondImage = $this->uploadOne($request->file('second_image'), 'img/servicesPage');
            $request_data['second_image'] = $secondImage;

        }
        if ($request->has('third_image') && ($request->file('third_image') instanceof UploadedFile)) {

            $thirdImage = $this->uploadOne($request->file('third_image'), 'img/servicesPage');
            $request_data['third_image'] = $thirdImage;

        }

        if ($request->has('fourth_image') && ($request->file('fourth_image') instanceof UploadedFile)) {

            $fourthImage = $this->uploadOne($request->file('fourth_image'), 'img/servicesPage');
            $request_data['fourth_image'] = $fourthImage;

        }

        if ($request->has('fifth_image') && ($request->file('fifth_image') instanceof UploadedFile)) {

            $fifthImage = $this->uploadOne($request->file('fifth_image'), 'img/servicesPage');
            $request_data['fifth_image'] = $fifthImage;

        }

        if ($request->has('sixth_image') && ($request->file('sixth_image') instanceof UploadedFile)) {

            $sixthImage = $this->uploadOne($request->file('sixth_image'), 'img/servicesPage');
            $request_data['sixth_image'] = $sixthImage;

        }
        if ($request->has('seventh_image') && ($request->file('seventh_image') instanceof UploadedFile)) {

            $seventhImage = $this->uploadOne($request->file('seventh_image'), 'img/servicesPage');
            $request_data['seventh_image'] = $seventhImage;

        }

        // create new topic
        $request_data['status'] = $request->has('status') ? 1 : 0;

        $servicesPage->update($request_data);
        return redirect()->route('servicesPage.index')->withSuccess(__('About page updated Successfully!'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data = $request->except('_token');

        $next_nor_no = User::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }

        $request_data['row_no'] = $next_nor_no;
        $request_data['status'] = $request->has('status') ? 1 : 0;
        $request_data['created_by'] = Auth::id();
        $request_data['password'] = '123456';
        // Handle image Upload
        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {
            $categoryImage = $this->uploadOne($request->file('photo_file'), 'img/users');
            $request_data['photo_file'] = $categoryImage;
        }

        User::create($request_data);
        return redirect()->route('users.index')->withSuccess(__('User created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request_data = $request->except('_token');

        if ($request->has('photo_file') && ($request->file('photo_file') instanceof UploadedFile)) {

            $categoryImage = $this->uploadOne($request->file('photo_file'), 'img/testimonials');

            $request_data['photo_file'] = $categoryImage;

        }

        // create new topic
        $request_data['updated_by'] = Auth::id();
        $request_data['status'] = $request->has('status') ? 1 : 0;

        $user->update($request_data);
        return redirect()->route('users.index')->withSuccess(__('User updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

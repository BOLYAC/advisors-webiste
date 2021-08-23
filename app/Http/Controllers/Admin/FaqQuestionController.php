<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqQuestions = FaqQuestion::all();
        return view('admin.faqQuestions.index', compact('faqQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqQuestions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data = $request->all();

        $next_nor_no = FaqQuestion::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }
        $request_data['row_no'] = $next_nor_no;
        $request_data['created_by'] = Auth::id();
        $request_data['status'] = $request->has('status') ? 1 : 0;

        FaqQuestion::create($request_data);
        return redirect()->route('faqQuestions.index')->withSuccess(__('Faq Created Successfully!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FaqQuestion $faqQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqQuestion $faqQuestion)
    {
        return view('admin.faqQuestions.edit', compact('faqQuestion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FaqQuestion $faqQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaqQuestion $faqQuestion)
    {
        $request_data = $request->all();
        // create new topic
        $request_data['status'] = $request->has('status') ? 1 : 0;
        $request_data['updated_by'] = Auth::id();
        $faqQuestion->update($request_data);
        return redirect()->route('faqQuestions.index')->withSuccess(__('Faq updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FaqQuestion $faqQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaqQuestion $faqQuestion)
    {
        $faqQuestion->delete();
        return redirect()->route('faqQuestions.index')->withSuccess(__('Faq deleted Successfully!'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:job-category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_category = JobCategory::all();
        return response()->json(['job_category' => $job_category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_category' => 'required|string'
        ]);

        $job_category = JobCategory::create($request->all());

        return response()->json([
            'message' => 'success to add job category',
            'job_category' => $job_category
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function show(JobCategory $jobCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCategory $jobCategory)
    {
        return response()->json(['job_category' => $jobCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobCategory $jobCategory)
    {
        $request->validate([
            'job_category' => 'required|string'
        ]);

        $jobCategory->update($request->all());
        
        return response()->json([
            'message' => 'success to update job category',
            'job_category' => $jobCategory,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();
        return response()->json([
            'message' => 'success to delete job category',
        ], 201);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JobDivisi;
use Illuminate\Http\Request;

class JobDivisiController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:job-divisi');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_divisi  = JobDivisi::all();
        return response()->json(['job_divisi' => $job_divisi ]);
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
            'job_divisi' => 'required|string'
        ]);

        $job_divisi = JobDivisi::create($request->all());

        return response()->json([
            'message' => 'success to add job category',
            'job_divisi' => $job_divisi
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobDivisi  $jobDivisi
     * @return \Illuminate\Http\Response
     */
    public function show(JobDivisi $jobDivisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobDivisi  $jobDivisi
     * @return \Illuminate\Http\Response
     */
    public function edit(JobDivisi $jobDivisi)
    {
        return response()->json(['job_divisi' => $jobDivisi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobDivisi  $jobDivisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobDivisi $jobDivisi)
    {
        $request->validate([
            'job_divisi' => 'required|string'
        ]);

        $jobDivisi->update($request->all());
        
        return response()->json([
            'message' => 'success to update job category',
            'job_divisi' => $jobDivisi,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobDivisi  $jobDivisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobDivisi $jobDivisi)
    {
        $jobDivisi->delete();
        return response()->json([
            'message' => 'success to delete job divisi',
        ], 201);
    }
}

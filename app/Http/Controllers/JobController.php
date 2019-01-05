<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Job;
use App\SavedJob;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest())
        {
            return redirect('/profiles')->with('error', 'You must be logged in to view Jobs');
        }
        $ss = new SecurityService();
        if($ss->getSuspended(auth()->user()->id))
        {
            return redirect('/profiles')->with('error', 'You are suspended, you cannot view Jobs');
        }
        $jobs = DB::table('jobs')->orderBy('id', 'asc')->paginate(10);
        return view('jobs.jobs')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = $_POST["company"];
        $role = $_POST["role"];
        $desc = $_POST["description"];
        $skill = $_POST["skill"];
        $type = $_POST["type"];

        $job = DB::table('jobs')->insert(['company' => $company, 
        'role' => $role, 'description' => $desc, 'skill1' => $skill, 'type' => $type]);
        return redirect('jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id;
        $job = DB::table('jobs')->where('id', $id)->get();
        //$job = Job::where()->get();
        $jobList = DB::table('joblist')->where('user_id', $user_id)->where('job_id', $id)->count();
        $applicants = SavedJob::where('job_id', $id)->orderBy('id', 'asc')->paginate(10);
        return view('jobs.show_job', ['job' => $job, 'jobList' => $jobList, 'applicants' => $applicants]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

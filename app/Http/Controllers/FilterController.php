<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Profile;

class FilterController extends Controller
{
    public function filterJobs()
    {
        $key = $_POST["key"];
        $type = $_POST["type"];
        if($key != "" || $key != NULL) 
        {
            $jobs = DB::table('jobs')->orderBy('id', 'asc')->where('skill1', $key)->paginate(10);
        }
        else if($type != "" || $type != NULL)
        {
            $jobs = DB::table('jobs')->orderBy('id', 'asc')->where('type', $type)->paginate(10);
        }
        else
            $jobs = DB::table('jobs')->orderBy('id', 'asc')->where('skill1', $key)->where('type', $type)->paginate(10);
        return view('jobs.jobs')->with('jobs', $jobs);
    }

    public function filterUsers()
    {
        $key = $_POST["skill"];
        //fix, skills are in skill table not profile
        $users = Profile::orderBy('id', 'asc')->where('skill1', $key)->orWhere('skill2', $key)->orWhere('skill3', $key)->orWhere('skill4', $key)->orWhere('skill5', $key)->paginate(10);
        return view('profiles.index')->with('users', $users);
    }
}
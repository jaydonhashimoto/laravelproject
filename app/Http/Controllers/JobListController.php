<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Profile;

class JobListController extends Controller
{
    public function addToList()
    {
        $job_id = $_POST["job"];
        $user_id = auth()->user()->id;
        $ss = new SecurityService();
        if($ss->addJobList($job_id))
        {
            return redirect('/home');
        }
    }

    public function removeFromList() 
    {
        $job_id = $_POST["job"];
        $user_id = auth()->user()->id;
        $ss = new SecurityService();
        if($ss->removeJobList($job_id))
        {
            return redirect('/home');
        }
    }
}
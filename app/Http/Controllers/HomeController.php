<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Business\SecurityService;
use App\Skill;
use App\SavedJob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ss = new SecurityService();
        $users = DB::table('users')->get();
        $user_id = auth()->user()->id;

        if($ss->getSuspended($user_id) == true)
        {
            return view('suspended');
        }

        if($ss->isAdmin() == true)
        {
            //put all db stuff in sdao
            $suspended = DB::table('suspends')->get();
            $susIfNull = DB::table('suspends')->count();
            if($susIfNull == NULL)
            {
                $suspended = NULL;
            }
            return view('admin', ['users' => $users], ['suspended' => $suspended]);
        }

        else 
        {
            $users = NULL;
            $profile = DB::table('profiles')->where('user_id', $user_id)->get();
            $skills = Skill::where('user_id', $user_id)->get();
            $experience = DB::table('experience')->where('user_id', $user_id)->get();
            $experience2 = DB::table('experience2')->where('user_id', $user_id)->get();
            $education = DB::table('education')->where('user_id', $user_id)->get();
            $joblist = SavedJob::where('user_id', $user_id)->get();

            return view('home', ['users' => $users, 'skills' => $skills, 'profile' => $profile, 
            'experience' => $experience, 'experience2' => $experience2, 'education' => $education,
            'job' => $joblist]);
        }
    }
}

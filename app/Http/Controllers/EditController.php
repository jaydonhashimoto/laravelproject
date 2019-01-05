<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Business\SecurityService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Skill;

class EditController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $ss = new SecurityService();
        if(Auth::guest())
        {
            return redirect('/home')->with('error', 'Guests cannot edit');
        }
        $ss = new SecurityService();
        if($ss->getSuspended($user_id))
        {
            return redirect('/home')->with('error', 'Suspended users cannot edit');
        }
        $skills = Skill::where('user_id', $user_id)->get();
        $profileCount = DB::table('profiles')->where('USER_ID', $user_id)->count();
        $profile =  DB::table('profiles')->where('USER_ID', $user_id)->get();
        $experience = DB::table('experience')->where('user_id', $user_id)->get();
        $experience2 = DB::table('experience2')->where('user_id', $user_id)->get();
        $education = DB::table('education')->where('user_id', $user_id)->get();
        return view('edit', ['skills' => $skills, 'profileCount' => $profileCount, 'profile' => $profile,
        'experience' => $experience, 'experience2' => $experience2, 'education' => $education]);   
    }

    public function insert(Request $request)
    {
        $bio = $_POST["bio"];
        $skill1 = $_POST["skill1"];
        $skill2 = $_POST["skill2"];
        $skill3 = $_POST["skill3"];
        $skill4 = $_POST["skill4"];
        $skill5 = $_POST["skill5"];
        $company = $_POST["company"];
        $company2 = $_POST["company2"];
        $job = $_POST["job"];
        $job2 = $_POST["job2"];
        $description = $_POST["description"];
        $description2 = $_POST["description2"];
        $start_month = $_POST["start_month"];
        $start_month2 = $_POST["start_month2"];
        $start_year = $_POST["start_year"];
        $start_year2 = $_POST["start_year2"];
        $end_month = $_POST["end_month"];
        $end_month2 = $_POST["end_month2"];
        $end_year = $_POST["end_year"];
        $end_year2 = $_POST["end_year2"];
        $school = $_POST["school"];
        $degree = $_POST["degree"];
        $school_start_year = $_POST["school_start_year"];
        $school_end_year = $_POST["school_end_year"];
        
        //get image
        if($request->hasFile('user_pic'))
        {
            $filenameWithExt = $request->file('user_pic')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('user_pic')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('user_pic')->storeAs('public/user_pics', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $pic = $fileNameToStore;
        $ss = new SecurityService();
        if($ss->insertSkills($skill1, $skill2, $skill3, $skill4, $skill5) && 
            $ss->insertProfile($bio, $pic) &&
            $ss->insertExperience($company, $job, $description, $start_month, $start_year, $end_month, $end_year) &&
            $ss->insertExperience2($company2, $job2, $description2, $start_month2, $start_year2, $end_month2, $end_year2) &&
            $ss->insertEducation($school, $degree, $school_start_year, $school_end_year))
        {
            return redirect()->action('HomeController@index')->with('success', 'Profile Created');
        }
        else
            return redirect()->action('HomeController@index')->with('error', 'Failed to create profile'); 
    }

    public function update(Request $request)
    {
        $bio = $_POST["bio"];
        $skill1 = $_POST["skill1"];
        $skill2 = $_POST["skill2"];
        $skill3 = $_POST["skill3"];
        $skill4 = $_POST["skill4"];
        $skill5 = $_POST["skill5"];
        $company = $_POST["company"];
        $company2 = $_POST["company2"];
        $job = $_POST["job"];
        $job2 = $_POST["job2"];
        $description = $_POST["description"];
        $description2 = $_POST["description2"];
        $start_month = $_POST["start_month"];
        $start_month2 = $_POST["start_month2"];
        $start_year = $_POST["start_year"];
        $start_year2 = $_POST["start_year2"];
        $end_month = $_POST["end_month"];
        $end_month2 = $_POST["end_month2"];
        $end_year = $_POST["end_year"];
        $end_year2 = $_POST["end_year2"];
        $school = $_POST["school"];
        $degree = $_POST["degree"];
        $school_start_year = $_POST["school_start_year"];
        $school_end_year = $_POST["school_end_year"];

        //do ss and dao
        
        //$this->validate($request, [
        //    'user_pic' => 'nullable|max:20000|mimes:jpg,png,gif,jpeg'
        //]);

        //get image
        if($request->hasFile('user_pic'))
        {
            $filenameWithExt = $request->file('user_pic')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('user_pic')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('user_pic')->storeAs('public/user_pics', $fileNameToStore);
        
            $pic = $fileNameToStore;
            $ss = new SecurityService();
            if($ss->updateSkills($skill1, $skill2, $skill3, $skill4, $skill5) &&
                $ss->updateProfile1($bio, $pic) &&
                $ss->updateExperience($company, $job, $description, $start_month, $start_year, $end_month, $end_year) &&
                $ss->updateExperience2($company2, $job2, $description2, $start_month2, $start_year2, $end_month2, $end_year2) &&
                $ss->updateEducation($school, $degree, $school_start_year, $school_end_year))
            {
                return redirect()->action('HomeController@index')->with('success', 'Profile Updated');
            }
            else
                return redirect()->action('HomeController@index')->with('error', 'Failed to updated profile'); 
        }
        else
        {
            $ss = new SecurityService();
            if($ss->updateSkills($skill1, $skill2, $skill3, $skill4, $skill5) &&
                $ss->updateProfile($bio) &&
                $ss->updateExperience($company, $job, $description, $start_month, $start_year, $end_month, $end_year) &&
                $ss->updateExperience2($company2, $job2, $description2, $start_month2, $start_year2, $end_month2, $end_year2) &&
                $ss->updateEducation($school, $degree, $school_start_year, $school_end_year))
            {
                return redirect()->action('HomeController@index')->with('success', 'Profile Updated');
            }
            else
                return redirect()->action('HomeController@index')->with('error', 'Failed to updated profile'); 
        }
    
    }
}


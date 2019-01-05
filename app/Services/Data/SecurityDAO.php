<?php
namespace App\Services\Data;
use Illuminate\Support\Facades\DB;
use App\Profile;
use Illuminate\Support\Facades\Storage;

class SecurityDAO
{
    public function SecurityDAO() {}

    //put each in a try catch

    public function getAdmin()
    {
        $id = auth()->user()->id;
        //$selectSQL = DB::select('SELECT (USERNAME, PASSWORD) FROM users WHERE USERNAME = ? AND PASSWORD = ?',[$username, $password]);
        $sqlAdmin = DB::table('roles')->where('ID', $id)->count();
        
        if($sqlAdmin == 1)
        {
            return true;
        }
        else
            return false;
    }

    public function deleteUser($id)
    {
        $userProfile = $this->getProfile($id);
        if($userProfile[0]->user_pic != 'noimage.jpg')
        {
            Storage::delete('/public/user_pics/'.$userProfile[0]->user_pic);
        }
        $sqlDelete = DB::table('users')->where('ID', $id)->delete();
        $sqlDeleteProfile =  DB::table('profiles')->where('user_id', $id)->delete();
        $sqlDeleteSkills = DB::table('skills')->where('user_id', $id)->delete();
        $sqlDeleteSuspends = DB::table('suspends')->where('user_id', $id)->delete();
        $sqlDeleteExp = DB::table('experience')->where('user_id', $id)->delete();
        $sqlDeleteExp2 = DB::table('experience2')->where('user_id', $id)->delete();
        $sqlDeleteEdu = DB::table('education')->where('user_id', $id)->delete();
        return true;
    }

    public function suspendUser($id)
    {
        $sqlInsert = DB::table('suspends')->insert(['USER_ID' => $id]);
        return true;
    }

    public function getSuspendedUser($id)
    {
        $sqlSuspended = DB::table('suspends')->where('USER_ID', $id)->count();
        if($sqlSuspended == 1)
        {
            return true;
        }
        else 
            return false;
    }

    public function getSuspendedUserNum($id)
    {
        $sqlSuspended = DB::table('suspends')->where('USER_ID', $id)->count();
        if($sqlSuspended == 1)
        {
            return $sqlSuspended;
        }
        else 
            return 0;
    }

    public function deleteSuspended($id)
    {
        $sqlDelete = DB::table('suspends')->where('USER_ID', $id)->delete();
        return true;
    }

    public function getSuspended()
    {
        $suspended = DB::table('suspends')->get();
        return $suspended;
    }

    public function getSuspendedNum() 
    {
        $susIfNull = DB::table('suspends')->count();
        return $susIfNull;
    }

    public function getProfileCount()
    {
        $profile = DB::table('profiles')->where('user_id', $user_id)->count();
        return $profile;
    }

    public function insertSkills($s1, $s2, $s3, $s4, $s5)
    {   
        $user_id = auth()->user()->id;
        $sqlInsert = DB::table('skills')->insert(['skill1' => $s1, 'skill2' => $s2, 'skill3' => $s3, 
        'skill4' => $s4, 'skill5' => $s5, 'user_id' => $user_id]);
        return true;
    }

    public function insertUserProfile($bio, $pic)
    {
        $user_id = auth()->user()->id;
        $sqlInsert = DB::table('profiles')->insert(['user_id' => $user_id, 'bio' => $bio, 'user_pic' => $pic]);
        return true;
    }

    public function insertUserExperience($comp, $job, $desc, $sm, $sy, $em, $ey)
    {
        $user_id = auth()->user()->id;
        $sqlInsert = DB::table('experience')->insert(['company' => $comp, 'job' => $job, 'description' => $desc, 'start_month' => $sm,
        'start_year' => $sy, 'end_month' => $em, 'end_year' => $ey, 'user_id' => $user_id]);
        return true;
    }

    public function insertUserExperience2($comp, $job, $desc, $sm, $sy, $em, $ey)
    {
        $user_id = auth()->user()->id;
        $sqlInsert = DB::table('experience2')->insert(['company' => $comp, 'job' => $job, 'description' => $desc, 'start_month' => $sm,
        'start_year' => $sy, 'end_month' => $em, 'end_year' => $ey, 'user_id' => $user_id]);
        return true;
    }

    public function insertUserEducation($sch, $deg, $sy, $ey)
    {
        $user_id = auth()->user()->id;
        $sqlInsert = DB::table('education')->insert(['school' => $sch, 'degree' => $deg, 'start_year' => $sy, 'end_year' => $ey,
        'user_id' => $user_id]);
        return true;
    }

    public function updateSkills($s1, $s2, $s3, $s4, $s5)
    {
        $user_id = auth()->user()->id;
        $sqlInsert = DB::table('skills')->where('user_id', $user_id)->update(['skill1' => $s1, 'skill2' => $s2, 'skill3' => $s3, 
        'skill4' => $s4, 'skill5' => $s5]);
        return true;
    }

    public function updateUserExperience($comp, $job, $desc, $sm, $sy, $em, $ey)
    {
        $user_id = auth()->user()->id;
        $sqlUpdate = DB::table('experience')->where('user_id', $user_id)->update(['company' => $comp, 'job' => $job, 'description' => $desc, 'start_month' => $sm,
        'start_year' => $sy, 'end_month' => $em, 'end_year' => $ey]);
        return true;
    }

    public function updateUserExperience2($comp, $job, $desc, $sm, $sy, $em, $ey)
    {
        $user_id = auth()->user()->id;
        $sqlUpdate = DB::table('experience2')->where('user_id', $user_id)->update(['company' => $comp, 'job' => $job, 'description' => $desc, 'start_month' => $sm,
        'start_year' => $sy, 'end_month' => $em, 'end_year' => $ey]);
        return true;
    }

    public function updateUserEducation($sch, $deg, $sy, $ey)
    {
        $user_id = auth()->user()->id;
        $sqlInsert = DB::table('education')->where('user_id', $user_id)->update(['school' => $sch, 'degree' => $deg, 
        'start_year' => $sy, 'end_year' => $ey]);
        return true;
    }

    public function updateUserProfile($bio)
    {
        $user_id = auth()->user()->id;
        $sqlUpdate = DB::table('profiles')->where('user_id', $user_id)->update(['bio' => $bio]);
        return true;
    }

    public function updateUserProfile1($bio, $pic)
    {
        $user_id = auth()->user()->id;
        $userProfile = $this->getProfile($user_id);
        if($userProfile[0]->user_pic != 'noimage.jpg')
        {
            Storage::delete('public/user_pics/'.$userProfile[0]->user_pic);
        }
        $sqlUpdate = DB::table('profiles')->where('user_id', $user_id)->update(['bio' => $bio, 'user_pic' => $pic]);
        return true;
    }

    public function getProfile($id)
    {
        $profile = DB::table('profiles')->where('user_id', $id)->get();
        return $profile;
    }

    public function addGroup($name, $desc)
    {
        $sqlInsert = DB::table('groups')->insert(['name' => $name, 'description' => $desc]);
        return true;
    }

    public function addJobList($job_id)
    {
        $user_id = auth()->user()->id;
        $insert = DB::table('joblist')->insert(['job_id' => $job_id, 'user_id' => $user_id]);
        return true;
    }

    public function removeJobList($job_id)
    {
        $user_id = auth()->user()->id;
        $remove = DB::table('joblist')->where('job_id', $job_id)->where('user_id', $user_id)->delete();
        return true;
    }
}
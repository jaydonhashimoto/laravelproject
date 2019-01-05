<?php
namespace App\Services\Business;

use App\Services\Data\SecurityDAO;

class SecurityService
{
    public function SecurityService(){}

    public function isAdmin()
    {
       $dao = new SecurityDAO();
       if($dao->getAdmin() == true)
       {
           return true;
       }
       else 
        return false;
    }

    public function deleteUser($id)
    {
        $dao = new SecurityDAO();
        if($dao->deleteUser($id))
        {
            return true;
        }
        else
            return false;
    }

    public function suspendUser($id)
    {
        $dao = new SecurityDAO();
        if($dao->suspendUser($id))
        {
            return true;
        }
        else
            return false;
    }

    public function getSuspended($id)
    {
        $dao = new SecurityDAO();
        if($dao->getSuspendedUser($id))
        {
            return true;
        }
        else
            return false;
    }

    public function getSuspendedNum($id)
    {
        $dao = new SecurityDAO();
        if($dao->getSuspendedUser($id))
        {
            return $dao->getSuspendedUser($id);
        }
        else
            return 0;
    }

    public function unsuspendUser($id)
    {
        $dao = new SecurityDAO();
        if($dao->deleteSuspended($id))
        {
            return true;
        }
        else
            return false;
    }

    public function insertSkills($s1, $s2, $s3, $s4, $s5)
    {
        $dao = new SecurityDAO();
        if($dao->insertSkills($s1, $s2, $s3, $s4, $s5))
        {
            return true;
        }
        else return false;
    }

    public function insertExperience($comp, $job, $desc, $sm, $sy, $em, $ey)
    {
        $dao = new SecurityDAO();
        if($dao->insertUserExperience($comp, $job, $desc, $sm, $sy, $em, $ey))
        {
            return true;
        }
        else return false;
    }

    public function insertExperience2($comp, $job, $desc, $sm, $sy, $em, $ey)
    {
        $dao = new SecurityDAO();
        if($dao->insertUserExperience2($comp, $job, $desc, $sm, $sy, $em, $ey))
        {
            return true;
        }
        else return false;
    }

    public function insertEducation($sch, $deg, $sy, $ey)
    {
        $dao = new SecurityDAO();
        if($dao->insertUserEducation($sch, $deg, $sy, $ey))
        {
            return true;
        }
        else return false;
    }

    public function insertProfile($bio, $pic)
    {
        $dao = new SecurityDAO();
        if($dao->insertUserProfile($bio, $pic))
        {
            return true;
        }
        else return false;
    }

    public function updateSkills($skill1, $skill2, $skill3, $skill4, $skill5)
    {
        $dao = new SecurityDAO();
        if($dao->updateSkills($skill1, $skill2, $skill3, $skill4, $skill5))
        {
            return true;
        }
        else
            return false;       
    }

    public function updateExperience($comp, $job, $desc, $sm, $sy, $em, $ey)
    {
        $dao = new SecurityDAO();
        if($dao->updateUserExperience($comp, $job, $desc, $sm, $sy, $em, $ey))
        {
            return true;
        }
        else
            return false; 
    }

    public function updateExperience2($comp, $job, $desc, $sm, $sy, $em, $ey)
    {
        $dao = new SecurityDAO();
        if($dao->updateUserExperience2($comp, $job, $desc, $sm, $sy, $em, $ey))
        {
            return true;
        }
        else
            return false; 
    }

    public function updateEducation($sch, $deg, $sy, $ey)
    {
        $dao = new SecurityDAO();
        if($dao->updateUserEducation($sch, $deg, $sy, $ey))
        {
            return true;
        }
        else
            return false; 
    }

    public function updateProfile($bio)
    {
        $dao = new SecurityDAO();
        if($dao->updateUserProfile($bio))
        {
            return true;
        }
        else return false;
    }

    public function updateProfile1($bio, $pic)
    {
        $dao = new SecurityDAO();
        if($dao->updateUserProfile1($bio, $pic))
        {
            return true;
        }
        else return false;
    }

    public function getProfile($id)
    {
        $dao = new SecurityDAO();
        return $dao->getProfile($id);
    }

    public function addGroup($name, $desc)
    {
        $dao = new SecurityDAO();
        if($dao->addGroup($name, $desc))
        {
            return true;
        }
        else return false;
    }

    public function addJobList($job_id)
    {
        $dao = new SecurityDAO();
        if($dao->addJobList($job_id))
        {
            return true;
        }
        else return false;
    }

    public function removeJobList($job_id)
    {
        $dao = new SecurityDAO();
        if($dao->removeJobList($job_id))
        {
            return true;
        }
        else return false;
    }
}
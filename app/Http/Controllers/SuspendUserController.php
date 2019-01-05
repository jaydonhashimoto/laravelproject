<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Business\SecurityService;


class SuspendUserController extends Controller
{
    public function SuspendUserController(){}

    public function index($id)
    {
        //suspend user
        $ss = new SecurityService();
        if($ss->suspendUser($id))
        {
            return redirect()->action('HomeController@index');
        }
    }

    public function isSuspended($id)
    {
        $ss = new SecurityService();
        if($ss->getSuspended($id))
        {
            return true;
        }
        else
            return false;
    }

    public function unsuspend($id)
    {
        $ss = new SecurityService();
        if($ss->unsuspendUser($id))
        {
            return redirect()->action('HomeController@index');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use Illuminate\Support\Facades\DB;

class UserGroupController extends Controller
{
    public function addToGroup()
    {
        $user_id = $_POST["user_id"];
        $group_id = $_POST["group_id"];
        $insert = DB::table('groupmembers')->insert(['user_id' => $user_id, 'group_id' => $group_id]);
        return redirect()->action('GroupController@index');
    }

    public function removeFromGroup()
    {
        $user_id = $_POST["user_id"];
        $group_id = $_POST["group_id"];
        $delete = DB::table('groupmembers')->where(['group_id' => $group_id, 'user_id' => $user_id])->delete();
        return redirect()->action('GroupController@index');
    }
}

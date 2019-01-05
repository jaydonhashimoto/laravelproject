<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\GroupMember;

class GroupController extends Controller
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
            return redirect('/profiles')->with('error', 'You must be logged in to view Groups');
        }
        $ss = new SecurityService();
        if($ss->getSuspended(auth()->user()->id))
        {
            return redirect('/profiles')->with('error', 'You are suspended, you cannot view Groups');
        }
        $groups = DB::table('groups')->orderBy('id', 'asc')->paginate(10);
        return view('groups.groups')->with('groups', $groups);
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
        $name = $_POST["name"];
        $desc = $_POST["description"];

        $ss = new SecurityService();
        if($ss->addGroup($name, $desc))
        {
            return redirect()->action('GroupController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ss = new SecurityService();
        $admin = $ss->isAdmin();

        $group = DB::table('groups')->where('id', $id)->get();
        $member = DB::table('groupmembers')->where(['group_id' => $id, 'user_id' => auth()->user()->id])->count();
        $groupmembers = GroupMember::where('group_id', $id)->get();
        return view('groups.show_group', ['group' => $group, 'member' => $member, 'admin' => $admin, 'groupmembers' => $groupmembers]);
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
        $group_id = $_POST["group_id"];
        $name = $_POST["name"];
        $description = $_POST["description"];

        $update = DB::table('groups')->where('id', $group_id)->update(['name' => $name, 'description' => $description]);
        return redirect()->action('GroupController@index');
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

    public function redirectToUser($id)
    {
        return redirect()->action('profiles');
    }
}

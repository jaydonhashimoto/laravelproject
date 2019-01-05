<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Business\SecurityService;


class DeleteUserController extends Controller
{

    public function index($id)
    {
        //delete user
        //$sqlDelete = DB::table('users')->where('ID', $id)->delete();
        $ss = new SecurityService();
        if($ss->deleteUser($id))
        {
            return redirect()->action('HomeController@index');
        }
    }
}
?>
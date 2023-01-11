<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    public function login(Request $request){

        $email = $request->email;
        $password = md5($request->password);
        $sql = "SELECT * FROM members WHERE email='".$email."' AND passwd='".$password."' AND status='active'";
        // echo $sql;
        $result = DB::select(DB::raw($sql));
        return response()->json([
            'search' => $result
        ]);
    }
}

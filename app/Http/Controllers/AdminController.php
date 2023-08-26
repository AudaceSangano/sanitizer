<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function collectorRegister(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'fname' => ['required'],
            'lname' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        $data = [
            'name' => $request->fname.' '.$request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ];

        DB::table('users')->insert($data);

        return back()->withErrors([
            'user_error' => 'Successful user registered.',
        ]);
    }

    public function collectorRemove($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return back()->withErrors([
            'user_error' => 'Successful user Deleted.',
        ]);
    }

    public function getTank()
    {
        $result = DB::table('dust_status')->where('st_category', '0')->first();
        $status = $result->st_status;

        return response()->json(['status' => $status]);
    }

    public function getTankOne()
    {
        $result = DB::table('dust_status')->where('st_category', '1')->first();
        $status = $result->st_status;

        return response()->json(['status' => $status]);
    }

    public function dryUpdate($status)
    {
        $results = DB::table('dust_status')->where('st_category', '0')->update(
            [
                'st_status' => $status
            ]
        );

        if ($results) {
            return response()->json(['status' => 'Successfull'], 200);
        }else {
            return response()->json(['status' => 'Fail'], 500);
        }
    }

    public function wetUpdate($status)
    {
        $results = DB::table('dust_status')->where('st_category', '1')->update(
            [
                'st_status' => $status
            ]
        );

        if ($results) {
            return response()->json(['status' => 'Successfull'], 200);
        }else {
            return response()->json(['status' => 'Fail'], 500);
        }
    }
}

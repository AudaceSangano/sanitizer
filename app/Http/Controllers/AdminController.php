<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\AudaceEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

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

    public function getTank($key)
    {
        $result = DB::table('dust_status')->where('st_id', $key)->first();
        $status = $result->st_status;
        return response()->json(['status' => $status]);
    }

    public function dryUpdate($status, $id)
    {
        $results = DB::table('dust_status')->where('st_id', $id)->update(
            [
                'st_status' => $status
            ]
        );

        if ($status=='full') {
            DB::table('report')->insert([
                'rp_dust' => $id
            ]);
            $currentDateTime = Carbon::now();
            $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
            $result = DB::table('dust_status')->where('st_id', $id)->first();
            $data = [
                'address' => $result->address,
                'category' => $result->st_category==1?'Wet waste':'Dry waste',
                'time' => $formattedDateTime,
            ];

            $email = new AudaceEmail($data);

            $users = DB::table('users')->where('role_id', 2)->get();

            foreach ($users as $user) {
            Mail::to($user->email)->send($email);
            }
        }

        if ($results) {
            return response()->json(['status' => 'Successfull'], 200);
        }else {
            return response()->json(['status' => 'Fail'], 500);
        }
    }

    public function dustRegister(Request $request)
    {
        $data = [
            'address' => $request->location,
            'st_category' => $request->type,
        ];

        DB::table('dust_status')->insert($data);

        return back()->withErrors([
            'user_error' => 'Successful Dustbin registered.',
        ]);
    }
    public function dustUpdate(Request $request)
    {
        $data = [
            'address' => $request->location,
            'st_category' => $request->type,
        ];

        DB::table('dust_status')->where('st_id', $request->id)->update($data);

        return back()->withErrors([
            'user_error' => 'Successful Dustbin Updated.',
        ]);
    }
    public function dustRemove($id)
    {
        DB::table('dust_status')->where('st_id', $id)->delete();

        return back()->withErrors([
            'user_error' => 'Successful Dustbin Deleted.',
        ]);
    }

    public function dustUpdateForm($id) {
        $data = DB::table('dust_status')->where('st_id', $id)->first();
        return view('layout.dustupdate',compact('data'));
    }

    public function dustview($dust) {
        $status = DB::table('dust_status')->where('st_id', $dust)->first()->st_status;
        $id = $dust;
        return view('layout.live',compact('status', 'id'));
    }

    public function report() {
        $data = DB::table('dust_status')
                ->get();
        return view('layout.report', compact('data'));
    }
}

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
            'telephone' => ['required'],
        ]);

        $data = [
            'name' => $request->fname.' '.$request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'telephone' => $request->telephone,
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

    public function dryUpdate(Request $request)
    {
        $status = $request->status;
        $id = $request->id;
        $results = DB::table('dust_status')->where('st_id', $id)->update(
            [
                'st_status' => $status
            ]
        );

        if ($status=='low') {
            $transaction = DB::table('dust_status')->where('st_id', $id)->first();
            $today = Carbon::now()->addHours(2);

            $startDate = Carbon::parse($transaction->created_at);

            $current = Carbon::parse($today);
            $db = Carbon::parse($startDate);

            $numberOfDays = $current->diffInMinutes($db);
            if ($numberOfDays>=2) {
                $currentDateTime = Carbon::now();
                $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
                $result = DB::table('dust_status')->where('st_id', $id)->first();
                $data = [
                    'address' => $result->address,
                    'time' => $formattedDateTime,
                ];

                $email = new AudaceEmail($data);

                $users = DB::table('dust_status')->join('users', 'users.id', 'dust_status.st_collector')->where('st_id', $id)->first();
                Mail::to($users->email)->send($email);
            }
        }
        if ($results) {
            return response()->json(['status' => 'Successfull Notify'], 200);
        }else {
            return response()->json(['status' => 'Fail to Notify'], 500);
        }
    }
    public function infra($id)
    {
        $results = DB::table('report')->insert([
                'rp_dust' => $id
            ]);
        if ($results) {
            return response()->json(['status' => 'Successfull recorede'], 200);
        }else {
            return response()->json(['status' => 'Fail to record'], 500);
        }
    }

    public function dustRegister(Request $request)
    {
        $data = [
            'address' => $request->location,
            'st_collector' => $request->collector,
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
            'st_collector' => $request->collector,
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

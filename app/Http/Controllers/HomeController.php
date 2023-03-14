<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function homeAdmin()
    {
        
        $userCount = User::all()->count();
        $pendingUserCount = UserProfile::where('id_approval',null)->where('ktp_scan','!=',null)->where('ktp_selfie','!=',null)->where('kecamatan','!=',null)->count();
        $verifiedUserCount = UserProfile::where('id_approval',1)->count();
        $notVerifiedUserCount = $userCount-$verifiedUserCount-$pendingUserCount;
        $recentUsers = User::orderBy('created_at', 'desc')->limit(5)->get();
        $userDate = Carbon::now();
        
        $year = ['01-2022','02-2022','03-2022','04-2022','05-2022','06-2022','07-2022','08-2022','09-2022','10-2022','11-2022','12-2022'];
        $user = [];
        foreach ($year as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%m-%Y')"),$value)->count();
        }
        $onlineUserCount = DB::table('sessions')->where('user_id','!=', null)->count();
        return view('adminHome',compact('userCount','pendingUserCount','verifiedUserCount','recentUsers','onlineUserCount','notVerifiedUserCount'))->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));;
    }
}

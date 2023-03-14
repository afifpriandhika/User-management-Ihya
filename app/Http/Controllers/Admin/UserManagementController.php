<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Auth;
use DB;
use Hash;


class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::where('id','!=',Auth::user()->id)->paginate(7);
        $usersCount = User::all()->count();
        return view ('admin.userData',['users'=> $users],['usersCount'=> $usersCount]);
    }
    
    function showAddUserData(){
        return view ('admin.addUserData');
    }
    
    function showEditUserData($id){
        $profiles = DB::table('users')
                        ->join('user_profiles','users.id', '=', 'user_profiles.user_id')
                        ->where('users.id','=',$id)
                        ->first();
                        
        // $profiles = UserProfile::where('user_id',$id)->first();
        return view ('admin.editUserData',compact('profiles'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =  User::create([
            'role' => $request->role,
            'name' => strtoupper($request->name),
            'email' => $request->email,
            'password' => Hash::make(12345678),
            'profile_image' => 'img/default.jpg'
        ]);
       $profile = UserProfile::create([
            'user_id' => $user['id'],
            'ktp_name' => $request->name,
            'phone' =>$request->phone,
        ]);
            return redirect ('admin/userManagement/userData')->with('success','Pengguna baru berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $profiles = UserProfile::where('user_id',$id)
            -> update([
                'ktp_name' => strtoupper($request->name),
                'birthplace' => $request->birthplace,
                'birthdate' => $request->birthdate,
                'provinsi' => strtoupper($request->provinsi),
                'kota' => strtoupper($request->kota),
                'kecamatan' => strtoupper($request->kecamatan), 
                'kelurahan' => strtoupper($request->kelurahan),
                'address_detail' => strtoupper($request->address_detail),
                'job' => $request->job,
                'job_detail' => $request->job_detail,
                'social_media' => $request->social_media,
                'social_link' => $request->social_link,
            ]);
            $users = User::where('id',$id)
            -> update([
                'name' => strtoupper($request->name),
                'role' => $request->role,
            ]);
            
            return redirect('admin/userManagement/userData')->with('success','Data Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users= User::find($id);
        $users->delete();
        
        $userProfiles = UserProfile::where('user_id', $id);
        $userProfiles->delete();
        return redirect ('admin/userManagement/userData')->with('success','Data Berhasil Dihapus!');
    }
}

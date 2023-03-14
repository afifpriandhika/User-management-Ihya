<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;

class UserVerificationController extends Controller
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
        //
    }
    
    public function showPendingVerification()
    {
        $users = UserProfile::where('id_approval','=',null)->where('ktp_scan','!=',null)->where('ktp_selfie','!=',null)->where('nik','!=',null)->where('kecamatan','!=',null)->get();
        $usersCount = UserProfile::where('id_approval','=',null)->where('ktp_scan','!=',null)->where('ktp_selfie','!=',null)->where('nik','!=',null)->where('kecamatan','!=',null)->count();
        // dd($users);
        return view ('admin.pendingUserVerification',['users'=> $users],['usersCount'=> $usersCount]);
    }

    public function showApprovedUser(){
        $users = UserProfile::where('id_approval','=',1)->get();
        $usersCount = UserProfile::where('id_approval','=',1)->count();
        return view ('admin.approvedUser',['users'=> $users], ['usersCount'=> $usersCount]);
    }

    public function showRejectedUser(){
        $users = UserProfile::where('id_approval','=',2)->get();
        $usersCount = UserProfile::where('id_approval','=',2)->count();
        return view ('admin.rejectedUser',['users'=> $users], ['usersCount'=> $usersCount]);
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
        //
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
     
    public function approve($id, Request $request){
        
        $users = UserProfile::find($id)
        ->update([
            'id_approval' => 1,
        ]);
        return redirect('admin/userVerification/pendingUser')->with('success','Item created successfully!');
    }
    
    public function reject($id, Request $request){
        $profiles = UserProfile::find($id)
        ->update([
            'rejection_note' => $request->rejection_note,
            'id_approval' => 2,
        ]);
        return redirect('admin/userVerification/pendingUser')->with('success','Item created successfully!');
    }
    
    public function revoke($id, Request $request){
        $profiles = UserProfile::find($id)
        ->update([
            'id_approval' => null,
            'rejection_note' => null,
        ]);
        return redirect('admin/userVerification/pendingUser')->with('success','Item created successfully!');
    }
    
    
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
        //
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
}

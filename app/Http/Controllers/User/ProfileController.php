<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserProfile;
use DB;

class ProfileController extends Controller
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
        $profiles =  UserProfile::where('user_id',Auth::user()->id)->first();
        // dd($profiles);
        return view ('user.profile',compact('profiles'));
    }

    public function showUpdateBasicInfo()
    {
        $profiles = UserProfile::where('user_id',Auth::user()->id)->first();
        return view ('user.updateBasicInfo',compact('profiles'));
    }

    public function showUpdateIdentity()
    {
        $profiles = UserProfile::where('user_id',Auth::user()->id)->first();
        return view('user.updateIdentity',compact('profiles'));
    }

    public function showUpdateContact()
    {
        $profiles = UserProfile::where('user_id',Auth::user()->id)->first();
        return view ('user.updateContact',compact('profiles'));
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
    public function updateBasicInfo($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'address_detail' => 'required',
        ]);
        
        if($request->profile_image == null){
            $profiles = UserProfile::where('user_id',$id)
            -> update([
                'birthplace' => $request->birthplace,
                'birthdate' => $request->birthdate,
                'provinsi' => strtoupper($request->provinsi),
                'kota' => strtoupper($request->kota),
                'kecamatan' => strtoupper($request->kecamatan), 
                'kelurahan' => strtoupper($request->kelurahan),
                'address_detail' => strtoupper($request->address_detail),
                'ktp_name' => strtoupper($request->name),
                'job' => $request->job,
                'job_detail' => $request->job_detail,
                'social_media' => $request->social_media,
                'social_link' => $request->social_link,
            ]);
            $users = User::find($id)
            -> update([
                'name' => strtoupper($request->name),
            ]);
        }
        else{
            $id = Auth::user()->id;
            $files = $request->file('profile_image');
            $destinationPath = 'img/';
            // $file = $request->file('profile_pic');
            $profile_image = "profile". $id . ".jpg";
            $pathImg = $files->storeAs('img', $profile_image);
            $files->move($destinationPath, $profile_image);

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
            $users = User::find($id)
            -> update([
                'name' => strtoupper($request->name),
                'profile_image' => $pathImg,
            ]);
        }
        return redirect('/profile')->with('success','Profil Berhasil Diperbarui');
    }

    public function updateIdentity(Request $request)
    {
        $id = auth()->user()->id;
        if($request->ktp == null && $request->selfie_ktp == null){
            
            $profiles = UserProfile::where('user_id',$id)
            -> update([
            'nik' => $request->nik,
            'id_approval' => null
            ]);
        }
        else if($request->selfie_ktp == null){
            $files = $request->file('ktp');
            $destinationPath = 'img/';
            $file = $request->file('ktp');
            $ktp = "ktp". $id . "." . $files->getClientOriginalExtension();
            $pathImg = $file->storeAs('img', $ktp);
            $files->move($destinationPath, $ktp);

            $profiles = UserProfile::where('user_id',$id)
            -> update([
            'nik' => $request->nik,
            'ktp_scan' => $pathImg,
            'id_approval' => null
            ]);
        }
        else if($request->ktp == null){
            $files2 = $request->file('selfie_ktp');
            $destinationPath = 'img/';
            $file2 = $request->file('selfie_ktp');
            $selfie_ktp = "selfie". $id . "." . $files2->getClientOriginalExtension();
            $pathImg2 = $file2->storeAs('img', $selfie_ktp);
            $files2->move($destinationPath, $selfie_ktp);

            $profiles = UserProfile::where('user_id',$id)
            -> update([
            'nik' => $request->nik,
            'ktp_selfie' => $pathImg2,
            'id_approval' => null
            ]);
        }
        else{
            $files = $request->file('ktp');
            $files2 = $request->file('selfie_ktp');
            $destinationPath = 'img/';
            $file = $request->file('ktp');
            $file2 = $request->file('selfie_ktp');
            $ktp = "ktp". $id . "." . $files->getClientOriginalExtension();
            $selfie_ktp = "selfie". $id . "." . $files2->getClientOriginalExtension();
            $pathImg = $file->storeAs('img', $ktp);
            $pathImg2 = $file->storeAs('img', $selfie_ktp);
            $files->move($destinationPath, $ktp);
            $files2->move($destinationPath, $selfie_ktp);
        
            $profiles = UserProfile::where('user_id',$id)
            -> update([
            'nik' => $request->nik,
            'ktp_scan' => $pathImg,
            'ktp_selfie' => $pathImg2,
            'id_approval' => null
            ]);
        }
        return redirect('/profile')->with('success','Data Identitas Berhasil Diperbarui');
    }

    public function updateContact($id, Request $request)
    {
        $this->validate($request,[
            'phone' => 'required',
        ]);
        $id = auth()->user()->id;
        $profiles = UserProfile::where('user_id',$id)
        -> update([
            'phone' => $request->phone
        ]);
        return redirect('/profile')->with('success','Kontak Berhasil Diperbarui');
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

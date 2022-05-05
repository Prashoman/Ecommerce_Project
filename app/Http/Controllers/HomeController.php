<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;
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
        return view('dashboard.home');
    }
    public function profile(){
        return view('dashboard.profile');
    }

    public function changename(Request $request){
        $old_name = auth()->user()->name;
        User::find(auth()->user()->id)->update([
            'name' => $request->name
        ]);
        return back()->with('success', "Your Name Change Form $old_name to $request->name Successfully!");
    }
    public function changepassword(Request $request){
        //return $request->curent_pass;

        if(Hash::check($request->curent_pass, auth()->user()->password)){
            if($request->pass == $request->pass_confrim){
                User::find(auth()->id())->update([
                    'password' => bcrypt($request->pass)
                ]);
                return back()->with('pass_succes', 'Password Change Successfuly!');
            }else{
                return back()->with('match_success', 'Password And Confirm Password Dose Not Match!');
            }
        }else{
            return back()->with('wrong_success', 'This password is Wrong');
        }
    }
    public function changephoto(Request $request){
        $profile_photo = $request->file('profile_photo');

       $photo_name = Str::slug(auth()->user()->name).'-'.auth()->id().'.'.$profile_photo->getClientOriginalExtension();

       $link = base_path('public/uploads/profile_photos/'.$photo_name);
       //echo $link;
       Image::make($profile_photo)->save($link);
       User::find(auth()->id())->update([
            'profile_photo' => $photo_name,
       ]);
       return back()->with('profile_success', 'Profile Photo Change Successfully!');
    }

    public function changecoverphoto(Request $request){
       $cover_photo = $request->file('cover_photo');
       $cover_photo_name = Str::slug(auth()->user()->name).'-'.'cover'.auth()->id().'.'.$cover_photo->getClientOriginalExtension();
       //echo $cover_photo_name;
       $cover_link = base_path('public/uploads/cover_photos/'.$cover_photo_name);
       Image::make($cover_photo)->resize(1600,451)->save($cover_link);
       User::find(auth()->id())->update([
                'cover_photo' => $cover_photo_name,
       ]);
       return back()->with('cover_succes', 'Cover Photo Change Successfully!');
    }
}

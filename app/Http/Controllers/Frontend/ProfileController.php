<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    //
    public function edit(){
        $user = Auth::user();
        $profile = $user->freelancer;
        return view('frontend.profile.index' , compact('profile', 'user'));

    }

    public function update(Request $request){
        $user = Auth::user();
        $user->freelancer()->updateOrCreate(['user_id'=> $user->id] ,  $request->all());
        return redirect()->back()->with('success' , 'the user details hass been updated');
    } 
}

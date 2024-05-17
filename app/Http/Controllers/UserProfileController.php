<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserProfileController extends Controller
{
    public function index($id){

        $user = User::findOrFail($id);
        return view('profileDetail',compact(['user']));
    }
    public function update(Request $request, $id){
        $request->validate([
            'usr_phone'                 => ['required'],
            'usr_gender'                => ['required'],
            'usr_class'                 => ['required'],
            
        ]);

        $user = User::findOrFail($id)->update([
            'usr_phone'                 => $request->usr_phone,
            'usr_gender'                => $request->usr_gender,
            'usr_class'                 => $request->usr_class,
        ]);

        return redirect('/'.$id.'/profile')->with('succes','Behasil mengubah profile ');



    }
}

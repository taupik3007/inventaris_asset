<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class UserProfileController extends Controller
{
    public function index($id){

        $user = User::findOrFail($id);
        // dd(Auth::user()->roles->pluck('name')->first());
        if(Auth::user()->roles->pluck('name')->first() == 'admin'){
        return view('admin.profileDetail',compact(['user']));

        }
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
    public function changePassword(Request $request,$id){
        $request->validate([
            'password'                  => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($id);
        // dd(bcrypt($request->old_password));
        if(!Hash::check($request->old_password, $user->password)){
            return redirect('/'.$id.'/profile')->with('error','Password tidak sesuai');

        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect('/'.$id.'/profile')->with('succes','Berhasi Ubah Password');




    }

    public function changeImage(Request $request,$id){
        $file = $request->iamge;

        // Dapatkan ekstensi asli file
        $extension = $file->getClientOriginalExtension();
    
       
    
        // Buat nama file baru yang acak
        $randomFileName = Str::random(40) . '.' . $extension;
    
        // Pindahkan file ke path yang ditentukan
        $file->move('storage/image/', $randomFileName);

        $user = User::findOrFail($id)->update([
            'usr_profile_picture' => $randomFileName
        ]);
        return redirect('/'.$id.'/profile')->with('succes','Berhasi mengubah foto profile');

    }
}

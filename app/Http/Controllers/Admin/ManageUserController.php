<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SysNote;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;




class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::role(['userLv1','userLv2'])->get();
        return view('admin.manageUser.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($role)
    {
        return view('admin.user.create',compact(['role']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$role)
    {
        if($role == 1){
            $request->validate([
                'usr_name'                  => ['required', 'string', 'max:255'],
                'email'                     => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password'                  => ['required'],
                'usr_phone'                 => ['required'],
                'usr_gender'                => ['required'],
                'usr_class'                 => ['required'],
                'usr_regis_number'          => ['required','unique:'.User::class]
            ]);
            $user = User::create([
                'usr_name'          => $request->usr_name,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'usr_phone'         =>$request->usr_phone,
                'usr_gender'        =>$request->usr_gender,
                'usr_regis_number'  =>$request->usr_regis_number,
                'usr_class'         =>$request->usr_class
            ]);
            $user->assignRole('userLv1');
        return redirect('/admin/user')->with('succes','Berhasil Menambah siswa ');


        }else{
            $request->validate([
                'usr_name'                  => ['required', 'string', 'max:255'],
                'email'                     => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password'                  => ['required'],
                'usr_phone'                 => ['required'],
                'usr_gender'                => ['required'],
                
            ]);

            $user = User::create([
                'usr_name'          => $request->usr_name,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'usr_phone'         =>$request->usr_phone,
                'usr_gender'        =>$request->usr_gender,
               
            ]);
            $user->assignRole('userLv2');
            // dd($user->usr_id);
            $sysNote = SysNote::create([
                'note_user_id' => $user->usr_id,
                'note_text' => 'create',
                'created_by' => Auth::user()->usr_id
            ]);



        return redirect('/admin/user')->with('succes','Berhasil Menambah guru ');

        }
    
    }   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function resetPassword(){
       

        return view('admin.manageUser.resetPassword');
    }
    public function storeResetPassword(Request $request,$id){
        $request->validate([
            'password'                  => ['required', Rules\Password::defaults()],
        ]);

        $update = User::findOrFail($id)->update([
            'password' => Hash::make($request->password)

        ]);
        $sysNote = SysNote::create([
            'note_user_id' => $id,
            'note_text' => 'reset password',
            'created_by' => Auth::user()->usr_id
        ]);

       


        return redirect('/admin/user')->with('succes','Berhasil mereset password ');
    }
}

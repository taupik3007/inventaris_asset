<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\userProfile;
use App\Models\Classes;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $classes = Classes::all();
        return view('auth.register',compact(['classes']));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $messages = [
            'required'  => 'Harap di isi.',
           
        ];
        $request->validate([
            'usp_name'                  => ['required', 'string', 'max:255'],
            'email'                     => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password'                  => ['required', 'confirmed', Rules\Password::defaults()],
            'usp_phone'                 => ['required'],
            'usp_gender'                => ['required'],
            'usp_class'                 => ['required'],
            'usp_nis'            => ['required','unique:'.userProfile::class]
        ],$messages);
        // dd($request);

        $user = User::create([
            
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            
        ]);
        $userProfile = userProfile::create([
            'usp_user_id'       =>$user->usr_id,
            'usp_name'          => $request->usp_name,
            'usp_phone'         =>$request->usp_phone,
            'usp_gender'        =>$request->usp_gender,
            'usp_nis'           =>$request->usp_nis,
            'usp_classes_id'    =>$request->usp_class
        ]);
        $user->assignRole('peminjam');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('peminjam.home', absolute: false));
    }
}

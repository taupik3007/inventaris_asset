<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate([
            'usr_name'                  => ['required', 'string', 'max:255'],
            'email'                     => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password'                  => ['required', 'confirmed', Rules\Password::defaults()],
            'usr_phone'                 => ['required'],
            'usr_gender'                => ['required'],
            'usr_class'                 => ['required'],
            'usr_regis_number'            => ['required','unique:'.User::class]
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

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('user.home', absolute: false));
    }
}

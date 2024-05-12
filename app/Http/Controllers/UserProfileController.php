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
}

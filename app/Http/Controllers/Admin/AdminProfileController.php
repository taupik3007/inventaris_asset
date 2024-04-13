<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index($id){
        return view('admin.profile_detail',compact(['id']));
    }
}

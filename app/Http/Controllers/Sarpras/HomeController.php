<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Borrow;
use App\Models\Asset;



class HomeController extends Controller
{
    public function home(){
        $user = User::role(['userLv1','userLv2'])->count();
        $borrow = Borrow::count();
        $asset = Asset::count();

        // dd($user);
        return view('admin.home',compact('user','borrow','asset'));
    }
}

<?php

namespace App\Http\Controllers\Sarpras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Borrow;
use App\Models\Asset;



class HomeController extends Controller
{
    public function home(){
        $user = User::role(['peminjam'])->count();
        $borrow = Borrow::count();
        $asset = Asset::count();

        // dd($user);
        return view('admin.home',compact('user','borrow','asset'));
    }
}

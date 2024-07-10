<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\BorrowAsset;
use App\Models\user;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;



class borrowerHomeController extends Controller
{
    public function index()
    {
       $borrow = Borrow::where('brw_user_id',Auth::user()->usr_id)->get();
    //    dd($borrow);
       return view('user.home',compact(['borrow']));
    }
}

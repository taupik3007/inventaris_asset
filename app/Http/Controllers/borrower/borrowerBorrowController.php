<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\BorrowAsset;
use App\Models\user;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;

class borrowerBorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $borrow = Borrow::where('brw_user_id',Auth::user()->usr_id)->get();
    //    dd($borrow);
       return view('user.home',compact(['borrow']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = Borrow::with('brw_user')->with('brw_bas')->withTrashed()->findOrFail($id);
        // dd($borrow);
        $borrow_asset = BorrowAsset::with(['bas_asset'])->where('bas_borrow_id',$id)->withTrashed()->get();
        // dd($borrow_asset);
        return view('user.borrow.detail',compact(['borrow','borrow_asset']));
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

    public function history()
    {
     
        $borrow = Borrow::with('brw_user')->where('brw_user_id',Auth::user()->usr_id)->onlyTrashed()->get();
        // dd($borrow);
        return view('user.borrow.history',compact(['borrow']));
    
    
    }
}

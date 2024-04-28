<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\BorrowAsset;



class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $borrow = Borrow::with('brw_user')->where('brw_status',1)->get();
        // dd($borrow);
        return view('admin.borrow.index',compact(['borrow']));
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
        $borrow = Borrow::with('brw_user')->with('brw_bas')->findOrFail($id);
        // dd($borrow);
        $borrow_asset = BorrowAsset::with(['bas_asset'])->where('bas_borrow_id',$id)->get();
        // dd($borrow_asset);
        return view('admin.borrow.detail',compact(['borrow','borrow_asset']));
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
}

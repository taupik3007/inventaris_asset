<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\BorrowAsset;
use App\Models\user;
use App\Models\Asset;

// use App\Models\BorrowAsset;
use Illuminate\Support\Facades\Auth;




class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $borrow = Borrow::with('brw_user')->get();
        // dd($borrow);
        return view('admin.borrow.index',compact(['borrow']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::withoutRole('admin')->get();
        $asset = Asset::where('ass_status',1)->select('ass_name','ass_id')->get();

        // dd($user);
        return view('admin.borrow.create',compact(['user','asset']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $borrow = Borrow::create([
            'brw_user_id'=> $request->user_id,
            'brw_status'=> 1
        ]);
        
        foreach ($request->asset as $asset) {
            $borrow_asset = BorrowAsset::create([
                'bas_asset_id' => $asset,
                'bas_borrow_id' => $borrow->brw_id,
                'bas_status' => 1
            ]);
            $asset = Asset::where('ass_id',$asset)->first();
            $asset->ass_status = 2;
            $asset->save();
        }
        
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

    public function history()
    {
        $borrow = Borrow::with('brw_user')->onlyTrashed()->get();
        // dd($borrow);
        return view('admin.borrow.history',compact(['borrow']));
    }
    public function return($id)
    {
        $borrow= Borrow::findOrFail($id);
        $borrow->update([
            'brw_status'=> 2
        ]);
        $borrowAsset = BorrowAsset::where('bas_borrow_id',$id);
        // dd($borrow);
        $borrowAsset->update([
            'bas_status'=> 2
        ]);
        return redirect('/admin/borrow/history');
       
    }
    public function returnAsset($id)
    {
        
        $borrowAsset = BorrowAsset::findOrFail($id);
        $borrowCount = BorrowAsset::where('bas_borrow_id',$borrowAsset->bas_borrow_id)->where('deleted_at',null)->count();
        if($borrowCount == 1){
            $borrow = Borrow::where('brw_id',$borrowAsset->bas_borrow_id)->first();
            $borrow->update([
                'brw_deleted_by'=> Auth::user()->usr_id
            ]);
            $borrow->delete();
        }
        
        // dd($borrowAsset);
        $borrowAsset->update([
            'bas_deleted_by'=> Auth::user()->usr_id
        ]);
        $borrowAsset->delete();
        return redirect('/admin/borrow/'.$borrowAsset->bas_borrow_id.'/detail');
       
    }
}
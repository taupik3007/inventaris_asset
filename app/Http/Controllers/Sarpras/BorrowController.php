<?php

namespace App\Http\Controllers\Sarpras;

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
        $user = User::withoutRole('admin')->where('usr_status',1)->get();
        $asset = Asset::where('ass_status',1)->select('ass_name','ass_id')->get();

        // dd($user);
        return view('admin.borrow.create',compact(['user','asset']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->asset);
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
        return redirect('/admin/borrow')->with('succes','Berhasil Meminjam ');
       

        
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

    public function return()
    {
        $borrow = Borrow::with('brw_user')->onlyTrashed()->get();
        // dd($borrow);
        return view('admin.borrow.return',compact(['borrow']));
    }
    // public function return($id)
    // {
    //     $borrow= Borrow::findOrFail($id);
    //     $borrow->update([
    //         'brw_status'=> 2
    //     ]);
    //     $borrowAsset = BorrowAsset::where('bas_borrow_id',$id);
    //     // dd($borrow);
    //     $borrowAsset->update([
    //         'bas_status'=> 2
    //     ]);
    //     return redirect('/admin/borrow/history');
       
    // }
    public function returnAsset($id,$status)
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
            'bas_deleted_by'=> Auth::user()->usr_id,
            'bas_status' => $status
        ]);
        $asset = Asset::where('ass_id',$borrowAsset->bas_asset_id)->update([
            'ass_status' => 1,
            'ass_condition' => $status
        ]);
        $borrowAsset->delete();
        return redirect('/admin/borrow/'.$borrowAsset->bas_borrow_id.'/detail');
       
        
    }
    public function add($id){
        $borrow             = Borrow::findOrFail($id);
        $borrowAssetCount   = BorrowAsset::where('bas_borrow_id',$id)->count();
        $asset              = Asset::where('ass_status',1)->get();
        // dd($borrowAssetCount);
        if($borrowAssetCount >= 5){
        return redirect('/admin/borrow')->with('error','Jumlah asset yang di pinjam sudah maksimal ');

        }
        return view('admin.borrow.add',compact('asset'));

    }
    public function addStore(Request $request,$id){
        $borrowAsset = BorrowAsset::create([
            'bas_asset_id' => $request->asset,
            'bas_borrow_id' => $id,
            'bas_status' => 1
        ]);
        $asset = Asset::where('ass_id',$request->asset)->update(['ass_status'=>2]);
        return redirect('/admin/borrow')->with('succes','asset berhasil di pinjam ');

    }


    public function history(){
        $history = BorrowAsset::join('assets','borrow_assets.bas_asset_id','=','assets.ass_id')
        ->join('borrows','borrow_assets.bas_borrow_id','=','borrows.brw_id')
        ->join('users as oprator','oprator.usr_id','=','borrow_assets.bas_deleted_by')
        ->join('users as user','borrows.brw_user_id','=','user.usr_id')
        ->select('user.usr_name as user_name','oprator.usr_name as oprator_name','user.usr_regis_number as nis','assets.ass_name as asset_name',
                'borrow_assets.created_at as start_date','borrow_assets.deleted_at as end_date', 'borrow_assets.bas_status','user.usr_class' )
        ->orderBy('end_date','DESC')
        ->onlyTrashed()->get();
        // dd($history);
        return view('admin.borrow.history',compact(['history']));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Borrow;
use App\Models\BorrowAsset;

class PrintController extends Controller
{
    public function assetAll(){
        $title = "Print Asset";
        $asset = Asset::with('category')->with('origin')->get();
        return view('admin.print.assetAll',compact(['asset','title']));
    }
    public function assetGood(){
        $title = "Print Asset Kondisi baik";
        $asset = Asset::with('category')->with('origin')->where('ass_condition',1)->get();
        return view('admin.print.assetAll',compact(['asset','title']));
    }
    public function assetBroken(){
        $title = "Print Asset Kondisi Rusak";

        $asset = Asset::with('category')->with('origin')->where('ass_condition',2)->get();
        return view('admin.print.assetAll',compact(['asset','title']));
    }
    public function assetLost(){
        $title = "Print Asset Kondisi Hilang";

        $asset = Asset::with('category')->with('origin')->where('ass_condition',3)->get();
        return view('admin.print.assetAll',compact(['asset','title']));
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
        return view('admin.print.history',compact(['history']));
    }
}

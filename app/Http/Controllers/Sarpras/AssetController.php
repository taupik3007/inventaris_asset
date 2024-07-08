<?php

namespace App\Http\Controllers\Sarpras;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Origin;
use App\Models\assetDescription;
use App\Models\SysNote;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset = Asset::join('origins','origins.ori_id','=','assets.ass_origin_id')
        ->join('categories','categories.ctg_id','=','assets.ass_category_id')->get();
        // dd($asset);
        return view('admin.asset.index',compact(['asset']));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        
        $category = Category::all();
        $origin = Origin::all();
        return view('admin.asset.create',compact(['category','origin']));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $messages = [
            'required'  => 'Harap di isi.',
            'unique'    => 'kode sudah digunakan',
        ];
        $validated = $request->validate([
            'ass_name'          => 'required|max:255',
            'ass_year'          => 'required',
            'ass_category_id'   => 'required',
            'ass_origin_id'     => 'required',
            'ass_status'        => 'required',
            'ass_condition'     => 'required',
            'amount'            => 'required',
            'ass_price'         => 'required'
        ],$messages
        );

        // dd($request->amount);

        for ($i=0; $i <$request->amount ; $i++) { 
        $check_count_category               = Asset::where('ass_category_id',$request->ass_category_id)->withTrashed()->count();
        $registration_code                  = str_pad($check_count_category + 1 , 3, '0', STR_PAD_LEFT);
        $registration_asset_name_number     = str_pad($check_count_category + 1 , STR_PAD_RIGHT);
        $category                           = Category::where('ctg_id',$request->ass_category_id)->first();
        $origin                             = Origin::where('ori_id',$request->ass_origin_id)->first();
        // dd($reg_code);
        // dd($registration_code.'/'.$category->ctg_code.'/'.$origin->ori_code.'/'.$request->ass_year);

        $create_asset                           = new Asset();
        $create_asset->ass_category_id          = $request->ass_category_id;
        $create_asset->ass_origin_id            = $request->ass_origin_id;
        $create_asset->ass_year                 = $request->ass_year;
        $create_asset->ass_registration_code    = $registration_code.'/'.$category->ctg_code.'.'.$registration_code.'/'.$origin->ori_code.'/'.$request->ass_year;
        $create_asset->ass_name                 = $request->ass_name.' ke '.$registration_asset_name_number;
        $create_asset->ass_price                = $request->ass_price;
        $create_asset->ass_condition            = $request->ass_condition;
        $create_asset->ass_status               = $request->ass_status;
        $create_asset->ass_created_by           = Auth::user()->usr_id;
        $create_asset->save();

            for ($j=0; $j <count($request->asd_name) ; $j++) { 
                $create_asd                 = new assetDescription();
                $create_asd->asd_asset_id   = $create_asset->ass_id;
                $create_asd->asd_name       = $request->asd_name[$j];
                $create_asd->asd_value      = $request->asd_value[$j];
                $create_asd->save();
                
            }

            // foreach ($request->asd_name as  $no=>$asd) {
            //    
            // }

            $sysNote = SysNote::create([
                'note_asset_id' => $create_asset->ass_id,
                'note_text' => 'create',
                'created_by' => Auth::user()->usr_id
            ]);

        }
       
        
        return redirect('/admin/asset')->with('succes','Berhasil Menambah asset');

        
        


        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asset = Asset::join('categories','categories.ctg_id','=','assets.ass_category_id')
        ->join('origins','origins.ori_id','=','assets.ass_origin_id')->findOrFail($id);

        $asset_description = assetDescription::where('asd_asset_id',$id)->get();
        // dd($asset);
        // dd($asset_description);
        return view('admin.asset.detail',compact(['asset','asset_description']));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::all();
        $origin = Origin::all();
        $asset = Asset::findOrFail($id)->with('category')->with('origin')->first();
        // dd($asset);
        return view('admin.asset.edit',compact(['category','origin','asset']));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required'  => 'Harap di isi.',
        
        ];
        $validated = $request->validate([
            'ass_name'          => 'required|max:255',
            'ass_status'        => 'required',
            'ass_condition'     => 'required',
           
        ],$messages
        );
        $asset = Asset::findOrFail($id);

        $checkAssetName = Asset::where('ass_name',$request->ass_name)->where('ass_name','!=',$asset->ass_name)->first();
        if($checkAssetName == true){
            return redirect('/admin/asset')->with('error','Nama Asset sudah Terdaftar');
            
        }
        $asset->update([
            'ass_name' => $request->ass_name,
            'ass_status' =>$request->ass_status,
            'ass_condition' => $request->ass_condition
        ]);
        return redirect('/admin/asset')->with('succes','Berhasil edit asset');

        
        // dd($request);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);
        // dd($asset);
        if($asset->ass_status == 2){
            return redirect('/admin/asset')->with('error','Asset sedang di pinjam, tidak bisa menghapus asset');

        }
        $asset_description = assetDescription::where('asd_asset_id',$asset->ass_id)->get();
        // dd($asset_description);
        $asset->ass_deleted_by = Auth::user()->usr_id;
        $asset->save();
        $asset->delete();
        foreach ($asset_description as $asd) {
        $asd->delete();
            
        }
        $sysNote = SysNote::create([
            'note_asset_id' => $asset->ass_id,
            'note_text' => 'delete',
            'created_by' => Auth::user()->usr_id
        ]);
        return redirect('/admin/asset')->with('succes','Berhasil Menghapus asset');




    }
}

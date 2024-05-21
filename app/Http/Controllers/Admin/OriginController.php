<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Origin;
use App\Models\User;
use App\Models\Asset;
use App\Models\Category;
use App\Models\SysNote;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $origin = Asset::where('ass_id',1)->with('category')->with('origin')->with('asd')->first();
        // dd($origin);


        $origin=Origin::all();
        return view('admin.origin.index',compact(['origin']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.origin.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $id =  Auth::user()->usr_id;
        // dd($id);
        $messages = [
            'required'  => 'Harap di isi.',
            'unique'    => 'kode sudah digunakan',
        ];
        $validated = $request->validate([
            'ori_code' => 'required|max:255',
            'ori_name' => 'required|unique:origins'
        ],$messages
        );
        $code = "INV.".strtoupper($request->ori_code);
        $origin_cek = Origin::where('ori_code',$code)->first();

        if($origin_cek){
        return redirect('/admin/origin/create')->with('error','asal kode sudah digunakan');

        }

        $validated['ori_created_by']= $id;
        $validated['ori_code']= $code;
        

        $origin = Origin::create($validated);
        $sysNote = SysNote::create([
            'note_origin_id' => $id,
            'note_text' => 'create',
            'created_by' => Auth::user()->usr_id
        ]);
        return redirect('/admin/origin')->with('succes','Berhasil input asal baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $origin = Origin::where('ori_id' ,$id)->first();
        // dd($origin);
        return view('admin.origin.edit',compact(['origin']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required'  => 'Harap di isi.',
            'unique'    => 'kode sudah digunakan',
        ];
        $validated = $request->validate([
            'ori_code' => 'required|max:255',
            'ori_name' => 'required'
        ],$messages
        );

        $origin_cek = Origin::where('ori_id',$id)->first();
        // dd($origin_cek);
        $code = "INV.".strtoupper($request->ori_code);
        if($code == $origin_cek->ori_code){
            if($request->ori_name  == $origin_cek->ori_name){
                return redirect('/admin/origin')->with('error-name','nama asal sudah digunakan');
            }else{
            $origin_name_count = Origin::where('ori_name',$request->ori_name)->count();
            // dd($origin_name_count);
            if($origin_name_count > 0){
                return redirect('/admin/origin/'.$id.'/edit')->with('error-name','nama asal sudah digunakan');

            }
                
            }
        }else{
            if($request->ori_name  == $origin_cek->ori_name){
                $origin_code_count = Origin::where('ori_code',$code)->count();
                // dd($origin_code_count);
                if($origin_code_count == 0){

                }else{
                    return redirect('/admin/origin/'.$id.'/edit')->with('error-code','kode asal sudah digunakan');
                }
            }else{
            $origin_name_count = Origin::where('ori_name',$request->ori_name)->count();
            // dd($origin_name_count);
            if($origin_name_count > 0){
                return redirect('/admin/origin/'.$id.'/edit')->with('error-name','nama asal sudah digunakan');

            }else{
                $origin_code_count = Origin::where('ori_code',$code)->count();
                // dd($origin_code_count);
                if($origin_code_count == 0){

                }else{
                    return redirect('/admin/origin/'.$id.'/edit')->with('error-code','kode asal sudah digunakan');
                }
            }
                
            }

        }

        $origin_cek->ori_code = $code;
        $origin_cek->ori_name = $request->ori_name;
        $origin_cek->save();
        return redirect('/admin/origin/')->with('succes','data berhasil di update');





        // $origin_code_count = Origin::where('ori_code',$code)->count();
        //     dd($origin_code_count);
        //     if()






    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $origin = Origin::findOrFail($id);
        $asset_count = Asset::where('ass_origin_id','=',$id)->count();
        if($asset_count > 0){
            return redirect('/admin/assetCategory')->with('error','ada asset dalam Asal ini tidak dapat menghapus');

        }
        $origin->ori_deleted_by = Auth::user()->usr_id;
        $origin->save();
        $origin->delete();
        $sysNote = SysNote::create([
            'note_origin_id' => $id,
            'note_text' => 'delete',
            'created_by' => Auth::user()->usr_id
        ]);
        return redirect('/admin/origin')->with('succes','Berhasil Hapus asal');

        // dd($origin);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AssetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        // dd($category);
        return view('admin.category.index',compact(['category']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.category.create',compact(['category']));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $messages = [
            'required'  => 'Harap di isi.',
            'unique'    => 'nama sudah digunakan',
        ];
        $validated = $request->validate([
            'ctg_original_code' => 'required|max:255',
            'ctg_name' => 'required|max:255',
        ],$messages
        );


        if($request->ctg_parent_code == null){
            $ctg_code = strtoupper($request->ctg_original_code);
            $cek_ctg_ori_code = Category::where('ctg_original_code','=',$ctg_code)->first();
            if($cek_ctg_ori_code){
             return redirect('/admin/assetCategory/create')->with('error','kode original sudah terdaftar');

            }
        }else{
            $ctg_code = strtoupper($request->ctg_parent_code.".".$request->ctg_original_code);
            $cek_ctg_code = Category::where('ctg_code','=',$ctg_code)->first();
            if($cek_ctg_code){
                return redirect('/admin/assetCategory/create')->with('error','kode sudah terdaftar');
   
               }
         $parent_category = Category::where('ctg_code',"=",$request->ctg_parent_code)->first();
            
        }

        // dd($ctg_code);


        $category = new Category();
        $category->ctg_code             = $ctg_code;
        $category->ctg_original_code    = $request->ctg_original_code;
        $category->ctg_name             = $request->ctg_name;
        if($request->ctg_parent_code != null){
        $category->ctg_parent_id        = $parent_category->ctg_id;
        }
        $category->save();
        return redirect('/admin/assetCategory')->with('succes','Berhasil Menambah Asal');

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
        $category=Category::where('ctg_id','=',$id)->first();
        $parent_category = Category::where('ctg_id','=',$category->ctg_parent_id)->first();
        
        return view('admin.Category.edit',compact('category','parent_category'));
        
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
        $parent_id = Category::where('ctg_parent_id','=',$id)->first();
        if($parent_id){
            return redirect('/admin/assetCategory')->with('error','kategori ini masih memiliki anak kategori');
        }

        $category= Category::findOrFail($id);
        $category->ctg_deleted_by = Auth::user()->usr_id;
        $category->save();
        $category->delete();
        return redirect('/admin/assetCategory')->with('succes','kategori ini berhasil dihapus');
        
    }
}

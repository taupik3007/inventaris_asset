<?php

namespace App\Http\Controllers\sarpras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;





class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $major = Major::all();
        $title = 'hapus Jurusan';
        $text = "Yakin menghapus Jurusan?";
        confirmDelete($title, $text);
        return view('sarpras.major.index',compact(['major'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sarpras.major.create'); 
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required'  => 'Harap di isi.',
           
        ];
        $validated = $request->validate([
            
            'mjr_name' => 'required'
        ],$messages
        );
        $majorCheck = Major::where('mjr_name',$request->mjr_name)->first();
        if($majorCheck){
        return redirect(route('sarpras.major.create'))->with('error','Jurusan sudah terdaftar');

        }

        $majorCreate = Major::create([
            'mjr_name'=>$request->mjr_name,
            'mjr_created_by' => Auth::user()->usr_id
        ]);
        return redirect(route('sarpras.major.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $major = Major::findOrFail($id);
        return view('sarpras.major.edit',compact(['major']));
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
            
            'mjr_name' => 'required'
        ],$messages
        );
        $majorCheck = Major::where('mjr_name',$request->mjr_name)->where('mjr_id','!=',$id)->first();
        if($majorCheck){
        return redirect(route('sarpras.major.edit',['id'=>$id]))->with('error','Jurusan sudah terdaftar');

        }


        $majorUpdate = Major::findOrFail($id)->update([
            'mjr_name'=> $request->mjr_name,
            'mjr_updated_at',Auth::user()->usr_id
        ]);
        Alert::success('Berhasil Mengupdate', 'berhasil Mengupdate jurusan');

        return redirect(route('sarpras.major.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $classCheck = Classes::where('cls_major_id',$id)->first();
        if($classCheck){
        Alert::error('Gagal Menghapus', 'Masih ada kelas pada jurusan');
        return redirect(route('sarpras.major.index'));
         
        }




        $majorDestroy = Major::findOrFail($id);
        $majorDestroy->mjr_deleted_by = Auth::user()->usr_id;
        $majorDestroy->save();
        $majorDestroy->delete();
        Alert::success('Berhasil Menghapus', 'berhasil Menghapus jurusan');

        return redirect(route('sarpras.major.index'));


    }
}

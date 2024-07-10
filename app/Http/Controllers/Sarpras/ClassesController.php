<?php

namespace App\Http\Controllers\sarpras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Classes;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        $title = 'hapus Kelas';
        $text = "Yakin menghapus Kelas?";
        confirmDelete($title, $text);
        return view('sarpras.classes.index',compact(['classes'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $major = Major::all();
        return view('sarpras.classes.create',compact(['major']));
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
            
            'cls_level' => 'required',
            'cls_major_id' =>'required',
            'cls_number' =>'required'
        ],$messages
        );

        $classesCheck = Classes::where('cls_level',$request->cls_level)->where('cls_major_id',$request->cls_major_id)->where('cls_number',$request->cls_number)->first();
        if($classesCheck){
        Alert::error('Gagal Menambah', 'Kelas Sudah Terdaftar');
        return redirect(route('sarpras.classes.index'));
        }

        $classesCreate = Classes::create([
            'cls_level' => $request->cls_level,
            'cls_major_id' => $request->cls_major_id,
            'cls_number' => $request->cls_number,
            'cls_created_by' => Auth()->user()->usr_id
        ]);
        Alert::success('berhasil Menambah', 'Kelas berhasil Ditambah');
        return redirect(route('sarpras.classes.index'));
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
        $classes  = Classes::findOrFail($id);
        $major = Major::where('mjr_id','!=',$classes->cls_major_id)->get();
        // dd($major);
        return view('sarpras.classes.edit',compact(['classes','major']));
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
            
            'cls_level' => 'required',
            'cls_major_id' =>'required',
            'cls_number' =>'required'
        ],$messages
        );

        $classesCheck = Classes::where('cls_level',$request->cls_level)->where('cls_major_id',$request->cls_major_id)->where('cls_number',$request->cls_number)->where('cls_id','!=',$id)->first();
        if($classesCheck){
        Alert::error('Gagal Mengubah', 'Kelas Sudah Terdaftar');
        return redirect(route('sarpras.classes.index'));
        }

        $classesUpdate = Classes::findOrFail($id)->update([
            'cls_level' => $request->cls_level,
            'cls_major_id' => $request->cls_major_id,
            'cls_number' => $request->cls_number,
            'cls_updated_by' => Auth()->user()->usr_id
        ]);
        Alert::success('berhasil Mengubah', 'Kelas berhasil Diubah');
        return redirect(route('sarpras.classes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $userCheck = UserProfile::where('usp_classes_id',$id)->first();
        // dd($userCheck);
        if($userCheck){
        Alert::error('Gagal Menhapus', 'masih ada user pada kelas');
        return redirect(route('sarpras.classes.index'));
        }

        $classesDestroy = Classes::findOrFail($id);
        $classesDestroy->cls_deleted_by = Auth::user()->usr_id;
        $classesDestroy->save();
        $classesDestroy->delete();
        Alert::success('berhasil Menghapus', 'Kelas berhasil Dihapus');
        return redirect(route('sarpras.classes.index'));

    }
}

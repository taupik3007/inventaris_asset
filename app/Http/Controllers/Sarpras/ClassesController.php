<?php

namespace App\Http\Controllers\sarpras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\major;
use App\Models\classes;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = classes::all();
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
        $major = major::all();
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

        $classesCheck = classes::where('cls_level',$request->cls_level)->where('cls_major_id',$request->cls_major_id)->where('cls_number',$request->cls_number)->first();
        if($classesCheck){
        Alert::error('Gagal Menambah', 'Kelas Sudah Terdaftar');
        return redirect(route('sarpras.classes.index'));
        }

        $classesCreate = classes::create([
            'cls_level' => $request->cls_level,
            'cls_major_id' => $request->cls_major_id,
            'cls_number' => $request->cls_number
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
        $classesDestroy = classes::findOrFail($id)->delete();
        Alert::success('berhasil Menghapus', 'Kelas berhasil Dihapus');
        return redirect(route('sarpras.classes.index'));

    }
}

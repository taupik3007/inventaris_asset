<?php

namespace App\Http\Controllers\sarpras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\major;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $major = major::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
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
            'unique'    => 'Jurusan Sudah Terdaftar',
        ];
        $validated = $request->validate([
            
            'mjr_name' => 'required|unique:majors'
        ],$messages
        );


        $majorCreate = major::create([
            'mjr_name'=>$request->mjr_name
        ]);
        return redirect(route('sarpras.major.index'));
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
        $majorDestroy = major::findOrFail($id)->delete();
        return redirect(route('sarpras.major.index'));

    }
}

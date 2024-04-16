<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Origin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $validated = $request->validate([
            'ori_code' => 'required|unique:origins|max:255',
            'ori_name' => 'required',
        ]);

        $validated['ori_created_by']= $id;

        Origin::create($validated);
        return redirect('/admin/origin');
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
        //
    }
}

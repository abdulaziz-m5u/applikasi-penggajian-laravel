<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Http\Requests\Admin\JabatanRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Jabatan::paginate();

        return view('admin.jabatan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanRequest $request)
    {
        Jabatan::create($request->validated());

        return redirect()->route('admin.jabatan.index')->with([
            'message' => 'berhasil di buat',
            'alert-info' => 'success'
        ]);
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
    public function edit(Jabatan $jabatan)
    {
        return view('admin.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JabatanRequest $request, Jabatan $jabatan)
    {
        $jabatan->update($request->validated());

        return redirect()->route('admin.jabatan.index')->with([
            'message' => 'berhasil di edit',
            'alert-info' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di delete',
            'alert-info' => 'danger'
        ]);
    }
}

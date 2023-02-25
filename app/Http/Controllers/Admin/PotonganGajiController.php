<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotonganGaji;
use App\Http\Requests\Admin\PotonganGajiRequest;

class PotonganGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $potongan_gaji = PotonganGaji::paginate();

        return view('admin.potongan-gaji.index', compact('potongan_gaji'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.potongan-gaji.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PotonganGajiRequest $request)
    {
        PotonganGaji::create($request->validated());

        return redirect()->route('admin.potongan-gaji.index')->with([
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
    public function edit(PotonganGaji $potongan_gaji)
    {
        return view('admin.potongan-gaji.edit', compact('potongan_gaji'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PotonganGajiRequest $request, PotonganGaji $potongan_gaji)
    {
        $potongan_gaji->update($request->validated());

        return redirect()->route('admin.potongan-gaji.index')->with([
            'message' => 'berhasil di edit',
            'alert-info' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PotonganGaji $potongan_gaji)
    {
        $potongan_gaji->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-info' => 'danger'
        ]);
    }
}

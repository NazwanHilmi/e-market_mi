<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = Pelanggan::get();
        return view('pelanggan.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelangganRequest $request)
    {
        try{
            DB::beginTransaction();
            Pelanggan::create($request->all());
            DB::commit();
            return redirect('pelanggan')->with('success', 'Data berhasil ditambahkan!');
        }   catch (QueryException | Exception | PDOException $error) {
            DB::rollback();
            return $this-> failResponse($errors->getMessage(), $errors->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        try {
            $pelanggan->update($request->all());

            return redirect('pelanggan')->with('success', 'Data berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            $this-> failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();

            return redirect('pelanggan')->with('success', 'Delete data berhasil!');
        } catch (QueryException | Exception | PDOException $error) {
            $this-> failResponse($error->getMessage(), $error->getCode());
        }
    }
}

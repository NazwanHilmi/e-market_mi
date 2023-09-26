<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barang'] = Barang::get();
        return view('barang.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(StoreBarangRequest $request)
    {
        try{
            DB::beginTransaction();
            Barang::create($request->all());
            DB::commit();
            return redirect('barang')->with('success', 'Data berhasil ditambahkan!');
        }   catch (QueryException | Exception | PDOException $error) {
            DB::rollback();
            return $this-> failResponse($errors->getMessage(), $errors->getCode());
        }

    }

    public function show(Barang $barang)
    {
        //
    }

    public function edit(Barang $barang)
    {
        // 
    }

    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        try {
            $barang->update($request->all());

            return redirect('barang')->with('success', 'Data berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            $this-> failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(Barang $barang)
    {
        try {
            $barang->delete();

            return redirect('barang')->with('success', 'Delete data berhasil!');
        } catch (QueryException | Exception | PDOException $error) {
            $this-> failResponse($error->getMessage(), $error->getCode());
        }
    }
}

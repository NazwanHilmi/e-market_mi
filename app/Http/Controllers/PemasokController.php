<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pemasok'] = Pemasok::get();
        return view('pemasok.index')->with($data);
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
    public function store(StorePemasokRequest $request)
    {
        try{
            DB::beginTransaction();
            Pemasok::create($request->all());
            DB::commit();
            return redirect('pemasok')->with('success', 'Data berhasil ditambahkan!');
        }   catch (QueryException | Exception | PDOException $error) {
            DB::rollback();
            return $this-> failResponse($errors->getMessage(), $errors->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasok $pemasok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemasokRequest $request, Pemasok $pemasok)
    {
        try {
            $pemasok->update($request->all());

            return redirect('pemasok')->with('success', 'Data berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            $this-> failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasok $pemasok)
    {
        try {
            $pemasok->delete();

            return redirect('pemasok')->with('success', 'Delete data berhasil!');
        } catch (QueryException | Exception | PDOException $error) {
            $this-> failResponse($error->getMessage(), $error->getCode());
        }
    }
}

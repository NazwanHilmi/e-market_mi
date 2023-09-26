<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Exports\ProdukExport;
use PDF;
use Excel;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['produk'] = Produk::get();
        return view('produk.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(StoreProdukRequest $request)
    {
        try{
            DB::beginTransaction();
            Produk::create($request->all());
            DB::commit();
            return redirect('produk')->with('success', 'Data berhasil ditambahkan!');
        }   catch (QueryException | Exception | PDOException $error) {
            DB::rollback();
            return $this-> failResponse($errors->getMessage(), $errors->getCode());
        }

    }

    public function show(Produk $produk)
    {
        //
    }

    public function edit(Produk $produk)
    {
        // 
    }

    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        try {
            $produk->update($request->all());

            return redirect('produk')->with('success', 'Data berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            $this-> failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();

            return redirect('produk')->with('success', 'Delete data berhasil!');
        } catch (QueryException | Exception | PDOException $error) {
            $this-> failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function download()
    {
        $data['produk'] = Produk::get();
        $pdf = PDF::loadview('produk/data', $data);
    
        // return $pdf->stream();
        return $pdf->download('produk.pdf');
    }

    public function exportData(){
            $date = date('Y-m-d');
            return Excel::download(new ProdukExport, $date.'_produk.xlsx');
    }

}

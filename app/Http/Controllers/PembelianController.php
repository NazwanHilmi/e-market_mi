<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use App\Models\Pembelian;
use App\Models\DetailPembelian;
use App\Models\Pemasok;
use App\Models\Barang;
use PDF;


class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastId = Pembelian::select('kode_masuk')->orderBy('created_at', 'desc')->first();
        $data['kode'] = ($lastId==null?'P00000001':sprintf('P%08d', substr($lastId->kode_masuk,1)+1));
        $data['pemasok'] = Pemasok::get();
        $data['barang'] = Barang::get();

        return view('pembelian.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembelianRequest $request)
    {
        $data['kode_masuk'] = $request['kode_masuk'];
        $data['tanggal_masuk'] = $request['tanggal_masuk'];
        $data['total'] = $request['total'];
        $data['pemasok_id'] = $request['pemasok_id'];
        $data['user_id'] = 1;

        $input_pembelian = Pembelian::create($data);
        
        // input detail pembelian
        $barang_id = $request->barang_id;
        $harga_beli = $request->harga_beli;
        $jumlah = $request->jumlah;
        $sub_total = $request->sub_total;



            foreach ($barang_id as $i => $v) {
                $data2['pembelian_id'] = $input_pembelian->id;
                $data2['barang_id'] = $barang_id[$i];
                $data2['harga_beli'] = $harga_beli[$i];
                $data2['jumlah'] = $jumlah[$i];
                $data2['sub_total'] = $sub_total[$i];
                $input_detail_pembelian = DetailPembelian::create($data2);
            }
            return redirect('pembelian')->with('success', 'Transaksi berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }

    public function invoice($invoice)
    {
            //GET DATA ORDER BERDASRKAN INVOICE
    $pembelian = Pembelian::with(['district.city.province', 'details', 'details.product', 'payment'])
    ->where('invoice', $invoice)->first();
    //MENCEGAH DIRECT AKSES OLEH USER, SEHINGGA HANYA PEMILIKINYA YANG BISA MELIHAT FAKTURNYA
    if (!\Gate::forUser(auth()->guard('customer')->user())->allows('order-view', $order)) {
        return redirect(route('pembelian', $order->invoice));
    }

    //JIKA DIA ADALAH PEMILIKNYA, MAKA LOAD VIEW BERIKUT DAN PASSING DATA ORDERS
    $pdf = PDF::loadView('ecommerce.orders.pdf', compact('order'));
    //KEMUDIAN BUKA FILE PDFNYA DI BROWSER
    return $pdf->stream();
        }
}

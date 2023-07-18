<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasukModel;
use App\BarangModel;
use App\SuplierModel;
use Session;

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasukModel::all();
        return view('user.masuk',compact('data'));
    }

     public function search(Request $request)
    {
        $cari = $request->get('cari');
        $data = MasukModel::where('tgl_masuk','LIKE','%'.$cari.'%')->get();
        return view('user.masuk',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = BarangModel::all();
        $suplier = SuplierModel::all();
        return view('user.tambah_masuk',compact('barang','suplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $MasukModel = new MasukModel();
        // $MasukModel->suplier_id = $request->suplier; // Ubah bagian ini
        $MasukModel->barang_id = $request->barang; // Ubah bagian ini
        $MasukModel->tgl_masuk = date('Y-m-d');
        $MasukModel->jumlah_masuk = $request->jumlah;
        $MasukModel->save();
    
        $BarangModel = BarangModel::find($request->barang);
        if ($BarangModel) { // Pastikan model ditemukan sebelum mengakses properti
            $BarangModel->stok_barang = $BarangModel->stok_barang + $request->jumlah;
            $BarangModel->save();
        }

        Session::flash('success','Data Success Submit');
        return redirect()->route('user.masuk');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MasukModel::find($id);
        return view('user.show_masuk',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataMasuk = MasukModel::find($id);

        if ($dataMasuk) {
            // Kembalikan jumlah masuk ke stok barang
            $BarangModel = BarangModel::find($dataMasuk->barang_id);
            
            if ($BarangModel) {
                $BarangModel->stok_barang = $BarangModel->stok_barang - $dataMasuk->jumlah_masuk;
                $BarangModel->save();
            }
    
            // Hapus data masuk dari tabel masuk
            $dataMasuk->delete();
    
            Session::flash('success','Data Deleted !');
        }
    

        Session::flash('error','Data masuk tidak ditemukan. !');
        return redirect()->route('user.masuk');
    }
}

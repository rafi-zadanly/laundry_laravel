<?php

namespace App\Http\Controllers;

use App\Cabang;
use App\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function masuk(){
        return view('admin_page.masuk');
    }

    public function dasbor(){
        $data = [
            'page_group' => '',
            'page_name' => 'dasbor',
        ];
        return view('admin_page.dasbor', $data);
    }

    public function paket_laundry(){
        $data = [
            'page_group' => '',
            'page_name' => 'paket_laundry',
        ];
        return view('admin_page.paket_laundry', $data);
    }

    public function data_member(){
        $data = [
            'page_group' => 'data_pelanggan',
            'page_name' => 'data_member',
        ];
        return view('admin_page.data_member', $data);
    }

    public function data_non_member(){
        $data = [
            'page_group' => 'data_pelanggan',
            'page_name' => 'data_non_member',
        ];
        return view('admin_page.data_non_member', $data);
    }

    public function transaksi_member(){
        $data = [
            'page_group' => 'data_transaksi',
            'page_name' => 'transaksi_member',
        ];
        return view('admin_page.transaksi_member', $data);
    }

    public function transaksi_non_member(){
        $data = [
            'page_group' => 'data_transaksi',
            'page_name' => 'transaksi_non_member',
        ];
        return view('admin_page.transaksi_non_member', $data);
    }

    public function data_pengguna(){
        $data_pengguna = Pengguna::all();
        $data_cabang = [];
        foreach ($data_pengguna as $p) {
            $data_cabang[] = Cabang::find($p->id_cabang);
        }
        $data = [
            'page_group' => '',
            'page_name' => 'data_pengguna',
            'data_pengguna' => $data_pengguna,
            'data_cabang' => $data_cabang
        ];
        
        return view('admin_page.data_pengguna', $data);
    }

    public function data_pengguna_tambah(){
        $cabang = Cabang::all();
        $data = [
            'page_group' => '',
            'page_name' => 'data_pengguna',
            'data_cabang' => $cabang
        ];
        return view('admin_page.data_pengguna_tambah', $data);
    }

    public function data_pengguna_ubah(Request $request){
        $data_check = Pengguna::find($request->id);
        if ($data_check != NULL) {
            $data_pengguna = Pengguna::find($request->id);
            $cabang = Cabang::all();
            $data = [
                'page_group' => '',
                'page_name' => 'data_pengguna',
                'pengguna' => $data_pengguna,
                'data_cabang' => $cabang
            ];
            return view('admin_page.data_pengguna_ubah', $data);
        }else{
            return redirect('data_pengguna')->with('alert', "Data Pengguna dengan id ( $request->id ) tidak ditemukan.")->with('type', 'failed');
        }
    }

    public function cabang(){
        $data_cabang = Cabang::all();
        $data = [
            'page_group' => '',
            'page_name' => 'cabang',
            'data_cabang' => $data_cabang
        ];
        return view('admin_page.cabang', $data);
    }

    public function cabang_tambah(){
        $data = [
            'page_group' => '',
            'page_name' => 'cabang',
        ];
        return view('admin_page.cabang_tambah', $data);
    }

    public function cabang_ubah(Request $request){
        $data_check = Cabang::find($request->id);
        if ($data_check != NULL) {
            $data_cabang = Cabang::find($request->id);
            $data = [
                'page_group' => '',
                'page_name' => 'cabang',
                'cabang' => $data_cabang,
            ];
            return view('admin_page.cabang_ubah', $data);
        }else{
            return redirect('cabang')->with('alert', "Data Pengguna dengan id ( $request->id ) tidak ditemukan.")->with('type', 'failed');
        }
        
    }

    public function laporan(){
        $data = [
            'page_group' => '',
            'page_name' => 'laporan',
        ];
        return view('admin_page.laporan', $data);
    }

    public function keluar(){
        Session::flush();
        return redirect('masuk');
    }
}

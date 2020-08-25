<?php

namespace App\Http\Controllers;

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
        $data = [
            'page_group' => '',
            'page_name' => 'data_pengguna',
            'data_pengguna' => $data_pengguna,
        ];
        return view('admin_page.data_pengguna', $data);
    }

    public function data_pengguna_tambah(){
        $data = [
            'page_group' => '',
            'page_name' => 'data_pengguna',
        ];
        return view('admin_page.data_pengguna_tambah', $data);
    }

    public function data_pengguna_ubah(Request $request){
        $data_pengguna = Pengguna::where('id', $request->id)->first();
        $jumlah_data = Pengguna::where('id', $request->id)->count();
        $data = [
            'page_group' => '',
            'page_name' => 'data_pengguna',
            'pengguna' => $data_pengguna,
        ];
        if ($jumlah_data > 0) {
            return view('admin_page.data_pengguna_ubah', $data);
        }else{
            return redirect('data_pengguna')->with('alert', "Data Pengguna dengan id ( $request->id ) tidak ditemukan.")->with('type', 'failed');
        }
        
    }

    public function cabang_toko(){
        $data = [
            'page_group' => '',
            'page_name' => 'cabang_toko',
        ];
        return view('admin_page.cabang_toko', $data);
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

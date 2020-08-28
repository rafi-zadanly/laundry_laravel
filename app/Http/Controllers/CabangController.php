<?php

namespace App\Http\Controllers;

use App\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CabangController extends Controller
{
    public function tambah_cabang(Request $request){
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'nama_cabang' => 'required',
            'no_telepon' => 'required',
            'alamat_cabang' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = new Cabang();
            $data->nama = $request->nama_cabang;
            $data->no_telp = $request->no_telepon;
            $data->alamat = $request->alamat_cabang;
            
            if ($data->save()) {
                return redirect('cabang')->with('alert', 'Berhasil menambahkan cabang.')->with('type', 'success');
            }else{
                return redirect()->back()->with('alert', 'Terjadi Kesalahan pada sistem, coba lagi nanti.')->with('type', 'failed');
            }
        }
        
    }

    public function ubah_cabang(Request $request){
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'nama_cabang' => 'required',
            'no_telepon' => 'required',
            'alamat_cabang' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = Cabang::where('id', $request->id);
            $update_data = [
                'nama' => $request->nama_cabang,
                'no_telp' => $request->no_telepon,
                'alamat' => $request->alamat_cabang,
            ];
            
            if ($data->update($update_data)) {
                return redirect('cabang')->with('alert', 'Berhasil mengubah data cabang.')->with('type', 'success');
            }else{
                return redirect()->back()->with('alert', 'Terjadi Kesalahan pada sistem, coba lagi nanti.')->with('type', 'failed');
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Pengguna;
use App\Rules\notNull;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DataPenggunaController extends Controller
{
    public function konfirmasi_masuk(Request $request){
        $nama_pengguna = $request->username;
        $kata_sandi = $request->password;
        $data = Pengguna::where('nama_pengguna', $nama_pengguna)->first();
        if ($data) {
            if (Hash::check($kata_sandi, $data->kata_sandi)) {
                Session::put('nama_lengkap', $data->nama_lengkap);
                Session::put('nama_pengguna', $data->nama_pengguna);
                Session::put('status', $data->status);
                Session::put('is_login', TRUE);
                return redirect('dasbor');
            }else{
                return redirect('masuk')->with('alert', 'Username atau Password salah.');
            }
        }else{
            return redirect('masuk')->with('alert', 'Username atau Password salah.');
        }
    }

    public function tambah_data_pengguna(Request $request){
        $messages = $this->config_messages();
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'nama_pengguna' => 'required|unique:pengguna,nama_pengguna',
            'kata_sandi' => 'required',
            'cabang_toko' => new notNull,
            'status_pengguna' => new notNull
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = new Pengguna();
            $data->nama_lengkap = $request->nama_lengkap;
            $data->nama_pengguna = $request->nama_pengguna;
            $data->kata_sandi = Hash::make($request->kata_sandi);
            $data->id_cabang = $request->cabang;
            $data->status = $request->status_pengguna;
            
            if ($data->save()) {
                return redirect('data_pengguna')->with('alert', 'Berhasil menambahkan pengguna baru, akun tersebut sudah dapat masuk.')->with('type', 'success');
            }else{
                return redirect()->back()->with('alert', 'Terjadi Kesalahan pada sistem, coba lagi nanti.')->with('type', 'failed');
            }
        }
        
    }

    public function ubah_data_pengguna(Request $request){
        $messages = $this->config_messages();
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'nama_pengguna' => ['required', Rule::in($request->nama_pengguna)],
            'cabang_toko' => new notNull,
            'status_pengguna' => new notNull
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = Pengguna::where('id', $request->id);
            $update_data = [
                'nama_lengkap' => $request->nama_lengkap,
                'nama_pengguna' => $request->nama_pengguna,
                'id_cabang' => $request->cabang,
                'status' => $request->status_pengguna,
            ];
            if ($request->kata_sandi != "") {
                $update_data['kata_sandi'] = Hash::make($request->kata_sandi);
            }
            
            if ($data->update($update_data)) {
                return redirect('data_pengguna')->with('alert', 'Berhasil mengubah data pengguna.')->with('type', 'success');
            }else{
                return redirect()->back()->with('alert', 'Terjadi Kesalahan pada sistem, coba lagi nanti.')->with('type', 'failed');
            }
        }
    }

    public function hapus_data_pengguna(Request $request){
        $where = Pengguna::where('id', $request->id_delete);
        if ($where->delete()) {
            return redirect('data_pengguna')->with('alert', 'Pengguna tersebut berhasil dihapus.')->with('type', 'success');
        }
    }

    public function config_messages(){
        $messages = [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute tersebut sudah digunakan.'
        ];
        return $messages;
    }
}

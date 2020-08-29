<?php

namespace App\Http\Controllers;

use App\Cabang;
use App\Pengguna;
use App\Rules\notNull;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class LaporanController extends Controller
{
    public function cetak(Request $request){
        $validator = Validator::make($request->all(), [
            'cetak_data' => new notNull,
            'cetak_file' => new notNull,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $table = $request->cetak_data;
            $file_type = $request->cetak_file;
            switch ($table) {
                case 'pengguna':
                    if ($file_type == 'pdf') {
                        return $this->pengguna_pdf();
                    }else{
                        // $this->pengguna_excel();
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    public function pengguna_pdf(){
        $data_pengguna = Pengguna::all();
        $data_cabang = [];
        foreach ($data_pengguna as $p) {
            $data_cabang[] = Cabang::find($p->id_cabang);
        }
        $data = [
            'title' => 'Pengguna',
            'pengguna' => $data_pengguna,
            'cabang' => $data_cabang
        ];
        $pdf = PDF::loadview('pdf.pengguna', $data);
        return $pdf->download('laporan-pengguna-pdf');
    }
}

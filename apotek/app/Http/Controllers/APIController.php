<?php

namespace App\Http\Controllers;
use App\obat;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function searchobat(Request $request){
        $cari=$request->input=('q');
        $obat=obat::where('namaObat','LIKE',"%$cari%")->get();
        if($obat->isEmpty()){
            return response()->json([
                'success'=>false,
                'data'=>'data tidak ketemu'
            ],200)->header('Access-Control-Allow-Origin','http://127.0.0.1:5500');
        }
        else
        {
            return response()->json([
                'success'=>true,
                'data'=>$obat
            ],200)->header('Access-Control-Allow-Origin','http://127.0.0.1:5500');
        }
    }
}

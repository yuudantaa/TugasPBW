<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\obat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home(){
        return view("home",["key"=>"home"]);
    }

    public function obat(){
        $obat=obat::orderBy("id","desc")->get();
        return view("obat",["key"=>"obat","ob"=>$obat]);
    }

    public function tambahobat(){
        return view("tambahobat",["key"=>"obat"]);
    }

    public function simpanobat(request $request){
       $file_name=time().'_'.$request->file("gambarObat")->getClientOriginalName();
       $path=$request->file("gambarObat")->storeAs("gambarObat",$file_name,"public");

       obat::create([
        "namaObat"=>$request->namaObat,
        "jenisObat"=>$request->jenisObat,
        "dosis"=>$request->dosis,
        "harga"=>$request->harga,
        "tanggalProduksi"=>$request->tanggalProduksi,
        "tanggalKadaluarsa"=>$request->tanggalKadaluarsa,
        "gambarObat"=>$path
       ]);
       return redirect("/obat")->with("alert","data berhasil disimpan");
    }

    public function editobat($id)
    {
        $obat=obat::find($id);
        return view("editobat",["key"=>"obat","ob"=>$obat]);
    }

    public function updateobat($id,request $request)
    {
        $obat=obat::find($id);

        $obat->namaObat = $request->namaObat;
        $obat->jenisObat=$request->jenisObat;
        $obat->dosis=$request->dosis;
        $obat->harga=$request->harga;
        $obat->tanggalProduksi=$request->tanggalProduksi;
        $obat->tanggalKadaluarsa=$request->tanggalKadaluarsa;
        if($request->gambarObat){
            if($obat->gambarObat){
                Storage::disk("public")->delete($obat->gambarObat);
            }
            $file_name=time().'_'.$request->file("gambarObat")->getClientOriginalName();
            $path=$request->file("gambarObat")->storeAs("gambarObat",$file_name,"public");
            $obat->gambarObat=$path;
        }
        $obat->save();
        return redirect("/obat")->with("alert","data berhasil diubah");
    }

    public function deleteobat($id)
    {
        $obat=obat::find($id);

        if($obat->gambarObat){
            Storage::disk("public")->delete($obat->gambarObat);
        }
        $obat->delete();

        return redirect("/obat")->with("alert","data berhasil dihapus");
    }

    public function aboutus(){
        return view("aboutus",["key"=>"aboutus"]);
    }

    public function login()
    {
        return view("login");
    }

    public function edituser()
    {
        return view("edituser",['key'=>'aboutus']);
    }

    public function updateuser(Request $request)
    {
        if($request->password_baru==$request->konfirmasi_password)
        {
            $user = Auth::user();
            $user->password= bcrypt($request->password_baru);
            $user->save();

            return redirect("/user")->with("info","password berhasil diubah");
        }else{
            return redirect("/user")->with("info","password gagal diubah");
        }
    }

}

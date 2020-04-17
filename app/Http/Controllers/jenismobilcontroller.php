<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\jenismobil_model;
use JWTAuth;
use DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class jenismobilcontroller extends Controller
{
    public function index($id)
    {
        if(Auth::user()->level=="admin"){
            $dt_jenismobil=jenismobil_model::get();
            return response()->json($dt_jenismobil);

    }else{
        return response()->json(['status'=>'anda bukan admin']);
    }
    }
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required',
        ]
        );

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=jenismobil_model::create([
            'nama_jenis'=>$req->nama_jenis,
        ]);
        if($simpan){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
    }

    public function tampil_jenismobil()
    {
        $data_jenismobil=jenismobil_model::count();
        $data_jenismobil1=jenismobil_model::all();
        return Response()->json(['count'=> $data_jenismobil, 'jenismobil'=> $data_jenismobil1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=jenismobil_model::where('id',$id)->update([
            'nama_jenis'=>$req->nama_jenis,
        ]);
        if($ubah){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function destroy($id)
    {
        $hapus=jenismobil_model::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}

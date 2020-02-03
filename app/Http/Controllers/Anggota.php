<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anggotaModel;
use Illuminate\Support\Facades\Validator;

class Anggota extends Controller
{
    public function index(){
        $dt_ag=anggotaModel::get();
          return response()->json($dt_ag);
        
      }
    
      public function store(Request $request){
        $validator=Validator::make($request->all(),
          [
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'telp'=>'required'
          ]
        );
    
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
    
        $simpan=anggotaModel::create([
          'nama_anggota'=>$request->nama_anggota,
          'alamat'=>$request->alamat,
          'telp'=>$request->telp
        ]);
    
        $status=1;
        $message="Anggota Berhasil Ditambah";
        if($simpan){
          return Response()->json(compact('status','message'));
        }else {
          return Response()->json(['status'=>0]);
        }
      }
    
      public function update($id,Request $request){
        $validator=Validator::make($request->all(),
          [
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'telp'=>'required'
          ]
      );
    
        if($validator->fails()){
        return Response()->json($validator->errors());
      }
    
        $ubah=anggotaModel::where('id',$id)->update([
          'nama_anggota'=>$request->nama_anggota,
          'alamat'=>$request->alamat,
          'telp'=>$request->telp
        ]);
    
        $status=1;
        $message="Data Berhasil Diubah";
        if($ubah){
          return Response()->json(compact('status','message'));
        } else {
          return Response()->json(['status'=>0]);
        }
      }
    
      public function tampil(){
        $data_anggota=anggotaModel::get();
        $count=$data_anggota->count();
        $arr_data=array();
        foreach ($data_anggota as $dt_ag){
          $arr_data[]=array(
            'id' => $dt_ag->id,
            'nama_anggota' => $dt_ag->nama_anggota,
            'alamat' => $dt_ag->alamat,
            'telp' => $dt_ag->telp
          );
        }
        $status=1;
        return Response()->json(compact('status','count','arr_data'));
      }
    
      public function destroy($id){
        $hapus=anggotaModel::where('id',$id)->delete();
        $status=1;
        $message="Data Berhasil Dihapus";
        if($hapus){
          return Response()->json(compact('status','message'));
        }else {
          return Response()->json(['status'=>0]);
        }
      }
}

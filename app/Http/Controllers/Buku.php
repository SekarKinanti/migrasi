<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bukuModel;
use Illuminate\Support\Facades\Validator;

class Buku extends Controller
{
    public function index(){
    
          $dt_bk=bukuModel::get();
          return response()->json($dt_bk);
        
      }
    
      public function store(Request $req){
      $validator = Validator::make($req->all(),
      [
          'judul' => 'required',
          'penerbit' => 'required',
          'pengarang' => 'required',
          'foto' => 'required',
      ]);
      if($validator->fails()){
        return Response()->json($validator->errors());
      }
    
      $simpan = bukuModel::create([
        'judul' => $req->judul,
        'penerbit' => $req->penerbit,
        'pengarang' => $req->pengarang,
        'foto' => $req->foto,
      ]);
      $status=1;
      $message="Buku Berhasil Ditambah";
      if($simpan){
        return Response()->json(compact('status','message'));
      } else {
        return Response()->json(['status' => 0]);
      }
    }
    
    public function update($id, Request $req){
      $validator = Validator::make($req->all(),
      [
        'judul' => 'required',
        'penerbit' => 'required',
        'pengarang' => 'required',
        'foto' => 'required',
      ]);
      if($validator->fails()){
        return Response()->json($validator->errors());
      }
    
      $ubah = bukuModel::where('id', $id)->update([
        'judul' => $req->judul,
        'penerbit' => $req->penerbit,
        'pengarang' => $req->pengarang,
        'foto' => $req->foto,
      ]);
      $status=1;
      $message="Data Berhasil Diubah";
      if($ubah){
        return Response()->json(compact('status','message'));
      } else {
        return Response()->json(['status' => 0]);
      }
    }
    
    public function destroy($id){
      $hapus = bukuModel::where('id', $id)->delete();
      $status=1;
      $message="Buku Berhasil Dihapus";
      if($hapus){
        return Response()->json(compact('status','message'));
      } else {
        return Response()->json(['status' => 0]);
      }
    }
    
    public function tampil(){
      $data_buku=bukuModel::get();
      $count=$data_buku->count();
      $arr_data=array();
      foreach ($data_buku as $dt_bk){
        $arr_data[]=array(
          'id' => $dt_bk->id,
          'judul' => $dt_bk->judul,
          'penerbit' => $dt_bk->penerbit,
          'pengarang' => $dt_bk->pengarang,
          'foto' => $dt_bk->foto
        );
      }
      $status=1;
      return Response()->json(compact('status','count','arr_data'));
    }
}

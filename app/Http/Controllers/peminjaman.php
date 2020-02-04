<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\peminjamanModel;
use Illuminate\Support\Facades\Validator;
use DB;
use App\detail;

class peminjaman extends Controller
{
    public function index(){
        $peminjaman=DB::table('peminjaman')
        ->join('anggota','anggota.id','=','peminjaman.id_anggota')
        ->join('petugas','petugas.id','=','peminjaman.id_petugas')
        ->select('peminjaman.id','peminjaman.tanggal_pinjam','peminjaman.id_anggota','anggota.nama_anggota','peminjaman.tanggal_kembali')
        ->get();
  
        $data=array();
        foreach ($peminjaman as $dt_pj){
          $ok=detail::where('id_pinjam',$dt_pj->id)->get();
          $arr_detail=array();
          foreach ($ok as $ok) {
            $arr_detail[]=array(
            'id_pinjam' =>$ok->id_pinjam,
            'id_buku' => $ok->id_buku,
            'qty' => $ok->qty
            );
          }
  
          $data[]=array(
            'id' => $dt_pj->id,
            'tanggal_pinjam' => $dt_pj->tanggal_pinjam,
            'id_anggota' => $dt_pj->id_anggota,
            'nama_anggota' => $dt_pj->nama_anggota,
            'tanggal_kembali' => $dt_pj->tanggal_kembali,
            'detail_pinjam' => $arr_detail
          );
        }
        return response()->json(compact("data"));
    }
  
      public function store(Request $req){
        $validator=Validator::make($req->all(),
          [
              'tanggal_pinjam'=>'required',
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'tanggal_kembali'=>'required',
          ]
        );
  
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
  
        $simpan=peminjamanModel::create([
            'tanggal_pinjam'=>$req->tanggal_pinjam,
          'id_anggota'=>$req->id_anggota,
          'id_petugas'=>$req->id_petugas,
          'tanggal_kembali'=>$req->tanggal_kembali,
        ]);
  
        $status=1;
        $message="Peminjaman Berhasil Ditambah";
        if($simpan){
          return Response()->json(compact('status','message'));
        }else {
          return Response()->json(['status'=>0]);
        }
      }
  
      public function update($id,Request $req){
        $validator=Validator::make($req->all(),
          [
              'tanggal_pinjam'=>'required',
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'tanggal_kembali'=>'required',
          ]
      );
  
      if($validator->fails()){
        return Response()->json($validator->errors());
      }
  
      $ubah=peminjamanModel::where('id',$id)->update([
        'tanggal_pinjam'=>$req->tanggal_pinjam,
        'id_anggota'=>$req->id_anggota,
        'id_petugas'=>$req->id_petugas,
        'tanggal_kembali'=>$req->tanggal_kembali,
      ]);
  
      $status=1;
      $message="Data Berhasil Diubah";
      if($ubah){
        return Response()->json(compact('status','message'));
      }else {
        return Response()->json(['status'=>0]);
      }
    }
  
    public function tampil(){
      $data=DB::table('peminjaman')
      ->join('anggota','anggota.id','=','peminjaman.id_anggota')
      ->join('petugas','petugas.id','=','peminjaman.id_petugas')
      ->select('peminjaman.id','peminjaman.tanggal_pinjam','peminjaman.id_anggota','anggota.nama_anggota','peminjaman.tanggal_kembali')
      ->get();
      $count=$data->count();
      $status=1;
      $message="Peminjaman Berhasil ditampilkan";
      return response()->json(compact('data','count'));
    }
  
    public function destroy($id){
      $hapus=peminjamanModel::where('id',$id)->delete();
      $status=1;
      $message="Data Berhasil Dihapus";
      if($hapus){
        return Response()->json(compact('status','message'));
      }else {
        return Response()->json(['status'=>0]);
      }
    }

    public function simpan(Request $req){
        $validator=Validator::make($req->all(),
          [
            'id_pinjam'=>'required',
            'id_buku'=>'required',
            'qty'=>'required'
          ]
        );
    
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
        $simpan=detail::create([
          'id_pinjam'=>$req->id_pinjam,
          'id_buku'=>$req->id_buku,
          'qty'=>$req->qty
        ]);
        $status=1;
        $message="Detail Berhasil Ditambahkan";
        if($simpan){
          return Response()->json(compact('status','message'));
        }else {
          return Response()->json(['status'=>0]);
        }
      }
    
      public function ubah($id,Request $req){
        $validator=Validator::make($req->all(),
          [
            'id_pinjam'=>'required',
            'id_buku'=>'required',
            'qty'=>'required'
          ]
      );
      if($validator->fails()){
        return Response()->json($validator->errors());
      }
    
      $ubah=detail::where('id',$id)->update([
        'id_pinjam'=>$req->id_pinjam,
        'id_buku'=>$req->id_buku,
        'qty'=>$req->qty
      ]);
      $status=1;
      $message="Detail Berhasil Diubah";
      if($ubah){
        return Response()->json(compact('status','message'));
      }else {
        return Response()->json(['status'=>0]);
      }
    }
    
    public function hapus($id){
      $hapus=detail::where('id',$id)->delete();
      $status=1;
      $message="Detail Berhasil Dihapus";
      if($hapus){
        return Response()->json(compact('status','message'));
      }else {
        return Response()->json(['status'=>0]);
      }
    }
}

<?php

namespace App\Http\Controllers\admin\kitap;

use App\Helpers\imageUpload;
use App\Helpers\myHelpers\myHelpers;
use App\Http\Controllers\Controller;
use App\Models\Kategoriler;
use App\Models\Kitaplar;
use App\Models\yayınevi;
use App\Models\yazarlar;
use Illuminate\Http\Request;
use File;
class indexController extends Controller
{
    public function index()
    {
        $data = Kitaplar::paginate(10);
        return view('admin.kitap.index',['data'=>$data]);

    }
    public function create()
    {
        $yazar = yazarlar::all();
        $yayinevi = yayınevi::all();
        $kategori = Kategoriler::all();
        return view('admin.kitap.create',['yayinevi'=>$yayinevi,'yazar'=>$yazar,'kategori'=>$kategori]);
    }

    public function store(Request $request){

        $all = $request->except('_token');

        $all['selflink']=myHelpers::permalink($all['name']);

        $all['image'] = imageUpload::singleUpload(rand(1,90000),"kitap",$request->file('image'));

        $insert = Kitaplar::create($all);
        if ($insert)
        {
            return redirect()->back()->with('status','kitap eklendi');
        }
        else
        {
            return redirect()->back()->with('status','kitap eklenemedi');
        }


    }
    public function edit($id)
    {
      $c = Kitaplar::where('id','=',$id)->count();
      if($c!=0)
      {
         $data = Kitaplar::where('id','=',$id)->get();
         $yazar = yazarlar::all();
         $yayinevi = yayınevi::all();
         $kategori =Kategoriler::all();
         return view('admin.kitap.edit',['data'=>$data,'yazar'=>$yazar,'yayinevi'=>$yayinevi,'kategori'=>$kategori]);
      }
      else
      {
         return redirect('/');
      }

    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Kitaplar::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Kitaplar::where('id', '=', $id)->get();
            $all = $request->except('_token');
            $all['selflink'] = myHelpers::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1, 9000), 'kitap', $request->file('image'), $data, 'image');
            $update = Kitaplar::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'kitap başarı ile güncellendi');

            } else {
                return redirect()->back()->with('status', 'kitap güncellenemedi');
            }
        }
    }



        public function delete($id)
    {
        $c = Kitaplar::where('id','=',$id)->count();
        if($c!=0)
        {
            $data = Kitaplar::where('id','=',$id)->get();
            File::delete('public/'.$data[0]['image']);
            Kitaplar::where('id','=',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/');
        }
    }
}

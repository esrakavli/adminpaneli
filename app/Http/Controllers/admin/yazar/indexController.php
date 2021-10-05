<?php

namespace App\Http\Controllers\admin\yazar;

use App\Helpers\myHelpers\myHelpers;
use App\Http\Controllers\Controller;
use App\Models\yazarlar;
use Illuminate\Http\Request;
use App\Helpers\imageUpload;
use File;
class indexController extends Controller
{
    public function index()
    {
        $data = yazarlar::paginate(10);
        return view('admin.yazar.index', ['data' => $data]);

    }

    public function create()
    {
        return view('admin.yazar.create');
    }
    public function store(Request $request){

        $all = $request->except('_token');
        $all['selflink']=myHelpers::permalink($all['name']);
        $all['image'] = imageUpload::singleUpload(rand(1,9000),"yazar",$request->file('image'));

        $insert = yazarlar::create($all);
        if ($insert)
        {
            return redirect()->back()->with('status','yazar eklendi');
        }
        else
        {
            return redirect()->back()->with('status','yazar eklenemedi');
        }


    }
    public function edit($id){
        $c = yazarlar::where('id','=',$id)->count();
        if($c!=0)
        {
            $data = yazarlar::where('id','=',$id)->get();
            return view('admin.yazar.edit',['data'=>$data]);
        }
        else{
            return redirect('/');
        }

    }
    public function update(Request $request)
    {
        $id = $request->route('id');
            $data = yazarlar::where('id','=',$id)->get();
            $all = $request->except('_token');
            $all['selflink'] = myHelpers::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,900),'yazar',$request->file('image'),$data,'image');
            $update = yazarlar::where('id','=',$id)->update($all);
            if($update)
            {
                return redirect()->back()->with('status','yazar başarı ile düzenlendi');

            }
            else{
                return redirect()->back()->with('status','yazar düzenlenemedi');
            }

        }

        public function delete($id)
        {
          $c = yazarlar::where('id','=',$id)->count();
          if($c!=0)
          {
              $w = yazarlar::where('id','=',$id)->get();
              File::delete('public/'.$w[0]['image']);
              yazarlar::where('id','=',$id)->delete();
              return redirect()->back();
          }
          else
          {
            return redirect('/');
          }
        }


}

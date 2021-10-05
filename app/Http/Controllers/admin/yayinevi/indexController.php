<?php

namespace App\Http\Controllers\admin\yayinevi;


use App\Helper;

use App\Helpers\myHelpers\myHelpers;
use App\Http\Controllers\Controller;
use App\Models\yayınevi;


//use Faker\Extension\Helper;
use Illuminate\Http\Request;


class indexController extends Controller
{
    public function index()
    {
        $data = yayınevi::paginate(10);
        return view('admin.yayinevi.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.yayinevi.create');
    }

    public function store(Request $request)
    {

        $all = $request->except('_token');
        $all['selflink'] = myHelpers::permalink($all['name']);
        $insert = yayınevi::create($all);

        if ($insert) {
            return redirect()->back()->with('status', 'yayın evi başarı ile eklendi');
        } else {
            return redirect()->back()->with('status', 'yayın evi eklenmedi');
        }

    }

    public function edit($id)
    {
       $c = yayınevi::where('id','=',$id)->count();
       if ($c!=0){

           $data = yayınevi::where('id','=',$id)->get();
           return view('admin.yayinevi.edit',['data'=>$data]);
       }
       else{
           dd($id);
           return redirect('/');
       }
    }

  public function update(Request $request)
  {

      $id = $request->route('id');
      $c = yayınevi::where('id','=',$id)->count();

      if($c!=0)

       {

        $all =  $request->except('_token');
        $all['selflink'] = myHelpers::permalink($all['name']);
        $update = yayınevi::where('id','=',$id)->update($all) ;
           if($update)
        {
            return redirect()->back()->with('status','Yayın Evi Düzenlendi');
        }
        else{
            return redirect()->back()->with('status','yayın evi düzenlenemedi');
        }


      }
      else
      {
         return redirect("/");
      }
  }
  public function delete($id){
        $c = yayınevi::where('id','=',$id)->count();
        if($c!=0)
        {
          $delete = yayınevi::where('id','=',$id)->delete();
          return redirect()->back();
      }
        else{
            return redirect('/');
        }
  }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yayınevi extends Model
{
    protected $guarded = [];

    static function getField($id,$field)
    {
        $c = yayınevi::where('id','=',$id)->count();
        if($c!=0)
        {
            $w = yayınevi::where('id','=',$id)->get();
            return $w[0][$field];
        }

        else
        {
            return "silinmiş yayınevi";
        }

    }
}

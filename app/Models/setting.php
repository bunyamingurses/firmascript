<?php

namespace App\Models;

use App\Http\Controllers\admin\tool\functionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $table="site_setting";
    protected $guarded=[];

    public static function getSetting($text)
    {
        if (isset($text)){
            $setting=setting::where("id","=",1)->get();
            return $setting[0][$text];


        }
    }


}

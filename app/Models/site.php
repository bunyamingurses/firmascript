<?php

namespace App\Models;

use App\Http\Controllers\admin\tool\functionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site extends Model
{
    protected $table="sitesites";
    protected $guarded=[];

    public static function getSingleName($id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            @$site=site::where("id","=",$id)->get();
            if (isset($site[0]["siteName"])){
                return $site[0]["siteName"];
            }
        }
    }
    public static function getUrl($id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            @$site=site::where("id","=",$id)->get();
            if (isset($site[0]["siteUrl"])){
                return $site[0]["siteUrl"];
            }
        }
    }
}

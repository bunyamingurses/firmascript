<?php

namespace App\Models;

use App\Http\Controllers\admin\tool\functionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "sitesitescategory";
    protected $guarded = [];


    public static function getSingleName($id)
    {
        if (isset($id)) {

            $id = functionController::security($id);
            $category = category::where("id", "=", $id)->get();
            if ($category[0]["categoryName"]) {
                return $category[0]["categoryName"];
            }
        }
    }

}

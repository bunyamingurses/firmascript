<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Image;
use function PHPUnit\Framework\isEmpty;

class index extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=category::get();
        return View("admin.category.index",["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View("admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->categoryName) && isset($request->categoryImage)) {
            $categoryName = functionController::security($request->categoryName);
            $categoryImage = functionController::imageCreate($request, "category", "categoryImage");
            $categoryImageWebp = functionController::imageCreateWebp($request, "category", "categoryImage");
            $all = ["categoryPhoto" => $categoryImage, "categoryPhotoWebp" => $categoryImageWebp, "categoryName" => $categoryName, "categoryPermalink" => functionController::seo($categoryName),];

            $create = category::create($all);
            if ($create) {
                return Redirect(route("admin.category.create"))->with("status", "Kategori Eklendi.");
            } else {
                return Redirect(route("admin.category.create"))->with("status", "Kategori Eklenemedi.");
            }


        } else {
            return Redirect(route("admin.category.create"))->with("status", "Lütfen Boş Alan Bırakmayın.");
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $categoryControl=category::where("id","=",$id)->get();
            if ($categoryControl){
                return View("admin.category.update",["category"=>$categoryControl]);
            }else{
                return Redirect(route("admin.category.index"))->with("status", "Kategori Bulunamadı.");
            }
        }else{
            return Redirect(route("admin.category.index"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if (isset($id)) {
            $id=functionController::security($id);

            if (isset($request->categoryImage)) {

                if (isset($request->categoryName) && isset($request->categoryImage)) {
                    $categoryName = functionController::security($request->categoryName);
                    $categoryImage = functionController::imageCreate($request, "category", "categoryImage");
                    $categoryImageWebp = functionController::imageCreateWebp($request, "category", "categoryImage");
                    $all = ["categoryPhoto" => $categoryImage, "categoryPhotoWebp" => $categoryImageWebp, "categoryName" => $categoryName, "categoryPermalink" => functionController::seo($categoryName),];

                    $create = category::where("id","=",$id)->update($all);
                    if ($create) {
                        return Redirect(route("admin.category.index"))->with("status", "Kategori Güncellendi.");
                    } else {
                        return Redirect(route("admin.category.index"))->with("status", "Kategori Güncellenemedi.");
                    }


                } else {
                    return Redirect(route("admin.category.create"))->with("status", "Lütfen Boş Alan Bırakmayın.");
                }
            }else{
                if (isset($request->categoryName)) {
                    $categoryName = functionController::security($request->categoryName);
                    $all = ["categoryName" => $categoryName, "categoryPermalink" => functionController::seo($categoryName),];

                    $create = category::where("id","=",$id)->update($all);
                    if ($create) {
                        return Redirect(route("admin.category.index"))->with("status", "Kategori Güncellendi.");
                    } else {
                        return Redirect(route("admin.category.index"))->with("status", "Kategori Güncellenemedi.");
                    }


                } else {
                    return Redirect()->back()->with("status", "Lütfen Boş Alan Bırakmayın.");
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $control=category::where("id","=",$id)->get();
            if ($control){
                $delete=category::where("id","=",$id)->delete();
                if ($delete){
                    return redirect()->back()->with("status","Kategori Silindi.");
                }else{
                    return redirect()->back()->with("status","Kategori Silinemedi.");
                }
            }else{
                return redirect()->back()->with("status","Kategori Bulunamadı.");
            }
        }
    }
}

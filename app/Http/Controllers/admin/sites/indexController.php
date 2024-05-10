<?php

namespace App\Http\Controllers\admin\sites;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\setting;
use App\Models\site;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $site = site::get();
        return View("admin.sites.index", ["site" => $site]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::get();
        return View("admin.sites.create", ["category" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->siteName) && isset($request->siteImage) && isset($request->siteAbout) && isset($request->siteUrl) && isset($request->categoryId) && isset($request->sitePrice)) {
            $categoryId = functionController::security($request->categoryId);
            $categoryControl = category::where("id", "=", $categoryId)->get();
            if (isset($categoryControl[0]["id"])) {
                $siteName = functionController::security($request->siteName);
                $siteImage = functionController::imageCreate($request, "projects", "siteImage");
                $siteImageWebp = functionController::imageCreateWebp($request, "projects", "siteImage");
                $siteAbout = functionController::security($request->siteAbout);
                $siteUrl = functionController::security($request->siteUrl);

                $sitePrice=functionController::security($request->sitePrice);
                $all = ["siteImage" => $siteImage, "siteImageWebp" => $siteImageWebp, "siteName" => $siteName, "siteAbout" => $siteAbout, "sitePermalink" => functionController::seo($siteName), "siteUrl" => $siteUrl,"sitePrice"=>$sitePrice, "siteCategoryId" => $categoryId];

                $create = site::create($all);
                if ($create) {
                    return redirect(route("admin.site.index"))->with("status", "Site Eklendi.");
                } else {
                    return redirect(route("admin.site.index"))->with("status", "Site Eklenemedi.");
                }
            } else {
                return redirect()->back()->with("status", "Site İle İlgili Verilerde HTML Üzerinden Düzenleme Yapmayınız.");
            }
        } else {
            return Redirect(route("admin.site.create"))->with("status", "Lütfen Boş Alan Bırakmayın.");
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
        if (isset($id)) {
            $id = functionController::security($id);
            $site = site::where("id", "=", $id)->get();
            if ($site[0]["id"]) {
                $category=category::get();
                return View("admin.sites.update",["site"=>$site,"category"=>$category]);
            }else{
                return redirect()->back();
            }
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
                if (isset($request->siteName) && isset($request->siteImage) && isset($request->siteAbout) && isset($request->siteUrl) && isset($request->categoryId) && isset($request->sitePrice)) {
                    $categoryId = functionController::security($request->categoryId);
                    $categoryControl = category::where("id", "=", $categoryId)->get();
                    if (isset($categoryControl[0]["id"])) {
                        $siteName = functionController::security($request->siteName);
                        $siteImage = functionController::imageCreate($request, "projects", "siteImage");
                        $siteImageWebp = functionController::imageCreateWebp($request, "projects", "siteImage");
                        $siteAbout = functionController::security($request->siteAbout);
                        $siteUrl = functionController::security($request->siteUrl);
                        $sitePrice=functionController::security($request->sitePrice);

                        $all = ["siteImage" => $siteImage, "siteImageWebp" => $siteImageWebp, "siteName" => $siteName, "siteAbout" => $siteAbout, "sitePermalink" => functionController::seo($siteName), "siteUrl" => $siteUrl,"sitePrice"=>$sitePrice, "siteCategoryId" => $categoryId];

                        $create = site::where("id","=",$id)->update($all);
                        if ($create) {
                            return redirect(route("admin.site.index"))->with("status", "Site Güncellendi.");
                        } else {
                            return redirect(route("admin.site.index"))->with("status", "Site Güncellenemedi.");
                        }
                    } else {
                        return redirect()->back()->with("status", "Site İle İlgili Verilerde HTML Üzerinden Düzenleme Yapmayınız.");
                    }
                } else {
                    return Redirect(route("admin.site.create"))->with("status", "Lütfen Boş Alan Bırakmayın.");
                }
            }else{
                if (isset($request->siteName) && isset($request->siteAbout) && isset($request->siteUrl) && isset($request->categoryId) && isset($request->sitePrice)) {
                    $categoryId = functionController::security($request->categoryId);
                    $categoryControl = category::where("id", "=", $categoryId)->get();
                    if (isset($categoryControl[0]["id"])) {
                        $siteName = functionController::security($request->siteName);
                        $siteAbout = functionController::security($request->siteAbout);
                        $siteUrl = functionController::security($request->siteUrl);
                        $sitePrice=functionController::security($request->sitePrice);
                        $all = ["siteName" => $siteName, "siteAbout" => $siteAbout, "sitePermalink" => functionController::seo($siteName), "siteUrl" => $siteUrl,"sitePrice"=>$sitePrice, "siteCategoryId" => $categoryId];

                        $create = site::where("id","=",$id)->update($all);
                        if ($create) {
                            return redirect(route("admin.site.index"))->with("status", "Site Güncellendi.");
                        } else {
                            return redirect(route("admin.site.index"))->with("status", "Site Güncellenemedi.");
                        }
                    } else {
                        return redirect()->back()->with("status", "Site İle İlgili Verilerde HTML Üzerinden Düzenleme Yapmayınız.");
                    }
                } else {
                    return Redirect(route("admin.site.create"))->with("status", "Lütfen Boş Alan Bırakmayın.");
                }
            }
        }else{
            return redirect()->back();
        }




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $control=site::where("id","=",$id)->get();
            if ($control){
                $delete=site::where("id","=",$id)->delete();
                if ($delete){
                    return redirect()->back()->with("status","Site Silindi.");
                }else{
                    return redirect()->back()->with("status","Site Silinemedi.");
                }
            }else{
                return redirect()->back()->with("status","Site Bulunamadı.");
            }
        }else{
            return redirect()->back();
        }
    }
}

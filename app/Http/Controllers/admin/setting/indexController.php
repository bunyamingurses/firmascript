<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\setting;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting=setting::where("id","=",1)->get();
        return View("admin.setting.index",["setting"=>$setting]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($id) && $id==1){
            if (isset($request->logoHeader) && isset($request->logoFooter)){
                if (isset($request->siteUrl) && isset($request->siteTitle) && isset($request->siteDescription) && isset($request->siteKeyword) && isset($request->siteAuthor) && isset($request->sitePhoneNumber) && isset($request->siteEmail) && isset($request->siteGoogleMap) && isset($request->siteGoogleAnalytics)){
                    $logoHeader=functionController::imageCreate($request,"setting","logoHeader");
                    $logoHeaderWebp=functionController::imageCreateWebp($request,"setting","logoHeader");
                    $logoFooter=functionController::imageCreate($request,"setting","logoFooter");
                    $logoFooterWebp=functionController::imageCreateWebp($request,"setting","logoFooter");
                    $siteUrl=functionController::security($request->siteUrl);
                    $siteTitle=functionController::security($request->siteTitle);
                    $siteDescription=functionController::security($request->siteDescription);
                    $siteKeyword=functionController::security($request->siteKeyword);
                    $siteAuthor=functionController::security($request->siteAuthor);
                    $sitePhoneNumber=functionController::security($request->sitePhoneNumber);
                    $siteEmail=functionController::security($request->siteEmail);
                    $siteGoogleMap=functionController::security($request->siteGoogleMap);
                    $siteGoogleAnalytics=functionController::security($request->siteGoogleAnalytics);

                    $all=[
                        "logoHeader"=>$logoHeader,
                        "logoHeaderWebp"=>$logoHeaderWebp,
                        "logoFooter"=>$logoFooter,
                        "logoFooterWebp"=>$logoFooterWebp,
                        "siteUrl"=>$siteUrl,
                        "title"=>$siteTitle,
                        "description"=>$siteDescription,
                        "keyword"=>$siteKeyword,
                        "author"=>$siteAuthor,
                        "phoneNumber"=>$sitePhoneNumber,
                        "email"=>$siteEmail,
                        "googleMap"=>$siteGoogleMap,
                        "googleAnalytics"=>$siteGoogleAnalytics
                    ];

                    $update=setting::where("id","=",1)->update($all);

                    if ($update){
                        return redirect()->back()->with("status","Site Bilgileri Güncellendi.");
                    }else{
                        return redirect()->back()->with("status","Site Bilgileri Güncellenemedi.");
                    }
                }else{
                    return redirect()->back()->with("status","Lütfen Boş Alan Bırakmayın.!");
                }
            }else{
                if (isset($request->siteUrl) && isset($request->siteTitle) && isset($request->siteDescription) && isset($request->siteKeyword) && isset($request->siteAuthor) && isset($request->sitePhoneNumber) && isset($request->siteEmail) && isset($request->siteGoogleMap) && isset($request->siteGoogleAnalytics)){
                    $siteUrl=functionController::security($request->siteUrl);
                    $siteTitle=functionController::security($request->siteTitle);
                    $siteDescription=functionController::security($request->siteDescription);
                    $siteKeyword=functionController::security($request->siteKeyword);
                    $siteAuthor=functionController::security($request->siteAuthor);
                    $sitePhoneNumber=functionController::security($request->sitePhoneNumber);
                    $siteEmail=functionController::security($request->siteEmail);
                    $siteGoogleMap=functionController::security($request->siteGoogleMap);
                    $siteGoogleAnalytics=functionController::security($request->siteGoogleAnalytics);

                    $all=[
                        "siteUrl"=>$siteUrl,
                        "title"=>$siteTitle,
                        "description"=>$siteDescription,
                        "keyword"=>$siteKeyword,
                        "author"=>$siteAuthor,
                        "phoneNumber"=>$sitePhoneNumber,
                        "email"=>$siteEmail,
                        "googleMap"=>$siteGoogleMap,
                        "googleAnalytics"=>$siteGoogleAnalytics
                    ];

                    $update=setting::where("id","=",1)->update($all);

                    if ($update){
                        return redirect()->back()->with("status","Site Bilgileri Güncellendi.");
                    }else{
                        return redirect()->back()->with("status","Site Bilgileri Güncellenemedi.");
                    }
                }else{
                    return redirect()->back()->with("status","Lütfen Boş Alan Bırakmayın.!");
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
        //
    }
}

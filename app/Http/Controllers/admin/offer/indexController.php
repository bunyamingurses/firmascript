<?php

namespace App\Http\Controllers\admin\offer;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Models\offer;
use App\Models\site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\offerMail;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $offer = offer::get();
        return view("admin.offer.index", ["offer" => $offer]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function sendMail(Request $request)
    {

        if (isset($request->id) && isset($request->siteId) && isset($request->name) && isset($request->email)) {

            $id = functionController::security($request->id);
            $name = functionController::security($request->name);
            $email = functionController::security($request->email);
            $siteId = functionController::security($request->siteId);

            @$getSite = site::where("id", "=", $siteId)->get();
            if ($getSite[0]["siteName"]) {
                try {
                    $mail = Mail::to($email)->send(new offerMail($getSite[0]["siteName"], $name, $getSite[0]["sitePrice"]));
                    if ($mail) {
                        $all = ["mailAdmin" => 1];
                        $update = offer::where("id", "=", $id)->update($all);
                        if ($update) {
                            return redirect()->back()->with("status","Teklif için E-Posta iletildi.");
                        }else{
                            return redirect()->back()->with("status","Teklif için E-Posta iletildi ama veritabanı güncellenemedi.");
                        }
                    }else{
                        return redirect()->back()->with("status","E-Posta gönderilemedi..");
                    }
                } catch (\Exception $e) {
                    return redirect()->back()->with("status","E-Posta iletilemedi.");
                }
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\admin\contact;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Mail\contactMail;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = contact::get();
        return View("admin.contact.index", ["contact" => $contact]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //dd($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


    }


    public function sendMail(Request $request)
    {

        if (isset($request->id) && isset($request->name) && isset($request->email)) {

            $id = functionController::security($request->id);
            $name = functionController::security($request->name);
            $email = functionController::security($request->email);

            @$getContact = contact::where("id", "=", $id)->get();
            if ($getContact[0]["nameSurname"]) {
                try {
                    $mail = Mail::to($email)->send(new contactMail($name));
                    if ($mail) {
                        $all = ["mailAdmin" => 1];
                        $update = contact::where("id", "=", $id)->update($all);
                        if ($update) {
                            return redirect()->back()->with("status", "İletişim için E-Posta iletildi.");
                        } else {
                            return redirect()->back()->with("status", "İletişim için E-Posta iletildi ama veritabanı güncellenemedi.");
                        }
                    } else {
                        return redirect()->back()->with("status", "E-Posta gönderilemedi..");
                    }
                } catch (\Exception $e) {
                    return redirect()->back()->with("status", "E-Posta iletilemedi.");
                }
            } else {
                return redirect()->back();
            }
        } else {
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

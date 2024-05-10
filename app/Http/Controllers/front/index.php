<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\admin\tool\functionController;
use App\Http\Controllers\Controller;
use App\Mail\contactMail;
use App\Mail\offerMail;
use App\Models\category;
use App\Models\contact;
use App\Models\offer;
use App\Models\setting;
use App\Models\site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class index extends Controller
{
    public function index()
    {
        $sites=site::inRandomOrder()->limit(12)->get();
        return View("front.index",["sites"=>$sites]);
    }

    public function categories()
    {
        $category = category::get();
        return View("front.category", ["category" => $category]);
    }

    public function sites($id = null)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $site = site::where("siteCategoryId", "=", $id)->get();
            return View("front.sites", ["sites" => $site]);
        } else {
            $site = site::get();
            return View("front.sites", ["sites" => $site]);
        }
    }

    public function getOffer($id=null)
    {
        $sites = site::get();
        if (isset($id)) {
            $id = functionController::security($id);
            return View("front.getOffer", ["sites" => $sites, "id" => $id]);
        } else {
            return View("front.getOffer", ["sites" => $sites]);
        }
    }

    public function offerPost(Request $request)
    {
        if ($_POST["g-recaptcha-response"] != null) {
            if (isset($request->nameSurname) && isset($request->email) && isset($request->siteId) && isset($request->message)) {
                if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {


                    $name = functionController::security($request->nameSurname);
                    $email = functionController::security($request->email);
                    $siteId = functionController::security($request->siteId);
                    $message = functionController::security($request->message);

                    $getSite = site::where("id", "=", $siteId)->get();
                    if (isset($getSite[0]["siteName"])) {

                        try {
                            $mail = Mail::to($email)->send(new offerMail($getSite[0]["siteName"], $name, $getSite[0]["sitePrice"]));
                            if ($mail) {
                                $all = ["nameSurname" => $name, "email" => $email, "siteId" => $siteId, "message" => $message, "mailSystem" => 1];
                                $create = offer::create($all);

                                if ($create) {
                                    return redirect()->back()->with("status", "Tekllifiniz iletildi. Cevabınız en kısa sürede tarafınıza iletilecektir.");
                                } else {
                                    return redirect()->back()->with("status", "Tekllifiniz iletilemedi. Lütfen tekrar deneyin.");
                                }
                            } else {
                                $all = ["nameSurname" => $name, "email" => $email, "siteId" => $siteId, "message" => $message, "mailSystem" => 0];
                                $create = offer::create($all);

                                if ($create) {
                                    return redirect()->back()->with("status", "Tekllifiniz iletildi. Cevabınız en kısa sürede tarafınıza iletilecektir.");
                                } else {
                                    return redirect()->back()->with("status", "Tekllifiniz iletilemedi. Lütfen tekrar deneyin.");
                                }
                            }
                        } catch (\Exception $e) {
                            $all = ["nameSurname" => $name, "email" => $email, "siteId" => $siteId, "message" => $message, "mailSystem" => 0];
                            $create = offer::create($all);

                            if ($create) {
                                return redirect()->back()->with("status", "Tekllifiniz iletildi. Cevabınız en kısa sürede tarafınıza iletilecektir.");
                            } else {
                                return redirect()->back()->with("status", "Tekllifiniz iletilemedi. Lütfen tekrar deneyin.");
                            }
                        }
                    } else {
                        return redirect()->back()->with("status", "Lütfen \"Sayfanın HTML etikketleri üzeinde oynama yapmayınız.\" ");
                    }
                } else {
                    return redirect()->back()->with("status", "Lütfen E-Posta adresini ornek@gmal/hotmail.com olarak belirtin.");
                }
            }
        } else {
            return redirect()->back()->with("status", "Lütfen \"Ben Robot Değilim'i İşaretleyin.\" ");
        }
    }


    public function contactPost(Request $request)
    {

        if ($_POST["g-recaptcha-response"] != null ) {
            if (isset($request->nameSurname) && isset($request->email) && isset($request->subject) && isset($request->message)) {
                if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {


                    $name = functionController::security($request->nameSurname);
                    $email = functionController::security($request->email);
                    $subject = functionController::security($request->subject);
                    $message = functionController::security($request->message);

                    try {
                        $mail = Mail::to($email)->send(new contactMail($name));
                        if ($mail) {
                            $all = ["nameSurname" => $name, "email" => $email, "subject" => $subject, "message" => $message, "mailSystem" => 1];
                            $create = contact::create($all);
                            if ($create) {
                                return redirect()->back()->with("status", "Mesajınız iletildi. Size en kısa sürede dönüş yapılacaktır..");

                            } else {
                                return redirect()->back()->with("status", "Mesajınız iletilemedi. Lütfen tekrar deneyin.");
                            }
                        } else {
                            $all = ["nameSurname" => $name, "email" => $email, "subject" => $subject, "message" => $message, "mailSystem" => 0];
                            $create = contact::create($all);
                            if ($create) {
                                return redirect()->back()->with("status", "Mesajınız iletildi. Size en kısa sürede dönüş yapılacaktır..");

                            } else {
                                return redirect()->back()->with("status", "Mesajınız iletilemedi. Lütfen tekrar deneyin.");
                            }
                        }
                    } catch (\Exception $e) {
                        $all = ["nameSurname" => $name, "email" => $email, "subject" => $subject, "message" => $message, "mailSystem" => 0];
                        $create = contact::create($all);
                        if ($create) {
                            return redirect()->back()->with("status", "Mesajınız iletildi. Size en kısa sürede dönüş yapılacaktır..");

                        } else {
                            return redirect()->back()->with("status", "Mesajınız iletilemedi. Lütfen tekrar deneyin.");
                        }
                    }
                } else {
                    return redirect()->back()->with("status","Lütfen E-Posta adresini ornek@gmal/hotmail.com olarak belirtin.");

                }

            } else {
                return redirect()->back()->with("status", "Lütfen \"Boş alan bırakmayın.\" ");
            }
        } else {
           return redirect()->back()->with("status", "Lütfen \"Ben Robot Değilim'i İşaretleyin.\" ");
        }

    }



    public function contact(Request $request)
    {
        return View("front.contact");
    }





    public function sitemap()
    {
        header('Content-type: Application/xml; charset="utf8"', true);
        $xml_path = setting::getSetting("siteUrl")."/sitemap.xml";
        define("PATH",setting::getSetting("siteUrl"));

        $xml_output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xml_output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml_output.="<url><loc>".PATH."/</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";

        $xml_output.="<url><loc>".PATH."/index.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/kategoriler.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/siteler.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/iletisim.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/teklifal.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";

        $categories = category::get();
        foreach($categories as $categoryWrite) {
            $xml_output.="<url><loc>".PATH."/siteler/".$categoryWrite->id."-".functionController::seo($categoryWrite->categoryName).".html"."</loc><lastmod>".substr($categoryWrite->created_at,0,11)."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        }

        $sites = site::get();
        foreach($sites as $sitesWrite) {
            $xml_output.="<url><loc>".PATH."/public/".$sitesWrite->siteUrl."</loc><lastmod>".substr($sitesWrite->created_at,0,11)."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        }


        $xml_output .= "</urlset>";


        print_r($xml_output);
    }



}

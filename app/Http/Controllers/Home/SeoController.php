<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class SeoController extends Controller
{

    public function SeoDuzenle()
    {
        $seo = Seo::find(1);
        return view('admin.anasayfa.seo', compact('seo'));
    }


    public function SeoGuncelle(Request $request) //
    {
        $seo_id = $request->id;  // Gelen id $banner_id atama yaptık
        $eski_resim = $request->onceki_resim;


        if ($request->file('logo'))   // Type File veya resim Olana Uygula
        {
            $resim = $request->file('logo'); //Resim Degişkeni Resmi Atama
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


            Image::make($resim)->resize(202, 70)->save('upload/seo/' . $resimadi);

            $resim_kaydet = 'upload/seo/' . $resimadi;
            // Eski Resim Sil
            if (file_exists($eski_resim)) {
                unlink($eski_resim);
            }
            // Eski Resim Sil

            Seo::findOrFail($seo_id)->update(
                [
                    'title' => $request->title,
                    'site_adi' => $request->site_adi,
                    'aciklama' => $request->aciklama,
                    'keywords' => $request->keywords,
                    'author' => $request->author,
                    'harita' => $request->harita,
                    'logo' => $resim_kaydet,
                    'created_at' => Carbon::now('Europe/Istanbul'),

                ]
            );


            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Logo İle Güncelleme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->back()->with($mesaj);
        } // }  end if
        else {
            Seo::findOrFail($seo_id)->update(
                [
                    'title' => $request->title,
                    'site_adi' => $request->site_adi,
                    'aciklama' => $request->aciklama,
                    'keywords' => $request->keywords,
                    'author' => $request->author,
                    'harita' => $request->harita,
                    'created_at' => Carbon::now('Europe/Istanbul'),

                ]
            );


            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Resimsiz Güncelleme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->back()->with($mesaj);
        }
    }
}

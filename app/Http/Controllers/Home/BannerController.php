<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\Facades\Image;


class BannerController extends Controller
{
    public function HomeBanner()
    {
        $homebanner = Banner::find(1);
        return view('admin.anasayfa.banner_duzenle', compact('homebanner'));
    }


    public function BannerGuncelle(Request $request) //
    {
        $banner_id = $request->id;  // Gelen id $banner_id atama yaptık
        $eski_resim = $request->onceki_resim;


        if ($request->file('resim'))   // Type File veya resim Olana Uygula
        {
            $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


            Image::make($resim)->resize(636, 852)->save('upload/banner/' . $resimadi);

            $resim_kaydet = 'upload/banner/' . $resimadi;
            // Eski Resim Sil
            if (file_exists($eski_resim)) {
                unlink($eski_resim);
            }
            // Eski Resim Sil

            Banner::findOrFail($banner_id)->update(
                [
                    'baslik' => $request->baslik,
                    'alt_baslik' => $request->alt_baslik,
                    'url' => $request->url,
                    'video_url' => $request->video_url,
                    'resim' => $resim_kaydet,
                ]
            );


            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Resim İle Güncelleme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->back()->with($mesaj);
        } // }  end if
        else {
            Banner::findOrFail($banner_id)->update(
                [
                    'baslik' => $request->baslik,
                    'alt_baslik' => $request->alt_baslik,
                    'url' => $request->url,
                    'video_url' => $request->video_url,
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

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hakkimizda;
use App\Models\CokluResim;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class HakkimizdaController extends Controller
{
    public function Hakkimizda()
    {
        $hakkimizda = Hakkimizda::find(1);
        return view('admin.anasayfa.hakkimizda_duzenle', compact('hakkimizda'));
    }


    public function HakkimizdaGuncelle(Request $request) //
    {
        $hakkimizda_id = $request->id;  // Gelen id $banner_id atama yaptık
        $eski_resim = $request->onceki_resim;


        if ($request->file('resim'))   // Type File veya resim Olana Uygula
        {
            $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


            Image::make($resim)->resize(523, 605)->save('upload/hakkimizda/' . $resimadi);

            $resim_kaydet = 'upload/hakkimizda/' . $resimadi;

            // Eski Resim Sil
            if (file_exists($eski_resim)) {
                unlink($eski_resim);
            }
            // Eski Resim Sil

            Hakkimizda::findOrFail($hakkimizda_id)->update(
                [
                    'baslik' => $request->baslik,
                    'kisa_baslik' => $request->kisa_baslik,
                    'kisa_aciklama' => $request->kisa_aciklama,
                    'aciklama' => $request->aciklama,
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
            Hakkimizda::findOrFail($hakkimizda_id)->update(
                [
                    'baslik' => $request->baslik,
                    'kisa_baslik' => $request->kisa_baslik,
                    'kisa_aciklama' => $request->kisa_aciklama,
                    'aciklama' => $request->aciklama,
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


    public function HakkimizdaFrond()
    {
        $hakkimizda = Hakkimizda::find(1);
        return view('frontend.anasayfa.hakkimizda', compact('hakkimizda'));
    }

    // Coklu Resimmmm --------------------------------------------

    public function CokluResim()
    {
        return view('admin.anasayfa.coklu_resim');
    }

    public function CokluForm(Request $request)
    {

        $request->validate(
            [
                'resim' => 'required',
            ],
            [
                'resim.required' => 'Resim Boş Olmaz...',
            ]
        );

        $resimler = $request->file('resim');

        foreach ($resimler as $resim) {
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            Image::make($resim)->resize(220, 220)->save('upload/coklu/' . $resimadi);
            $resim_kaydet = 'upload/coklu/' . $resimadi;


            CokluResim::insert(
                [
                    'resim' => $resim_kaydet,
                    'created_at' => Carbon::now()
                ]
            );
        }

        $mesaj = array(
            'bildirim' => 'Coklu Resim Yükleme başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return Redirect()->route('coklu.liste')->with($mesaj);
    }

    public function CokluListe()
    {
        $cokluresimler = CokluResim::all();
        return view('admin.anasayfa.coklu_liste', compact('cokluresimler'));
    }


    public function CokluDuzenle($id)
    {
        $resim = CokluResim::findOrFail($id);
        return view('admin.anasayfa.coklu_duzenle', compact('resim'));
    }

    public function CokluGuncelle(Request $request)
    {
        $request->validate([
            'resim' => 'required',

        ], [
            'resim.required' => 'Resim Alanı Boş Bırakılamz...',

        ]);

        $id = $request->id;
        $eski_resim = $request->onceki_resim;

        $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
        $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


        Image::make($resim)->resize(222, 222)->save('upload/coklu/' . $resimadi);

        $resim_kaydet = 'upload/coklu/' . $resimadi;

        // Eski Resim Sil
        if (file_exists($eski_resim)) {
            unlink($eski_resim);
        }
        // Eski Resim Sil

        CokluResim::findOrfail($id)->update(
            [
                'resim' => $resim_kaydet,
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Coklu Resim Güncelleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return Redirect()->route('coklu.liste')->with($mesaj);
    }


    public function CokluSil($id)
    {

        $CokluListe = CokluResim::findOrFail($id);

        $resim = $CokluListe->resim;
        unlink($resim);

        CokluResim::findOrFail($id)->delete();

        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Silme Başarılı...',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($mesaj);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogicerik;
use App\Models\Blogkategoriler;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogicerikController extends Controller
{
    public function IcerikListe()
    {
        $icerikliste = Blogicerik::latest()->get(); //latest Eklenen ürünün en son ekleneni en başa alır

        return view('admin.Blogicerikler.icerik_liste', compact('icerikliste'));
    }


    public function BlogIcerikDurum(Request $request)
    {
        $urun = Blogicerik::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success' => 'Başarılı...']);
    }


    public function BlogicerilEkle()
    {
        $kategoriler = Blogkategoriler::latest()->get();
        return view('admin.Blogicerikler.icerik_ekle', compact('kategoriler'));
    }


    public function BlogIcerikEkleFrom(Request $request)
    {

        $request->validate([
            'baslik' => 'required',
        ], [
            'baslik.required' => 'Başlık Adı Boş Bırakılamz...',
        ]);

        $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
        $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


        Image::make($resim)->resize(700, 370)->save('upload/blogicerik/' . $resimadi);

        $resim_kaydet = 'upload/blogicerik/' . $resimadi;

        Blogicerik::insert(
            [
                'kategori_id' => $request->kategori_id,
                'baslik' => $request->baslik,
                'url' => str()->slug($request->baslik),
                'tag' => $request->tag,
                'metin' => $request->metin,
                'anahtar' => $request->anahtar,
                'aciklama' => $request->aciklama,
                'sirano' => $request->sirano,
                'resim' => $resim_kaydet,
                'durum' => 1,
                'created_at' => Carbon::now(),
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Resim İle Yükleme Başarılı...',
            'alert-type' => 'success'
        );

        // toaster Bildirim

        return Redirect()->route('icerik.liste')->with($mesaj);
    }

    public function BlogicerikDuzenle($id)
    {
        $kategoriler = Blogkategoriler::latest()->get();
        $icerikler = Blogicerik::findOrFail($id);
        return view('admin.Blogicerikler.icerk_duzenle', compact('kategoriler', 'icerikler'));
    }


    public function BlogIcerikGuncelle(Request $request)
    {

        $request->validate([
            'baslik' => 'required',
        ], [
            'baslik.required' => 'Başlık Adı Boş Bırakılamz...',
        ]);

        $urun_id = $request->id;
        $eski_resim = $request->onceki_resim;

        if ($request->file('resim'))   // Type File veya resim Olana Uygula
        {
            $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


            Image::make($resim)->resize(700, 370)->save('upload/blogicerik/' . $resimadi);

            $resim_kaydet = 'upload/blogicerik/' . $resimadi;

            // Eski Resim Sil
            if (file_exists($eski_resim)) {
                unlink($eski_resim);
            }
            // Eski Resim Sil

            Blogicerik::findOrfail($urun_id)->update(
                [
                    'kategori_id' => $request->kategori_id,
                    'baslik' => $request->baslik,
                    'url' => str()->slug($request->baslik),
                    'tag' => $request->tag,
                    'metin' => $request->metin,
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'sirano' => $request->sirano,
                    'resim' => $resim_kaydet,
                ]
            );


            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Resim İle Güncelleme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->route('icerik.liste')->with($mesaj);
        } // }  end if
        else {

            Blogicerik::findOrfail($urun_id)->update(
                [
                    'kategori_id' => $request->kategori_id,
                    'baslik' => $request->baslik,
                    'url' => str()->slug($request->baslik),
                    'tag' => $request->tag,
                    'metin' => $request->metin,
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'sirano' => $request->sirano,
                ]
            );


            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Resimsiz Güncelleme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->route('icerik.liste')->with($mesaj);
        }
    }


    public function BlogIcerikSil($id)
    {

        $urun_id = Blogicerik::findOrFail($id);
        $resim = $urun_id->resim;
        if ($resim) {
            unlink($resim);

            Blogicerik::findOrFail($id)->delete();

            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Silme Başarılı...',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($mesaj);
        } else {
            Blogicerik::findOrFail($id)->delete();

            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Silme Başarılı...',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($mesaj);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urunler;
use App\Models\Altkategoriler;
use App\Models\Kategoriler;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class UrunController extends Controller
{
    public function UrunListe()
    {
        $urunliste = Urunler::latest()->get(); //latest Eklenen ürünün en son ekleneni en başa alır

        return view('admin.urunler.urun_liste', compact('urunliste'));
    }


    public function UrunDurum(Request $request)
    {
        $urun = Urunler::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success' => 'Başarılı...']);
    }


    public function UrunEkle()
    {
        $kategoriler = Kategoriler::latest()->get();
        return view('admin.urunler.urun_ekle', compact('kategoriler'));
    }


    public function UrunEkleForm(Request $request)
    {

        $request->validate([
            'baslik' => 'required',
        ], [
            'baslik.required' => 'Başlık Adı Boş Bırakılamz...',
        ]);

        $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
        $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


        Image::make($resim)->resize(700, 370)->save('upload/urunler/' . $resimadi);

        $resim_kaydet = 'upload/urunler/' . $resimadi;

        Urunler::insert(
            [
                'kategori_id' => $request->kategori_id,
                'altkategori_id' => $request->altkategori_id,
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

        return Redirect()->route('urun.liste')->with($mesaj);
    }


    public function UrunDuzenle($id)
    {
        $kategoriler = Kategoriler::latest()->get();
        $altkategoriler = Altkategoriler::latest()->get();
        $urunler = Urunler::findOrFail($id);
        return view('admin.urunler.urun_duzenle', compact('kategoriler', 'altkategoriler', 'urunler'));
    }


    public function UrunGuncelleForm(Request $request)
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


            Image::make($resim)->resize(700, 370)->save('upload/urunler/' . $resimadi);

            $resim_kaydet = 'upload/urunler/' . $resimadi;

            // Eski Resim Sil
            if (file_exists($eski_resim)) {
                unlink($eski_resim);
            }
            // Eski Resim Sil

            Urunler::findOrfail($urun_id)->update(
                [
                    'kategori_id' => $request->kategori_id,
                    'altkategori_id' => $request->altkategori_id,
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

            return Redirect()->route('urun.liste')->with($mesaj);
        } // }  end if
        else {

            Urunler::findOrfail($urun_id)->update(
                [
                    'kategori_id' => $request->kategori_id,
                    'altkategori_id' => $request->altkategori_id,
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

            return Redirect()->route('urun.liste')->with($mesaj);
        }
    }

    public function UrunSil($id)
    {

        $urun_id = Urunler::findOrFail($id);
        $resim = $urun_id->resim;
        if ($resim) {
            unlink($resim);

            Urunler::findOrFail($id)->delete();

            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Silme Başarılı...',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($mesaj);
        } else {
            Urunler::findOrFail($id)->delete();

            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Silme Başarılı...',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($mesaj);
        }
    }
}

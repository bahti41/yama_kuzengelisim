<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class AltkategoriController extends Controller
{
    public function AltKategoriListe()
    {
        $altkategoriler = Altkategoriler::latest()->get();
        return view('admin.altkategoriler.altkategori_liste', compact('altkategoriler'));
    }


    public function AltKategoriEkle()
    {
        $kategorigoster = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
        return view('admin.altkategoriler.altkategori_ekle', compact('kategorigoster'));
    }


    public function AltKategoriEkleForm(Request $request)
    {

        $request->validate([
            'altkategori_adi' => 'required',
            'anahtar' => 'required',
            'aciklama' => 'required',
        ], [
            'altkategori_adi.required' => 'Alt Kategori Adı Boş Bırakılamz...',
            'anahtar.required' => 'Anahtar Kısmı Boş Bırakılamz...',
            'aciklama.required' => 'Acıklama Kısmı Boş Bırakılamz...'
        ]);

        if ($request->file('resim'))   // Type File veya resim Olana Uygula
        {
            $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


            Image::make($resim)->resize(700, 400)->save('upload/altkategoriler/' . $resimadi);

            $resim_kaydet = 'upload/altkategoriler/' . $resimadi;

            Altkategoriler::insert(
                [
                    'kategori_id' => $request->kategori_id,
                    'altkategori_adi' => $request->altkategori_adi,
                    'altkategori_url' => str()->slug($request->altkategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'resim' => $resim_kaydet,
                    'created_at' => Carbon::now(),
                ]
            );


            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Resim İle Yükleme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->route('altkategori.liste')->with($mesaj);
        } // }  end if
        else {
            Altkategoriler::insert(
                [
                    'kategori_id' => $request->kategori_id,
                    'altkategori_adi' => $request->altkategori_adi,
                    'altkategori_url' => str()->slug($request->altkategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                    'created_at' => Carbon::now(),
                ]
            );


            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Resimsiz Yükleme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->route('altkategori.liste')->with($mesaj);
        }
    }


    public function AltKategoriDuzenle($id)
    {
        $kategoriler = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
        $altkategoriler = Altkategoriler::findOrFail($id);
        return view('admin.altkategoriler.altkategori_duzenle', compact('kategoriler', 'altkategoriler'));
    }


    public function AltKategoriGuncelleForm(Request $request)
    {

        $request->validate([
            'altkategori_adi' => 'required',
            'anahtar' => 'required',
            'aciklama' => 'required',
        ], [
            'altkategori_adi.required' => 'Alt Kategori Adı Boş Bırakılamz...',
            'anahtar.required' => 'Anahtar Kısmı Boş Bırakılamz...',
            'aciklama.required' => 'Acıklama Kısmı Boş Bırakılamz...'
        ]);

        $altkategori_id = $request->id;
        $eski_resim = $request->onceki_resim;

        if ($request->file('resim'))   // Type File veya resim Olana Uygula
        {
            $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


            Image::make($resim)->resize(700, 400)->save('upload/altkategoriler/' . $resimadi);

            $resim_kaydet = 'upload/altkategoriler/' . $resimadi;

            // Eski Resim Sil
            if (file_exists($eski_resim)) {
                unlink($eski_resim);
            }
            // Eski Resim Sil

            AltKategoriler::findOrfail($altkategori_id)->update(
                [
                    'kategori_id' => $request->kategori_id,
                    'altkategori_adi' => $request->altkategori_adi,
                    'altkategori_url' => str()->slug($request->altkategori_adi),
                    'anahtar' => $request->anahtar,
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

            return Redirect()->route('altkategori.liste')->with($mesaj);
        } // }  end if
        else {
            AltKategoriler::findOrfail($altkategori_id)->update(
                [
                    'kategori_id' => $request->kategori_id,
                    'altkategori_adi' => $request->altkategori_adi,
                    'altkategori_url' => str()->slug($request->altkategori_adi),
                    'anahtar' => $request->anahtar,
                    'aciklama' => $request->aciklama,
                ]
            );


            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Resimsiz Güncelleme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->route('altkategori.liste')->with($mesaj);
        }
    }


    public function AltKategoriSil($id)
    {
        $altkategori_id = Altkategoriler::findOrFail($id);
        $resim = $altkategori_id->resim;
        if ($resim) {
            unlink($resim);

            Altkategoriler::findOrFail($id)->delete();

            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Silme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->back()->with($mesaj);
        } else {
            Altkategoriler::findOrFail($id)->delete();

            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Silme Başarılı...',
                'alert-type' => 'success'
            );


            // toaster Bildirim

            return Redirect()->back()->with($mesaj);
        }
    }

    // Ajax ile Ürün Eklede Kategori Ve Alt Kategori İşaretmelek İcin
    public function AltAjax($kategori_id)
    {
        $altgetir = Altkategoriler::where('kategori_id', $kategori_id)->orderBy('altkategori_adi', 'ASC')->get();
        return json_encode($altgetir);
    }
}

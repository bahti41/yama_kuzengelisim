<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;


class KategoriController extends Controller
{
    public function KategoriHepsi()
    {
        $kategorihepsi = Kategoriler::latest()->get(); //latest Eklenen ürünün en son ekleneni en başa alır

        return view('admin.kategoriler.kategoriler_hepsi', compact('kategorihepsi'));
    }

    public function KategoriDurum(Request $request)
    {
        $urun = Kategoriler::find($request->id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success' => 'Başarılı...']);
    }

    public function KategoriEkle()
    {
        return view('admin.kategoriler.kategori_ekle');
    }


    public function KategoriEkleForm(Request $request)
    {

        $request->validate([
            'kategori_adi' => 'required',
            'anahtar' => 'required',
            'aciklama' => 'required',
        ], [
            'kategori_adi.required' => 'Kategori Adı Boş Bırakılamz...',
            'anahtar.required' => 'Anahtar Kısmı Boş Bırakılamz...',
            'aciklama.required' => 'Acıklama Kısmı Boş Bırakılamz...'
        ]);

        if ($request->file('resim'))   // Type File veya resim Olana Uygula
        {
            $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


            Image::make($resim)->resize(700, 400)->save('upload/kategoriler/' . $resimadi);

            $resim_kaydet = 'upload/kategoriler/' . $resimadi;

            Kategoriler::insert(
                [
                    'kategori_adi' => $request->kategori_adi,
                    'kategori_url' => str()->slug($request->kategori_adi),
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

            return Redirect()->route('kategori.hepsi')->with($mesaj);
        } // }  end if
        else {
            Kategoriler::insert(
                [
                    'kategori_adi' => $request->kategori_adi,
                    'kategori_url' => str()->slug($request->kategori_adi),
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

            return Redirect()->route('kategori.hepsi')->with($mesaj);
        }
    }


    public function KategoriDuzenle($id)
    {
        $kategoriduzenle = Kategoriler::findOrFail($id);
        return view('admin.kategoriler.kategoriler_duzenle', compact('kategoriduzenle'));
    }


    public function KategoriGuncelleForm(Request $request)
    {

        $request->validate([
            'kategori_adi' => 'required',
            'anahtar' => 'required',
            'aciklama' => 'required',
        ], [
            'kategori_adi.required' => 'Kategori Adı Boş Bırakılamz...',
            'anahtar.required' => 'Anahtar Kısmı Boş Bırakılamz...',
            'aciklama.required' => 'Acıklama Kısmı Boş Bırakılamz...'
        ]);

        $kategori_id = $request->id;
        $eski_resim = $request->onceki_resim;

        if ($request->file('resim'))   // Type File veya resim Olana Uygula
        {
            $resim = $request->file('resim'); //Resim Degişkeni Resmi Atama
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();  // Resime Verilen adın benzersiz olmasonı saglar


            Image::make($resim)->resize(700, 400)->save('upload/kategoriler/' . $resimadi);

            $resim_kaydet = 'upload/kategoriler/' . $resimadi;

            // Eski Resim Sil
            if (file_exists($eski_resim)) {
                unlink($eski_resim);
            }
            // Eski Resim Sil

            Kategoriler::findOrfail($kategori_id)->update(
                [
                    'kategori_adi' => $request->kategori_adi,
                    'kategori_url' => str()->slug($request->kategori_adi),
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

            return Redirect()->route('kategori.hepsi')->with($mesaj);
        } // }  end if
        else {
            Kategoriler::findOrfail($kategori_id)->update(
                [
                    'kategori_adi' => $request->kategori_adi,
                    'kategori_url' => str()->slug($request->kategori_adi),
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

            return Redirect()->route('kategori.hepsi')->with($mesaj);
        }
    }


    public function KategoriSil($id)
    {

        $kategori_id = Kategoriler::findOrFail($id);
        $resim = $kategori_id->resim;
        if ($resim) {
            unlink($resim);

            Kategoriler::findOrFail($id)->delete();

            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Silme Başarılı...',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($mesaj);
        } else {
            Kategoriler::findOrFail($id)->delete();

            // toaster Bildirim

            $mesaj = array(
                'bildirim' => 'Silme Başarılı...',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($mesaj);
        }
    }
}

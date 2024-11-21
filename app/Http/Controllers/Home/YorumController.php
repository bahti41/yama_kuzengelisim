<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Yorumlar;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class YorumController extends Controller
{

    public function Yorumlar()
    {
        $yorumlar = Yorumlar::latest()->get();
        return view('admin.anasayfa.yorum_liste', compact('yorumlar'));
    }


    public function YorumDurum(Request $request)
    {
        $yorum = Yorumlar::find($request->id);
        $yorum->durum = $request->durum;
        $yorum->save();

        return response()->json(['success' => 'Başarılı...']);
    }



    public function YorumEkle()
    {
        return view('admin.anasayfa.yorum_ekle');
    }


    public function YorumEkleForm(Request $request)
    {

        $request->validate([
            'adi' => 'required',
            'metin' => 'required',
        ], [
            'adi.required' => 'adi Adı Boş Bırakılamz...',
            'metin.required' => 'Metin Alanı Boş Bırakılamz...',
        ]);

        Yorumlar::insert(
            [
                'adi' => $request->adi,
                'Metin' => $request->metin,
                'durum' => 1,
                'sirano' => $request->sirano,
                'created_at' => Carbon::now('Europe/Istanbul'),
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Yükleme Başarılı...',
            'alert-type' => 'success'
        );

        // toaster Bildirim

        return Redirect()->route('yorum.liste')->with($mesaj);
    }


    public function YorumDuzenle($id)
    {
        $yorumduzenle = Yorumlar::findOrFail($id);
        return view('admin.anasayfa.yorum_duzenle', compact('yorumduzenle'));
    }



    public function YorumGuncelleForm(Request $request)
    {

        $request->validate([
            'adi' => 'required',
            'metin' => 'required',
        ], [
            'adi.required' => 'Adi Adı Boş Bırakılamz...',
            'metin.required' => 'Metin Adı Boş Bırakılamz...',
        ]);

        $yorum_id = $request->id;

        Yorumlar::findOrfail($yorum_id)->update(
            [
                'adi' => $request->adi,
                'metin' => $request->metin,
                'sirano' => $request->sirano,
                'updated_at' => Carbon::now('Europe/Istanbul'),
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Güncelleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return Redirect()->route('yorum.liste')->with($mesaj);
    }



    public function YorumSil($id)
    {

        $yorum_id = Yorumlar::findOrFail($id);

        Yorumlar::findOrFail($id)->delete();

        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Silme Başarılı...',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($mesaj);
    }
}

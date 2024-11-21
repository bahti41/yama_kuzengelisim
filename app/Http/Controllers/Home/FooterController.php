<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    public function FooterDuzenle()
    {
        $footer = Footer::find(1);
        return view('admin.anasayfa.footer_duzenle', compact('footer'));
    }


    public function FooterGuncelle(Request $request) //
    {
        $footer_id = $request->id;


        Footer::findOrFail($footer_id)->update(
            [
                'baslikbir' => $request->baslikbir,
                'baslikiki' => $request->baslikiki,
                'baslikuc' => $request->baslikuc,
                'telefon' => $request->telefon,
                'metin' => $request->metin,
                'sehir' => $request->sehir,
                'adres' => $request->adres,
                'mail' => $request->mail,
                'sosyal_baslik' => $request->sosyal_baslik,
                'aciklama' => $request->aciklama,
                'facebook' => $request->facebook,
                'tiwitter' => $request->tiwitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'copy_right' => $request->copy_right,
                'updated_at' => Carbon::now('Europe/Istanbul'),
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Footer Güncelleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return Redirect()->back()->with($mesaj);
    }
}

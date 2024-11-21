<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surec;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class SurecController extends Controller
{

    public function SurecListe()
    {
        $surechepsi = Surec::latest()->get(); //latest Eklenen ürünün en son ekleneni en başa alır

        return view('admin.surec.surec_hepsi', compact('surechepsi'));
    }


    public function SurecDurum(Request $request)
    {
        $urun = Surec::find($request->id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success' => 'Başarılı...']);
    }


    public function SurecEkle()
    {
        $surecler = Surec::latest()->get();
        return view('admin.surec.surec_ekle', compact('surecler'));
    }



    public function SurecEkleForm(Request $request)
    {

        $request->validate([
            'surec' => 'required',
            'baslik' => 'required',
        ], [
            'surec.required' => 'Sürec Adı Boş Bırakılamz...',
            'baslik.required' => 'Başlık Adı Boş Bırakılamz...',
        ]);

        Surec::insert(
            [
                'surec' => $request->surec,
                'baslik' => $request->baslik,
                'aciklama' => $request->aciklama,
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

        return Redirect()->route('surec.liste')->with($mesaj);
    }


    public function SurecDuzenle($id)
    {
        $surecler = Surec::findOrFail($id);
        return view('admin.surec.surec_duzenle', compact('surecler'));
    }



    public function SurecGuncelleForm(Request $request)
    {

        $request->validate([
            'surec' => 'required',
            'baslik' => 'required',
        ], [
            'surec.required' => 'Süreç Adı Boş Bırakılamz...',
            'baslik.required' => 'Başlık Adı Boş Bırakılamz...',
        ]);

        $surec_id = $request->id;

        surec::findOrfail($surec_id)->update(
            [
                'surec' => $request->surec,
                'baslik' => $request->baslik,
                'aciklama' => $request->aciklama,
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

        return Redirect()->route('surec.liste')->with($mesaj);
    }


    public function SurecSil($id)
    {

        $surec_id = Surec::findOrFail($id);

        Surec::findOrFail($id)->delete();

        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Silme Başarılı...',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($mesaj);
    }
}

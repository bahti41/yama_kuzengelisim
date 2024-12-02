<?php

namespace App\Http\Controllers\Admin;

use App\Exports\QuoteExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesaj;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class MesajController extends Controller
{
    public function Iletisim()
    {
        return view('frontend.mesaj.iletisim');
    }


    public function TeklifForm(Request $request)
    {
        $request->validate([
            'adi' => 'required',
            'email' => 'required|email',
            'telefon' => 'required|digits:11|numeric',
            'konu' => 'required',
            'mesaj' => 'required'
        ], [
            'adi.required' => 'Ad SoyAd Boş Olamaz...',
            'email.required' => 'Mail Boş Olamaz...',
            'email.email' => 'E-mail Email Formatında Olmalıdr...',
            'telefon.required' => 'Telefon Boş Olamaz...',
            'telefon.digits' => 'Telefon Numarası Boşluksuz 11 Karakter olmalıdır...',
            'konu.required' => 'Konu Boş Olamaz...',
            'mesaj.required' => 'Mesaj Boş Olamaz...'
        ]);

        Mesaj::create($request->all());

        $mesaj = array(
            'bildirim' => 'En  Kısa Sürede tarafınıza dönüş sağlanacaktır. Başarılı...',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($mesaj);
    }


    public function MesajListe()
    {
        $mesajliste = Mesaj::latest()->get(); //latest Eklenen ürünün en son ekleneni en başa alır

        return view('admin.mesajlar.mesajlar_hepsi', compact('mesajliste'));
    }



    public function ExportExcel()
    {
        return Excel::download(new QuoteExport, 'teklifler.xlsx');
    }
}

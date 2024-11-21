<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogkategoriler;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogkategoriController extends Controller
{

    public function BlogListe()
    {
        $blogliste = Blogkategoriler::latest()->get(); //latest Eklenen ürünün en son ekleneni en başa alır

        return view('admin.Blogkategoriler.blog_liste', compact('blogliste'));
    }


    public function BlogKategoriDurum(Request $request)
    {
        $urun = Blogkategoriler::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success' => 'Başarılı...']);
    }


    public function  BlogkategoriEkle()
    {
        return view('admin.blogkategoriler.blogkategori_ekle');
    }


    public function BlogKayegoriForm(Request $request)
    {

        $request->validate([
            'kategori_adi' => 'required',
        ], [
            'kategori_adi.required' => 'Kategori Adı Boş Bırakılamz...',
        ]);

        Blogkategoriler::insert(
            [
                'kategori_adi' => $request->kategori_adi,
                'url' => str()->slug($request->kategori_adi),
                'sirano' => $request->sirano,
                'aciklama' => $request->aciklama,
                'anahtar' => $request->anahtar,
                'durum' => 1,
                'created_at' => Carbon::now(),
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Blog Kategori Eklme Başarılı...',
            'alert-type' => 'success'
        );

        // toaster Bildirim

        return Redirect()->route('blog.liste')->with($mesaj);
    }

    public function BlogKategoriDuzenle($id)
    {
        $Blogkategoriduzenle = Blogkategoriler::findOrFail($id);
        return view('admin.blogkategoriler.blogkategoriler_duzenle', compact('Blogkategoriduzenle'));
    }

    public function BlogKategoriGuncelle(Request $request)
    {

        $request->validate([
            'kategori_adi' => 'required',
            'sirano' => 'required',
        ], [
            'kategori_adi.required' => 'Kategori Adı Giriniz...',
            'sirano.required' => 'Sıra Numarası Gitiniz...'
        ]);

        $kategori_id = $request->id;

        Blogkategoriler::findOrfail($kategori_id)->update(
            [
                'kategori_adi' => $request->kategori_adi,
                'url' => str()->slug($request->kategori_adi),
                'sirano' => $request->sirano,
                'aciklama' => $request->aciklama,
                'anahtar' => $request->anahtar,
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Blog Güncelleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return Redirect()->route('blog.liste')->with($mesaj);
    }

    public function BlogKategoriSil($id)
    {

        $kategori_id = Blogkategoriler::findOrFail($id);
        $resim = $kategori_id->resim;

        Blogkategoriler::findOrFail($id)->delete();

        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Blog Silme Başarılı...',
            'alert-type' => 'success'
        );
        // toaster Bildirim

        return Redirect()->back()->with($mesaj);
    }
}

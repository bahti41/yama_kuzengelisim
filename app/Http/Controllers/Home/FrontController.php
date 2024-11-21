<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urunler;
use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use App\Models\Blogicerik;
use App\Models\Blogkategoriler;



class FrontController extends Controller
{
    public function urunDetay($id, $url)
    {
        $urunler = Urunler::findOrFail($id);
        $etiketler = $urunler->tag;
        $etiket = explode(',', $etiketler);

        return view('frontend.urunler.urun_detay', compact('urunler', 'etiket'));
    }

    public function KategoriDetay(Request $request, $id, $url)
    {
        $urunler = Urunler::where('durum', 1)->where('kategori_id', $id)->orderBy('sirano', 'ASC')->paginate(3);
        $kategoriler = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
        $kategori = Kategoriler::where('id', $id)->first();

        return view('frontend.urunler.kategori_detay', compact('urunler', 'kategoriler', 'kategori'));
    }

    public function AltDetay(Request $request, $id, $url)
    {
        $urunler = Urunler::where('durum', 1)->where('altkategori_id', $id)->orderBy('sirano', 'ASC')->paginate(3);
        $altkategoriler = Altkategoriler::orderBy('altkategori_adi', 'ASC')->get();
        $altkategori = Altkategoriler::where('id', $id)->first();

        return view('frontend.urunler.altkategori_detay', compact('urunler', 'altkategoriler', 'altkategori'));
    }


    public function IcerikDetay($id)
    {
        $icerikhepsi = Blogicerik::where('durum', 1)->orderBy('sirano', 'ASC')->limit(5)->get();
        $icerik = Blogicerik::findOrFail($id);
        $kategoriler = Blogkategoriler::where('durum', 1)->orderBy('sirano', 'ASC')->limit(5)->get();
        $etiketler = $icerik->tag;
        $etiket = explode(',', $etiketler);

        return view('frontend.blog.icerik_detay', compact('icerikhepsi', 'icerik', 'kategoriler', 'etiket'));
    }


    public function IceriKategoriDetay($id)
    {
        $blogpost = Blogicerik::where('durum', 1)->where('kategori_id', $id)->orderBy('sirano', 'ASC')->paginate(2);
        $icerikhepsi = Blogicerik::where('durum', 1)->orderBy('sirano', 'ASC')->get();
        $kategoriler = Blogkategoriler::where('durum', 1)->orderBy('sirano', 'ASC')->limit(5)->get();
        $kategoriadi = Blogkategoriler::findOrFail($id);

        return view('frontend.blog.kategori_icerik_detay', compact('blogpost', 'icerikhepsi', 'kategoriler', 'kategoriadi'));
    }


    public function BlogHepsi()
    {
        $kategoriler = Blogkategoriler::where('durum', 1)->orderBy('sirano', 'ASC')->limit(5)->get();
        $icerikhepsi = Blogicerik::where('durum', 1)->orderBy('sirano', 'ASC')->paginate(5);
        return view('frontend.blog.blog_hepsi', compact('kategoriler', 'icerikhepsi'));
    }
}

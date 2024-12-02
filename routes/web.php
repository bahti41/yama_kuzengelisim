<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AltkategoriController;
use App\Http\Controllers\Admin\UrunController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Controllers\Admin\BlogkategoriController;
use App\Http\Controllers\Admin\BlogicerikController;
use App\Http\Controllers\Home\HakkimizdaController;
use App\Http\Controllers\Admin\MesajController;
use App\Http\Controllers\Admin\SurecController;
use App\Http\Controllers\Home\YorumController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\SeoController;
use App\Http\Controllers\Admin\RolController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

// Hakkımızda Route
Route::controller(HakkimizdaController::class)->group(function () {
    Route::get('/hakkimizda/duzenle', 'Hakkimizda')->name('hakkimizda')->middleware('permission:Hakkımızda.duzenle')->middleware('auth');
    Route::post('/hakkimizda/guncelle', 'HakkimizdaGuncelle')->name('hakkimizda.guncelle')->middleware('auth');
    Route::get('/hakkimizda', 'HakkimizdaFrond')->name('anasayfa.hak');
    Route::get('/coklu/resim', 'CokluResim')->name('coklu.resim')->middleware('permission:	Hakkımızda.Coklu.Ekle')->middleware('auth');
    Route::post('/coklu/form', 'CokluForm')->name('coklu.resim.from')->middleware('auth');
    Route::get('/coklu/liste', 'CokluListe')->name('coklu.liste')->middleware('permission:Hakkımızda.Coklu.liste')->middleware('auth');
    Route::get('/coklu/duzenle/{id}', 'CokluDuzenle')->name('coklu.duzenle')->middleware('permission:Hakkımızda.Coklu.Düzenle')->middleware('auth');
    Route::post('/coklu/guncelle', 'CokluGuncelle')->name('coklu.guncelle')->middleware('auth');
    Route::get('/coklu/sil/{id}', 'CokluSil')->name('coklu.sil')->middleware('auth');
});

Route::middleware('auth')->group(function () {

    // Seo Route
    Route::controller(SeoController::class)->group(function () {
        Route::get('/seo/duzenle', 'SeoDuzenle')->name('seo.duzenle');
        Route::post('/seo/guncelle', 'SeoGuncelle')->name('seo.guncelle');
    });



    // Banner Route
    Route::controller(BannerController::class)->group(function () {
        Route::get('/banner/duzenle', 'HomeBanner')->name('banner')->middleware('permission:Banner.menu');
        Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle')->middleware('permission:Banner.düzenle');
    });



    // Footer Route
    Route::controller(FooterController::class)->group(function () {
        Route::get('/footer/duzenle', 'FooterDuzenle')->name('footer.duzenle');
        Route::post('/footer/guncelle', 'FooterGuncelle')->name('footer.guncelle');
    });







    // Kategory Route
    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori/hepsi', 'KategoriHepsi')->name('kategori.hepsi')->middleware('permission:Kategori.Liste');
        Route::get('/kategori/durum', 'KategoriDurum');
        Route::get('/kategori/ekle', 'KategoriEkle')->name('kategori.ekle')->middleware('permission:Kategori.ekle');
        Route::post('/kategori/ekle/form', 'KategoriEkleForm')->name('kategori.ekle.form');
        Route::get('/kategori/duzenle/{id}', 'KategoriDuzenle')->name('kategori.duzenle')->middleware('permission:Kategori.Düzenle');
        Route::post('/kategori/guncelle/form', 'KategoriGuncelleForm')->name('kategori.guncelle.form');
        Route::get('/kategori/sil/{id}', 'KategoriSil')->name('kategori.sil');
    });



    // Alt Kategory Route
    Route::controller(AltkategoriController::class)->group(function () {
        Route::get('/altkategori/liste', 'AltKategoriListe')->name('altkategori.liste')->middleware('permission:Altkategoriler.Liste');
        Route::get('/altkategori/ekle', 'AltKategoriEkle')->name('altkategori.ekle')->middleware('permission:Altkategoriler.Ekle');
        Route::post('/altkategori/ekle/form', 'AltKategoriEkleForm')->name('altkategori.ekle.form');
        Route::get('/altkategori/duzenle/{id}', 'AltKategoriDuzenle')->name('altkategori.duzenle')->middleware('permission:Altkategoriler.Duzunle');
        Route::post('/altkategori/guncelle/form', 'AltKategoriGuncelleForm')->name('altkategori.guncelle.form');
        Route::get('/altkategori/sil/{id}', 'AltKategoriSil')->name('altkategori.sil');
        Route::get('/altkategoriler/ajax/{kategori_id}', 'AltAjax');
    });



    // Ürünler Route
    Route::controller(UrunController::class)->group(function () {
        Route::get('/urun/liste', 'UrunListe')->name('urun.liste')->middleware('permission:Ürün.Liste');
        Route::get('/urun/durum', 'UrunDurum');
        Route::get('/urun/ekle', 'UrunEkle')->name('urun.ekle')->middleware('permission:Ürünler.Ekle');
        Route::post('/urun/ekle/form', 'UrunEkleForm')->name('urun.ekle.form');
        Route::get('/urun/duzenle/{id}', 'UrunDuzenle')->name('urun.duzenle')->middleware('permission:Ürünler.Düzenle');
        Route::post('/urun/guncelle/form', 'UrunGuncelleForm')->name('urun.guncelle.form');
        Route::get('/urun/sil/{id}', 'UrunSil')->name('urun.sil');
    });



    // Blog Kategory Route
    Route::controller(BlogkategoriController::class)->group(function () {
        Route::get('/blog/kategori/liste', 'BlogListe')->name('blog.liste')->middleware('permission:Blog.Liste');
        Route::get('/blog/kategori/durum', 'BlogKategoriDurum');
        Route::get('/blog/kategori/ekle', 'BlogkategoriEkle')->name('blog.kategori.ekle')->middleware('permission:Blog.Ekle');
        Route::post('/blog/kategori/form', 'BlogKayegoriForm')->name('blog.kategori.form');
        Route::get('/blogkategori/duzenle/{id}', 'BlogKategoriDuzenle')->name('blog.kategori.duzenle')->middleware('permission:Blog.Duzenle');
        Route::post('/blogkategori/guncelle', 'BlogKategoriGuncelle')->name('blog.kategori.guncelle');
        Route::get('/blogkategori/sil/{id}', 'BlogKategoriSil')->name('blog.kategori.sil');
    });



    // Blog İcerik Route
    Route::controller(BlogicerikController::class)->group(function () {
        Route::get('/blog/icerik/liste', 'IcerikListe')->name('icerik.liste')->middleware('permission:Blogicerik.Liste');
        Route::get('/blog/icerik/durum', 'BlogIcerikDurum');
        Route::get('/blog/icerik/ekle', 'BlogicerilEkle')->name('blog.icerik.ekle')->middleware('permission:Blogicerik.Ekle');
        Route::post('/blog/icerik/ekle/from', 'BlogIcerikEkleFrom')->name('blog.icerik.ekle.form');
        Route::get('/blogicerik/duzenle/{id}', 'BlogicerikDuzenle')->name('blog.icerik.duzenle')->middleware('permission:Blogicerik.Düzenle');
        Route::post('/blogicerik/guncelle', 'BlogIcerikGuncelle')->name('blog.icerik.guncelle.form');
        Route::get('/blogicerik/sil/{id}', 'BlogIcerikSil')->name('blog.icerik.sil');
    });



    // Surec İcerik Route
    Route::controller(SurecController::class)->group(function () {
        Route::get('/surec/liste', 'SurecListe')->name('surec.liste')->middleware('permission:Sürec.Liste');
        Route::get('/surec/icerik/durum', 'SurecDurum');
        Route::get('/surec/ekle', 'SurecEkle')->name('surec.ekle')->middleware('permission:Sürec.Ekle');
        Route::post('/surec/ekle/form', 'SurecEkleForm')->name('surec.ekle.form');
        Route::get('/surec/duzenle/{id}', 'SurecDuzenle')->name('surec.duzenle')->middleware('permission:Sürec.Düzenle');
        Route::post('/surec/guncelle/guncelle', 'SurecGuncelleForm')->name('surec.guncelle.form');
        Route::get('/surec/sil/{id}', 'SurecSil')->name('surec.sil');
    });



    // Yorum Formu Route
    Route::controller(YorumController::class)->group(function () {
        Route::get('/yorumlar', 'Yorumlar')->name('yorum.liste')->middleware('permission:Yorum.Liste');
        Route::get('/yorum/durum', 'YorumDurum');
        Route::get('/yorum/ekle', 'YorumEkle')->name('yorum.ekle')->middleware('permission:Yorum.Ekle');
        Route::post('/yorum/ekle/form', 'YorumEkleForm')->name('yorum.ekle.form');
        Route::get('/yorum/duzenle/{id}', 'YorumDuzenle')->name('yorum.duzenle')->middleware('permission:Yorum.Düzenle');
        Route::post('/yorum/guncelle/form', 'YorumGuncelleForm')->name('yorum.guncelle.form');
        Route::get('/yorum/sil/{id}', 'YorumSil')->name('yorum.sil');
    });


    // İzinler Route
    Route::controller(RolController::class)->group(function () {
        Route::get('/izin/liste', 'IzinListe')->name('izin.liste')->middleware('permission:RolIzin.izin');
        Route::get('/izin/ekle', 'IzinEkle')->name('izin.ekle')->middleware('permission:RolIzin.izin.Ekle');
        Route::post('/izin/ekle/form', 'IzinEkleForm')->name('izin.ekle.form');
        Route::get('/izin/duzenle/{id}', 'IzinDuzenle')->name('izin.duzenle')->middleware('permission:RolIzin.izin.Düzenle');
        Route::post('/izin/guncelle/form', 'IzinGuncelleForm')->name('izin.guncelle.form');
        Route::get('/izin/sil/{id}', 'IzinSil')->name('izin.sil')->middleware('permission:RolIzin.izin.Sil');
    });


    // Rol Route
    Route::controller(RolController::class)->group(function () {
        Route::get('/rol/liste', 'RolListe')->name('rol.liste')->middleware('permission:RolIzin.rol');
        Route::get('/rol/ekle', 'RolEkle')->name('rol.ekle')->middleware('permission:RolIzin.rol.Ekle');
        Route::post('/rol/ekle/form', 'RolEkleForm')->name('rol.ekle.form');
        Route::get('/rol/duzenle/{id}', 'RolDuzenle')->name('rol.duzenle')->middleware('permission:RolIzin.rol.Düzenle');
        Route::post('/rol/guncelle/form', 'RolGuncelleForm')->name('rol.guncelle.form');
        Route::get('/rol/sil/{id}', 'RolSil')->name('rol.sil')->middleware('permission:RolIzin.rol.Sil');

        // Role Yetki Verme Route
        Route::get('/rol/izin/verme', 'RolIzinVerme')->name('rol.izin.verme')->middleware('permission:RolYetki.Ver');
        Route::post('/yetki/ver/form', 'YetkiVerForm')->name('yetki.ver.form');
        Route::get('/rol/yetki/liste', 'RolYetkiListe')->name('rol.yetki.verme')->middleware('permission:RolYetki.Liste');
        Route::get('/rol/yetki/duzenle/{id}', 'RolYetkiDuzenle')->name('rol.yetki.duzenle')->middleware('permission:RolYetki.Düzenle');
        Route::post('/rol/yetki/guncelle/form/{id}', 'RolYetkiGuncelleForm')->name('rol.yetki.guncelle.form');
        Route::get('/admin/rol/sil/{id}', 'AdminRolSil')->name('admin.rol.sil')->middleware('permission:RolYetki.Sil');


        // Kullanıcı Route
        Route::get('/kullanici/liste', 'KullaniciListe')->name('kullanici.liste')->middleware('permission:Kullanici.Liste');
        Route::get('/kullanici/ekle', 'KullaniiciEkle')->name('kullanici.ekle')->middleware('permission:Kullanici.ekle');
        Route::post('/kullanici/ekle/form', 'KullaniciEkleForm')->name('kullanici.ekle.form');
        Route::get('/kullanici/duzenle/{id}', 'KullaniciDuzenle')->name('kullanici.duzenle')->middleware('permission:Kullanici.düzenle');
        Route::post('/kullanici/guncelle/form/{id}', 'KullaniciGuncelleForm')->name('kullanici.guncelle.form');
        Route::get('/kullanici/rol/sil/{id}', 'KullanicilSil')->name('kullanici.sil')->middleware('permission:Kullanici.sil');
    });







    // Admin Panel
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->middleware(['auth', 'verified'])->name('dashboard');


    // Admin Panel Profile

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Front Route
Route::get('/urun/{id}/{url}', [FrontController::class, 'UrunDetay']);
Route::get('/kategori/{id}/{url}', [FrontController::class, 'KategoriDetay']);
Route::get('/altkategori/{id}/{url}', [FrontController::class, 'AltDetay']);
Route::get('/post/{id}/{url}', [FrontController::class, 'IcerikDetay']);
Route::get('/postblog/{id}/{url}', [FrontController::class, 'IceriKategoriDetay']);
Route::get('/blog', [FrontController::class, 'BlogHepsi']);



// Teklif Formu Route
Route::controller(MesajController::class)->group(function () {
    Route::get('/iletisim', 'Iletisim')->name('iletisim');
    Route::post('/tekif/form', 'TeklifForm')->name('teklif.form');
});

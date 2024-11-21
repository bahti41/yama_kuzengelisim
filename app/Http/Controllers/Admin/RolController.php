<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Carbon;
use DB;


class RolController extends Controller
{
    public function IzinListe()
    {
        $izinler = Permission::all();
        return view('admin.rol.izin_liste', compact('izinler'));
    }


    public function IzinEkle()
    {
        return view('admin.rol.izin_ekle');
    }



    public function IzinEkleForm(Request $request)
    {



        $izin = Permission::create(
            [
                'name' => $request->name,
                'grup_adi' => $request->grup_adi,
                'updated_at' => Carbon::now('Europe/Istanbul'),
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'İzin Yükleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return redirect()->route('izin.liste')->with($mesaj);
    }


    public function IzinDuzenle($id)
    {
        $izinler = Permission::findOrFail($id);
        return view('admin.rol.izin_duzenle', compact('izinler'));
    }



    public function IzinGuncelleForm(Request $request)
    {


        $izin_id = $request->id;

        Permission::findOrfail($izin_id)->update(
            [
                'name' => $request->name,
                'grup_adi' => $request->grup_adi,
                'updated_at' => Carbon::now('Europe/Istanbul'),
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Güncelleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return redirect()->route('izin.liste')->with($mesaj);
    }



    public function IzinSil($id)
    {

        $izin_id = Permission::findOrFail($id);

        Permission::findOrFail($id)->delete();

        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Silme Başarılı...',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($mesaj);
    }



    //******************    ROLLER     **********************




    public function RolListe()
    {
        $rol = Role::all();
        return view('admin.rol.rol_liste', compact('rol'));
    }



    public function RolEkle()
    {
        return view('admin.rol.rol_ekle');
    }



    public function RolEkleForm(Request $request)
    {

        $rol = Role::create(
            [
                'name' => $request->name,
                'updated_at' => Carbon::now('Europe/Istanbul'),
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Rol Yükleme Başarılı...',
            'alert-type' => 'success'

        );


        // toaster Bildirim

        return Redirect()->route('rol.liste')->with($mesaj);
    }



    public function RolDuzenle($id)
    {
        $roller = Role::findOrFail($id);
        return view('admin.rol.rol_duzenle', compact('roller'));
    }



    public function RolGuncelleForm(Request $request)
    {


        $rol_id = $request->id;

        Role::findOrfail($rol_id)->update(
            [
                'name' => $request->name,
                'updated_at' => Carbon::now('Europe/Istanbul'),
            ]
        );


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Güncelleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return redirect()->route('rol.liste')->with($mesaj);
    }


    public function rolSil($id)
    {

        $rol_id = Role::findOrFail($id);

        Role::findOrFail($id)->delete();

        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Silme Başarılı...',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($mesaj);
    }



    // ***************** Role İzin Yetki Verme ******************




    public function RolIzinVerme()
    {
        $roller = Role::all();
        $izinler = Permission::all();
        $izin_gruplari = User::IzinGruplari();

        return view('admin.rol.rol_izin_ver', compact('roller', 'izinler', 'izin_gruplari'));
    }


    public function YetkiVerForm(Request $request)
    {
        $data = array();
        $yetkiler = $request->yetki;

        foreach ($yetkiler as $key => $item) {
            $data['role_id'] = $request->rol_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Yetki Verme Başarılı...',
            'alert-type' => 'success'
        );
        return redirect()->route('rol.liste')->with($mesaj);
    }


    public function RolYetkiListe()
    {
        $rol = Role::all();
        return view('admin.rol.rol_yetki_ver', compact('rol'));
    }



    public function RolYetkiDuzenle($id)
    {
        $rol = Role::findOrFail($id);
        $yetkiler = Permission::all();
        $izin_gruplari = User::IzinGruplari();

        return view('admin.rol.rol_yetki_duzenle', compact('rol', 'yetkiler', 'izin_gruplari'));
    }



    public function RolYetkiGuncelleForm(Request $request, $id)
    {
        $rol = Role::findOrFail($id);
        $secili_yetkiler = $request->yetki;

        $gecerli_yetkiler = Permission::whereIn('id', $secili_yetkiler)
            ->where('guard_name', 'web')
            ->pluck('name')
            ->toArray();

        if (!empty($gecerli_yetkiler)) {
            $rol->syncPermissions($gecerli_yetkiler);
        } // Senkronize etmek güncelleme yapma syncPermissions (Laravel-permission sitesinden)


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Rol Güncelleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return redirect()->route('rol.yetki.verme')->with($mesaj);
    }



    public function AdminRolSil($id)
    {

        $rol = Role::findOrFail($id);


        if (!is_null($rol)) {
            $rol->delete();
        }

        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Silme Başarılı...',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($mesaj);
    }



    // ***************** Kulllanıcı Route ******************




    public function KullaniciListe()
    {
        $kullanici_liste = User::where('rol', 'admin')->latest()->get();
        return view('admin.kullanicilar.Kullanici_liste', compact('kullanici_liste'));
    }



    public function KullaniiciEkle()
    {
        $roller =  Role::all();
        return view('admin.kullanicilar.kullanici_ekle', compact('roller'));
    }



    public function KullaniciEkleForm(Request $request)
    {

        $request->validate([
            'email' => 'required | unique:users',
            'username' => 'required | unique:users',
            'telefon' => 'required | unique:users',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->telefon = $request->telefon;
        $user->password = Hash::make($request->password);
        $user->rol = 'admin';
        $user->durum = '1';
        $user->save();

        // if ($request->rol) {
        //     $user->assignRole($request->rol);
        // }

        // Rol ID'sini rol adına dönüştürerek atama yapın
        if ($request->rol) {
            $rol = Role::where('id', $request->rol)->where('guard_name', 'web')->first();

            if ($rol) {
                $user->assignRole($rol->name);
            } else {
                return redirect()->back()->withErrors(['rol' => 'Seçilen rol bulunamadı veya geçersiz.']);
            }
        }


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Kullanıcı Yükleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return redirect()->route('kullanici.liste')->with($mesaj);
    }



    public function KullaniciDuzenle($id)
    {
        $user = User::findOrFail($id);
        $roller = Role::all();

        return view('admin.kullanicilar.kullanici_duzenle', compact('user', 'roller'));
    }



    public function KullaniciGuncelleForm(Request $request, $id)
    {
        // $request->validate([
        //     'email' => 'required | unique:users',
        //     'username' => 'required | unique:users',
        //     'telefon' => 'required | unique:users',
        // ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->telefon = $request->telefon;
        $user->rol = 'admin';
        $user->save();

        $user->roles()->detach();  // Roles ile rolleri seciyoruz detach ile rolleri tekrardan secilecek

        // if ($request->rol) {
        //     $user->assignRole($request->name);
        // }

        // Rol ID'sini rol adına dönüştürerek atama yapın
        if ($request->rol) {
            $rol = Role::where('id', $request->rol)->where('guard_name', 'web')->first();

            if ($rol) {
                $user->assignRole($rol->name);
            } else {
                return redirect()->back()->withErrors(['rol' => 'Seçilen rol bulunamadı veya geçersiz.']);
            }
        }


        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Kullanıcı Güncelleme Başarılı...',
            'alert-type' => 'success'
        );


        // toaster Bildirim

        return redirect()->route('kullanici.liste')->with($mesaj);
    }




    public function KullanicilSil($id)
    {

        $user = User::findOrFail($id);


        if (!is_null($user)) {
            $user->delete();
        }

        // toaster Bildirim

        $mesaj = array(
            'bildirim' => 'Silme Başarılı...',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($mesaj);
    }
}

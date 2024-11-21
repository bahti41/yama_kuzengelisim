<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'telefon',
        'resim',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function IzinGruplari()
    {
        $izin_gruplari = DB::table('permissions')->select('grup_adi')->groupBy('grup_adi')->get();
        return  $izin_gruplari;
    }



    public static function YetkiGruplari($grup_adi)
    {
        $yetki = DB::table('permissions')->select('id', 'name')->where('grup_adi', $grup_adi)->get();
        return  $yetki;
    }


    public static function RolYetkileri($rol, $yetkigrup)
    {
        $yetkiIzinleri = true;
        foreach ($yetkigrup as $yetkiler) {
            if (!$rol->hasPermissionTo($yetkiler->name)) {
                $yetkiIzinleri = false;
                return $yetkiIzinleri;
            }
            return $yetkiIzinleri;
        }
    }
}

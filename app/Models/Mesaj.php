<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\MailGonder;
use App\Models\Footer;

class Mesaj extends Model
{
    use HasFactory;

    public $fillable = ['adi', 'email', 'telefon', 'konu', 'mesaj'];

    public static function boot()
    {
        parent::boot(); // MİRAS ALMAK İCİN KULLANILIR...

        static::created(function ($bilgi) { // DEGİŞLEN ATAMA PARAMETRE

            $email = Footer::find(1);

            $adminEmail = $email->mail;
            Mail::to($adminEmail)->send(new MailGonder($bilgi));
        });
    }
}

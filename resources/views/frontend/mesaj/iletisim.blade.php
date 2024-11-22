 @extends('frontend.main_master')


 @php
 $seo = App\Models\Seo::find(1);
 @endphp

 @section('title') İletisim | {{$seo->site_adi}} @endsection
 @section('author') {{$seo->author}} @endsection
 @section('aciklama') {{$seo->aciklama}} @endsection
 @section('anahtar') {{$seo->keywords}} @endsection



 @section('main')

 @php
 $coklu = App\Models\Cokluresim::all();
 @endphp

 <main>

     <!-- breadcrumb-area -->
     <section class="breadcrumb__wrap">
         <div class="container custom-container">
             <div class="row justify-content-center">
                 <div class="col-xl-6 col-lg-8 col-md-10">
                     <div class="breadcrumb__wrap__content">
                         <h2 class="title">İletişim</h2>
                         <nav aria-label="breadcrumb">
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="{{url('/')}}">AnaSayfa</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Tekif Formu</li>
                             </ol>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
         <div class="breadcrumb__wrap__icon">
             <ul>
                 <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon01.png')}}" alt=""></li>
                 <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon02.png')}}" alt=""></li>
                 <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon03.png')}}" alt=""></li>
                 <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon04.png')}}" alt=""></li>
                 <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon05.png')}}" alt=""></li>
                 <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon06.png')}}" alt=""></li>
             </ul>
         </div>
     </section>
     <!-- breadcrumb-area-end -->

     <!-- contact-map -->
     <div id="contact-map">
         <iframe src="{{$seo->harita}}"></iframe>
     </div>
     <!-- contact-map-end -->

     <!-- TEKLİF-Formu -->

     <!-- <div class="contact-area">
         <div class="container">
             <form method="post" action="{{route('teklif.form')}}" class="contact__form" id="myForm">
                 @csrf


                 <div class="row">
                     <div class="col-md-6 form-group">
                         <input type="text" name="adi" placeholder="Ad Soyad">
                         @error('adi')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                     </div>
                     <div class="col-md-6 form-group">
                         <input type="email" name="email" placeholder="Email Adresiniz">
                         @error('email')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                     </div>
                     <div class="col-md-6 form-group">
                         <input type="text" name="telefon" placeholder="Teleofon">
                         @error('telefon')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                     </div>
                     <div class="col-md-6 form-group">
                         <input type="text" name="konu" placeholder="Konu">
                         @error('konu')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                     </div>
                 </div>
                 <textarea name="mesaj" id="message" placeholder="Mesajınız"></textarea>
                 @error('mesaj')
                 <span class="text-danger">{{$message}}</span>
                 @enderror
                 <button type="submit" class="btn">Teklif Gönder</button>
             </form>
         </div>
     </div> -->

     <!-- TEKLİF-Formu -->

     @php

     $footer = App\Models\Footer::find(1);

     @endphp

     <!-- contact-info-area -->
     <section class="contact-info-area">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-4 col-md-6">
                     <div class="contact__info">
                         <div class="contact__info__icon">
                             <img src="assets/img/icons/contact_icon01.png" alt="">
                         </div>
                         <div class="contact__info__content">
                             <h4 class="title">adres</h4>
                             <span>{{$footer->adres}}</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <div class="contact__info">
                         <div class="contact__info__icon">
                             <img src="assets/img/icons/contact_icon02.png" alt="">
                         </div>
                         <div class="contact__info__content">
                             <h4 class="title">Telefon Numarası</h4>
                             <span>{{$footer->telefon}}</span>
                             <span>{{$footer->telefon}}</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <div class="contact__info">
                         <div class="contact__info__icon">
                             <img src="assets/img/icons/contact_icon03.png" alt="">
                         </div>
                         <div class="contact__info__content">
                             <h4 class="title">Email Adres</h4>
                             <span>{{$footer->mail}}</span>
                             <span>{{$footer->mail}}</span>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- contact-info-area-end -->

 </main>



 @endsection
 @extends('frontend.main_master')


 @php
 $seo = App\Models\Seo::find(1);
 @endphp

 @section('title') {{ $kategori->kategori_adi }} | {{$seo->site_adi}} @endsection
 @section('author') {{$seo->author}} @endsection
 @section('aciklama') {{$kategori->aciklama}} @endsection
 @section('anahtar') {{$kategori->anahtar}} @endsection

 @section('main')


 <!-- breadcrumb-area -->
 <section class="breadcrumb__wrap">
     <div class="container custom-container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-8 col-md-10">
                 <div class="breadcrumb__wrap__content">
                     <h1 class="title">{{ $kategori->kategori_adi }}</h1>
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{url('/')}}">AnaSayfa</a></li>
                             <li class="breadcrumb-item active" aria-current="page">{{ $kategori->kategori_adi }}</li>
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

 <!-- portfolio-area -->
 <section class="portfolio__inner">
     <div class="container">

         <!-- CALIŞMA -->
         <!-- <div class="row">
             <div class="col-12">
                 <div class="portfolio__inner__nav">
                     <button class="active" data-filter="*">all</button>
                     <button data-filter=".cat-one">mobile apps</button>
                     <button data-filter=".cat-two">website Design</button>
                     <button data-filter=".cat-three">ui/kit</button>
                     <button data-filter=".cat-four">Landing page</button>
                 </div>
             </div>
         </div> -->

         <div class="portfolio__inner__active">

             @foreach($urunler as $urun)

             <div class="portfolio__inner__item grid-item cat-two cat-three">
                 <div class="row gx-0 align-items-center">
                     <div class="col-lg-6 col-md-10">
                         <div class="portfolio__inner__thumb">
                             <a href="{{url('urun/'.$urun->id.'/'.$urun->url)}}">
                                 <img src="{{ asset($urun->resim) }}" alt="">
                             </a>
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-10">
                         <div class="portfolio__inner__content">
                             <h2 class="title"><a href="{{url('urun/'.$urun->id.'/'.$urun->url)}}">{{$urun->baslik}}</a></h2>
                             <p>{!! Str::limit($urun->metin,500) !!}</p>

                             <a href="{{url('urun/'.$urun->id.'/'.$urun->url)}}" class="link">Devamı...</a>
                         </div>
                     </div>
                 </div>
             </div>
             @endforeach



         </div>
         <div class="pagination-wrap">
             {{$urunler->links('vendor.pagination.custom')}}
         </div>
     </div>
 </section>
 <!-- portfolio-area-end -->

 @endsection
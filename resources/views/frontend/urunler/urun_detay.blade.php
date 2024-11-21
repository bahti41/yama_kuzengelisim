 @extends('frontend.main_master')


 @php
 $seo = App\Models\Seo::find(1);
 @endphp

 @section('title') {{$urunler->baslik}} | {{$seo->site_adi}} @endsection
 @section('author') {{$seo->author}} @endsection
 @section('aciklama') {{$urunler->aciklama}} @endsection
 @section('anahtar') {{$urunler->anahtar}} @endsection


 @section('main')


 <!-- breadcrumb-area -->
 <section class="breadcrumb__wrap">
     <div class="container custom-container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-8 col-md-10">
                 <div class="breadcrumb__wrap__content">
                     <h2 class="title">{{$urunler->baslik}}</h2>
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{url('/')}}">AnaSayfa</a></li>
                             <li class="breadcrumb-item active" aria-current="page">{{$urunler->baslik}}</li>
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

 <!-- portfolio-details-area -->
 <section class="services__details">
     <div class="container">
         <div class="row">
             <div class="col-lg-9">
                 <div class="services__details__thumb">
                     <img src="{{asset($urunler->resim)}}" alt="">
                 </div>
                 <div class="services__details__content">

                     <h1 class="title">{{$urunler->baslik}}</h1>
                     <p>{!!$urunler->metin!!}</p>

                     <div class="blog__details__bottom">
                         <ul class="blog__details__tag">
                             <li class="title">Etiketler:</li>
                             <li class="tags-list">

                                 @foreach($etiket as $etiketler)
                                 <a>{{$etiketler}}</a>
                                 @endforeach

                             </li>
                         </ul>
                     </div>
                 </div>
             </div>

             <!-- col-4 lük ürün bilgi alanı -->

             <!-- <div class="col-lg-4">
                 <aside class="services__sidebar">

                     <div class="widget">
                         <h5 class="title">Project Information</h5>
                         <ul class="sidebar__contact__info">
                             <li><span>Date :</span> January, 2021</li>
                             <li><span>Location :</span> East Meadow NY 11554</li>
                             <li><span>Client :</span> American</li>
                             <li class="cagegory"><span>Category :</span>
                                 <a href="portfolio.html">Photo,</a>
                                 <a href="portfolio.html">UI/UX</a>
                             </li>
                             <li><span>Project Link :</span> <a href="portfolio-details.html">https://www.yournews.com/</a></li>
                         </ul>
                     </div>
                     <div class="widget">
                         <h5 class="title">Contact Information</h5>
                         <ul class="sidebar__contact__info">
                             <li><span>Address :</span> 8638 Amarica Stranfod, <br> Mailbon Star</li>
                             <li><span>Mail :</span> yourmail@gmail.com</li>
                             <li><span>Phone :</span> +7464 0187 3535 645</li>
                             <li><span>Fax id :</span> +9 659459 49594</li>
                         </ul>
                         <ul class="sidebar__contact__social">
                             <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                             <li><a href="#"><i class="fab fa-behance"></i></a></li>
                             <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                             <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                             <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                             <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                         </ul>
                     </div>
                 </aside>
             </div> -->

             <!-- Project Information -->

         </div>
     </div>
 </section>
 <!-- portfolio-details-area-end -->


 @endsection
 @extends('frontend.main_master')


 @php
 $seo = App\Models\Seo::find(1);
 @endphp

 @section('title') Blog | {{$seo->site_adi}} @endsection
 @section('author') {{$seo->author}} @endsection
 @section('aciklama') {{$seo->aciklama}} @endsection
 @section('anahtar') {{$seo->keywords}} @endsection


 @section('main')

 <!-- breadcrumb-area -->
 <section class="breadcrumb__wrap">
     <div class="container custom-container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-8 col-md-10">
                 <div class="breadcrumb__wrap__content">
                     <h2 class="title">Blog</h2>
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{url('/')}}">AnaSayfa</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Liste</li>
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


 <!-- blog-area -->
 <section class="standard__blog">
     <div class="container">
         <div class="row">
             <div class="col-lg-8">

                 @foreach($icerikhepsi as $icerikler)
                 <div class="standard__blog__post">
                     <div class="standard__blog__thumb">
                         <a href="{{ url('post/'.$icerikler->id.'/'.$icerikler->url) }}"><img src="{{asset($icerikler->resim)}}" alt=""></a>
                         <a href="{{ url('post/'.$icerikler->id.'/'.$icerikler->url) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                     </div>
                     <div class="standard__blog__content">
                         <h2 class="title"><a href="{{ url('post/'.$icerikler->id.'/'.$icerikler->url) }}">{{$icerikler->baslik}}</a></h2>

                         <p>{!! Str::limit($icerikler->metin, 200) !!}</p>
                         <ul class="blog__post__meta">
                             <li><i class="fal fa-calendar-alt"></i> {{($icerikler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i'))}}</li>
                         </ul>
                     </div>
                 </div>
                 @endforeach

                 <div class="pagination-wrap">
                     {{$icerikhepsi->links('vendor.pagination.custom')}}

                 </div>
             </div>
             <div class="col-lg-4">
                 <aside class="blog__sidebar">

                     <div class="widget">
                         <h4 class="widget-title">Son Blog</h4>
                         <ul class="rc__post">

                             @foreach($icerikhepsi as $icerik)
                             <li class="rc__post__item">
                                 <div class="rc__post__thumb">
                                     <a href="{{ url('post/'.$icerik->id.'/'.$icerik->url) }}"><img src="{{asset($icerik->resim)}}" alt=""></a>
                                 </div>
                                 <div class="rc__post__content">
                                     <h5 class="title"><a href="{{ url('post/'.$icerik->id.'/'.$icerik->url) }}">{{$icerik->baslik}}</a></h5>
                                     <span class="post-date"><i class="fal fa-calendar-alt"></i> {{($icerik->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i'))}}</span>
                                 </div>
                             </li>
                             @endforeach

                         </ul>
                     </div>
                     <div class="widget">
                         <h4 class="widget-title">Kategoriler</h4>
                         <ul class="sidebar__cat">

                             @foreach($kategoriler as $kategori )
                             <li class="sidebar__cat__item"><a href="{{ url('postblog/'.$kategori->id.'/'.$kategori->url) }}">{{$kategori->kategori_adi}}</a></li>
                             @endforeach

                         </ul>
                     </div>
                 </aside>
             </div>
         </div>
     </div>
 </section>
 <!-- blog-area-end -->


 @endsection
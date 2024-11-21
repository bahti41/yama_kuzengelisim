 @php

 $kategoriler = App\Models\Kategoriler::where('durum',1)->orderBy('id','DESC')->get();
 $urunler = App\Models\Urunler::where('durum',1)->orderBy('sirano','ASC')->get();

 @endphp


 <section class="portfolio">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-8">
                 <div class="section__title text-center">
                     <span class="sub-title">04 - Ürünlerimiz</span>
                     <h2 class="title">Servislerimiz</h2>
                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-xl-10 col-lg-12">
                 <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">

                     <li class="nav-item" role="presentation">
                         <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                             role="tab" aria-controls="all" aria-selected="true">Hepsi</button>
                     </li>
                     @foreach($kategoriler as $kategori)
                     <li class="nav-item" role="presentation">
                         <a class="nav-link" id="website-tab" data-bs-toggle="tab" href="#kategoriler{{$kategori->id}}" type="button"
                             role="tab" aria-controls="website" aria-selected="false">{{$kategori->kategori_adi}}</a>
                     </li>
                     @endforeach
                 </ul>
             </div>
         </div>
     </div>
     <div class="tab-content" id="portfolioTabContent">
         <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
             <div class="container">
                 <div class="row gx-0 justify-content-center">
                     <div class="col">
                         <div class="portfolio__active">

                             @foreach($urunler as $urun)
                             <div class="portfolio__item">
                                 <div class="portfolio__thumb">
                                     <img src="{{asset($urun->resim)}}" alt="">
                                 </div>
                                 <div class="portfolio__overlay__content">
                                     <span>{{$urun['kategori']['kategori_adi']}}</span>
                                     <h4 class="title"><a href="{{url('urun/'.$urun->id.'/'.$urun->url)}}">{{$urun->baslik}}</a></h4>
                                     <a href="{{url('urun/'.$urun->id.'/'.$urun->url)}}" class="link">Devamı...</a>
                                 </div>
                             </div>
                             @endforeach

                         </div>
                     </div>
                 </div>
             </div>
         </div>
         @foreach($kategoriler as $kategori)
         <div class="tab-pane" id="kategoriler{{$kategori->id}}" role="tabpanel" aria-labelledby="website-tab">
             <div class="container">
                 <div class="row gx-0 justify-content-center">
                     <div class="col">
                         <div class="portfolio__active">

                             @php
                             $urunkategori = App\Models\Urunler::where('kategori_id',$kategori->id)->where('durum',1)->orderBy('sirano','ASC')->get();
                             @endphp


                             @forelse($urunkategori as $urunler)
                             <div class="portfolio__item">
                                 <div class="portfolio__thumb">
                                     <img src="{{asset($urunler->resim)}}" alt="">
                                 </div>
                                 <div class="portfolio__overlay__content">
                                     <span>{{$urunler['kategori']['kategori_adi']}}</span>
                                     <h4 class="title">
                                         <a href="{{url('urun/'.$urunler->id.'/'.$urunler->url)}}">{{$urunler->baslik}}</a>
                                     </h4>
                                     <a href="{{url('urun/'.$urunler->id.'/'.$urunler->url)}}" class="link">Devamı...</a>
                                 </div>
                             </div>

                             @empty
                             <h5 class="text-danger"> HERHANGİBİR ÜRÜN BULUNAMADI DAHA SONRA TEKRAR DENEYİN..... </h5>

                             @endforelse

                         </div>
                     </div>
                 </div>
             </div>
         </div>
         @endforeach
     </div>
 </section>
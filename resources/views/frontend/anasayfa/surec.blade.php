     @php

     $surec = App\Models\Surec::where('durum',1)->orderBy('sirano','ASC')->limit(4)->get();

     @endphp

     <section class="work__process">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-xl-6 col-lg-8">
                     <div class="section__title text-center">
                         <span class="sub-title">03 - Calışma Sürecimiz</span>
                         <h1 class="title">İşinizi Gelişime Bırakın</h1>
                     </div>
                 </div>
             </div>
             <div class="row work__process__wrap">

                 @foreach( $surec as $surecler)
                 <div class="col">
                     <div class="work__process__item">
                         <span class="work__process_step">{{$surecler->surec}}</span>
                         <div class="work__process__icon">
                             <img class="light" src="{{asset('frontend/assets/img/icons/wp_light_icon01.png')}}" alt="">
                         </div>
                         <div class="work__process__content">
                             <h2 class="title">{{$surecler->baslik}}</h2>
                             <p>{!!$surecler->aciklama!!}</p>
                         </div>
                     </div>
                 </div>
                 @endforeach


             </div>
         </div>
     </section>
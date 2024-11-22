    @extends('frontend.main_master')

    @php
    $seo = App\Models\Seo::find(1);
    @endphp

    @section('title') {{$hakkimizda->baslik}} | {{$seo->site_adi}} @endsection
    @section('author') {{$seo->author}} @endsection
    @section('aciklama') {{$hakkimizda->aciklama}} @endsection
    @section('anahtar') {{$hakkimizda->anahtar}} @endsection

    @section('main')
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">Hakkımızda</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">AnaSayfa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$hakkimizda->baslik}}</li>
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

        <!-- about-area -->
        <section class="about about__style__two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about__image">
                            <img src="{{asset($hakkimizda->resim)}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <div class="section__title">
                                <span class="sub-title">Hakkımızda</span>
                                <h1 class="title">{{$hakkimizda->baslik}}</h1>
                            </div>
                        </div>
                        <p class="desc">{!!$hakkimizda->kisa_aciklama!!}</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->


    </main>
    @endsection
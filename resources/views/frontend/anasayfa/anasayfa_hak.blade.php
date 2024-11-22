@php
$hakkimizda = App\Models\Hakkimizda::find(1);
$coklu = App\Models\Cokluresim::all();
@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach($coklu as $resim)
                    <li>
                        <img class="light" src="{{asset($resim->resim)}}" alt="XD">
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">Hakkımızda</span>
                        <h2 class="title">{{$hakkimizda->baslik}}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{asset('frontend/assets/img/icons/about_icon.png')}}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{$hakkimizda->kisa_baslik}}</p>
                        </div>
                    </div>
                    <p class="desc">{!!$hakkimizda->kisa_aciklama!!}</p>
                    <a href="{{route('anasayfa.hak')}}" class="btn">Devamı...</a>
                </div>
            </div>
        </div>
    </div>
</section>
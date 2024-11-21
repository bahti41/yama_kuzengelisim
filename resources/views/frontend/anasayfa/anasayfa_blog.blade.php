@php
$icerikler = App\Models\Blogicerik::where('durum',1)->orderBy('sirano','ASC')->limit(3)->get();
@endphp

<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">

            @foreach($icerikler as $metinler)
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="{{ url('post/'.$metinler->id.'/'.$metinler->url) }}"><img src="{{asset($metinler->resim)}}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="{{url('postblog/'.$metinler['kategoriler']['id'].'/'.$metinler['kategoriler']['url'])}}">{{$metinler['kategoriler']['kategori_adi']}}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">{{($metinler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i'))}}</span>
                        <h3 class="title"><a href="{{url('post/'.$metinler->id.'/'.$metinler->url)}}">{{($metinler->baslik)}}</a></h3>
                        <a href="{{url('post/'.$metinler->id.'/'.$metinler->url)}}" class="read__more">Devamı...</a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <div class="blog__button text-center">
            <a href="{{url('/blog')}}" class="btn">Tümünü Gör...</a>
        </div>
    </div>
</section>
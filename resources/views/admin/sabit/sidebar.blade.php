        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!-- User details -->
                <div class="user-profile text-center mt-3">
                    <div class="">
                        <img src="{{ (!empty(Auth::user()->resim)) ? url('upload/admin/'.Auth::user()->resim): url('upload/resim-yok.png')}}" alt="" class="avatar-md rounded-circle">
                    </div>
                    <div class="mt-3">
                        <h4 class="font-size-16 mb-1">{{Auth::user()->name}}</h4>
                        <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                    </div>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="{{url('/dashboard')}}" class="waves-effect">
                                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        @if(Auth::user()->can('Banner.menu'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-mail-send-line"></i>
                                <span>Banner</span>
                            </a>
                            @if(Auth::user()->can('Banner.düzenle'))
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('banner')}}">Banner Düzenle</a></li>
                            </ul>
                            @endif
                        </li>
                        @endif

                        @if(Auth::user()->can('Hakkımızda.menu'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-mail-send-line"></i>
                                <span>Hakkımızda</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">

                                @if(Auth::user()->can('Hakkımızda.duzenle'))
                                <li><a href="{{route('hakkimizda')}}">Hakkımızda Düzenle</a></li>
                                @endif

                                @if(Auth::user()->can('Hakkımızda.Coklu.liste'))
                                <li><a href="{{route('coklu.liste')}}">Coklu Resimler</a></li>
                                @endif

                                @if(Auth::user()->can('Hakkımızda.Coklu.Ekle'))
                                <li><a href="{{route('coklu.resim')}}">Coklu Resim Ekle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->can('Kategori.menu'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Kategoriler</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Kategori.Liste'))
                                <li><a href="{{route('kategori.hepsi')}}">Hepsi</a></li>
                                @endif

                                @if(Auth::user()->can('Kategori.ekle'))
                                <li><a href="{{route('kategori.ekle')}}">Kategoriy Ekle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif



                        @if(Auth::user()->can('Altkategoriler.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Alt Kategoriler</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Altkategoriler.Liste'))
                                <li><a href="{{route('altkategori.liste')}}">Liste</a></li>
                                @endif

                                @if(Auth::user()->can('Altkategoriler.Ekle'))
                                <li><a href="{{route('altkategori.ekle')}}">Alt Kategoriy Ekle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->can('Ürünler.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Ürünler</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Ürün.Liste'))
                                <li><a href="{{route('urun.liste')}}">Ürün Liste</a></li>
                                @endif

                                @if(Auth::user()->can('Ürünler.Ekle'))
                                <li><a href="{{route('urun.ekle')}}">Ürün Ekle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->can('Blog.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Blog</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Blog.Liste'))
                                <li><a href="{{route('blog.liste')}}">Liste</a></li>
                                @endif

                                @if(Auth::user()->can('Blog.Ekle'))
                                <li><a href="{{route('blog.kategori.ekle')}}">Kategori Ekle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif




                        @if(Auth::user()->can('Blogicerik.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Blog İcerikler</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Blogicerik.Liste'))
                                <li><a href="{{route('icerik.liste')}}">Liste</a></li>
                                @endif

                                @if(Auth::user()->can('Blogicerik.Ekle'))
                                <li><a href="{{route('blog.icerik.ekle')}}">İcerik Ekle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->can('Sürec.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Sürec İcerikler</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Sürec.Liste'))
                                <li><a href="{{route('surec.liste')}}">Liste</a></li>
                                @endif

                                @if(Auth::user()->can('Sürec.Ekle'))
                                <li><a href="{{route('surec.ekle')}}">İcerik Ekle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->can('Yorum.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Yorumlar</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Yorum.Liste'))
                                <li><a href="{{route('yorum.liste')}}">Liste</a></li>
                                @endif

                                @if(Auth::user()->can('Yorum.Ekle'))
                                <li><a href="{{route('yorum.ekle')}}">Yorum Ekle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->can('Footer.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Footer</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Footer.Düzenle'))
                                <li><a href="{{route('footer.duzenle')}}">Güncelle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->can('Seo.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Seo</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Seo.Düzenle'))
                                <li><a href="{{route('seo.duzenle')}}">Güncelle</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->can('RolIzin.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Roller ve İzinler</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('RolIzin.izin'))
                                <li><a href="{{route('izin.liste')}}">İzinler</a></li>
                                @endif

                                @if(Auth::user()->can('RolIzin.rol'))
                                <li><a href="{{route('rol.liste')}}">Roller</a></li>
                                @endif

                                @if(Auth::user()->can('RolYetki.Ver'))
                                <li><a href="{{route('rol.izin.verme')}}">Role Yetki Ver</a></li>
                                @endif

                                @if(Auth::user()->can('RolYetki.Liste'))
                                <li><a href="{{route('rol.yetki.verme')}}">Role Yetki Liste</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->can('Kullanici.Menü'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Kullanıcılar</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">

                                @if(Auth::user()->can('Kullanici.Liste'))
                                <li><a href="{{route('kullanici.liste')}}">Liste</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif







                    </ul>
                    </li>













                </div>
                <!-- Sidebar -->
            </div>
        </div>
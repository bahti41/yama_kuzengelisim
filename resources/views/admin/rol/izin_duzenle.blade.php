@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">İzin Düzenle</h4>

                        <form method="post" action="{{ route('izin.guncelle.form') }}" id="myForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $izinler->id}}">


                            <!-- İzin Adı -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">İzin Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="name" type="text" placeholder="İzin Adı..." id="example-text-input" value="{{ $izinler->name}}">

                                </div>
                            </div>
                            <!-- İzin Adı -->




                            <!-- Grop Adi -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Grup Adı</label>
                                <div class="col-sm-10 form-group">
                                    <select class="form-select" aria-label="default select example" name="grup_adi">
                                        <option value="rolizin" {{$izinler->grup_adi == 'rolizin' ? 'selected' : ''}}>RolIzin</option>
                                        <option value="yetkiler" {{$izinler->grup_adi == 'yetkiler' ? 'selected' : ''}}>Yetkiler</option>
                                        <option value="kullanicilar" {{$izinler->grup_adi == 'kullanicilar' ? 'selected' : ''}}>Kullanıcılar</option>
                                        <option value="mesajlar" {{$izinler->grup_adi == 'Mesajlar' ? 'selected' : ''}}>Mesajlar</option>

                                        <option value="banner" {{$izinler->grup_adi == 'banner' ? 'selected' : ''}}>Banner</option>
                                        <option value="hakkimizda" {{$izinler->grup_adi == 'hakkimizda' ? 'selected' : ''}}>Hakkımızda</option>
                                        <option value="kategoriler" {{$izinler->grup_adi == 'kategoriler' ? 'selected' : ''}}>Kategoriler</option>
                                        <option value="altkategoriler" {{$izinler->grup_adi == 'altkategoriler' ? 'selected' : ''}}>Alt Kategoriler</option>
                                        <option value="urunler" {{$izinler->grup_adi == 'urunler' ? 'selected' : ''}}>Ürünler</option>
                                        <option value="bloglar" {{$izinler->grup_adi == 'bloglar' ? 'selected' : ''}}>Bloglar</option>
                                        <option value="yazilar" {{$izinler->grup_adi == 'yazilar' ? 'selected' : ''}}>Blog İceerikler</option>
                                        <option value="surecler" {{$izinler->grup_adi == 'surecler' ? 'selected' : ''}}>Süreçler</option>
                                        <option value="yorumlar" {{$izinler->grup_adi == 'yorumlar' ? 'selected' : ''}}>Yorumlar</option>
                                        <option value="footer" {{$izinler->grup_adi == 'footer' ? 'selected' : ''}}>Footer</option>
                                        <option value="seo" {{$izinler->grup_adi == 'seo' ? 'selected' : ''}}>SEO Ayarları</option>
                                    </select>

                                </div>
                            </div>
                            <!-- Grop Adi -->


                            <input type="submit" class="btn btn-info waves-effect wave-light" value="İzin Güncelle">
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- boş olamaz no refresh -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                grup_adi: {
                    required: true,
                },

                name: {
                    required: true,
                },
            }, // end rules

            messages: {
                grup_adi: {
                    required: 'Kategori adı giriniz',
                },

                name: {
                    required: 'İzin Adı giriniz...',
                },
            }, // end message

            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },

            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },

            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
<!-- boş olamaz no refresh -->
@endsection
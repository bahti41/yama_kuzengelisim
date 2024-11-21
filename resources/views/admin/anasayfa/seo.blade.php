@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag {
        width: 100%;
        margin-right: 3px;
        font-weight: 700;
        color: red;
        padding: 3px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Seo Ayarları</h4>

                        <form method="post" action="{{ route('seo.guncelle') }}" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{$seo->id}}">
                            <input type="hidden" name="onceki_resim" value="{{$seo->logo}}">



                            <!-- Title -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title" type="text" placeholder="Title Giriniz..." id="example-text-input" value="{{$seo->title}}">
                                </div>
                            </div>
                            <!-- Title -->

                            <!-- Site Adı -->
                            <div class="row mb-3">

                                <label for="example-text-input" class="col-sm-2 col-form-label">Site Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="site_adi" type="text" placeholder="Site Adı Giriniz..." id="example-text-input" value="{{$seo->site_adi}}">
                                </div>
                            </div>
                            <!-- Site Adı -->


                            <!-- Acıklama -->
                            <div class="row mb-3">

                                <label for="example-text-input" class="col-sm-2 col-form-label">Acıklama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="aciklama" type="text" placeholder="Acıklama Giriniz..." id="example-text-input" value="{{$seo->aciklama}}">
                                </div>
                            </div>
                            <!-- Acıklama -->


                            <!-- Anahtar -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="keywords" type="text" data-role="tagsinput" value="{{$seo->keywords}}">
                                </div>
                            </div>
                            <!-- Anahtar -->


                            <!-- Yapımcı / Author -->
                            <div class="row mb-3">

                                <label for="example-text-input" class="col-sm-2 col-form-label">Yapımcı / Author</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="author" type="text" placeholder="Yapımcı / Author Giriniz..." id="example-text-input" value="{{$seo->author}}">
                                </div>
                            </div>
                            <!-- Yapımcı / Author -->


                            <!-- Harita -->
                            <div class="row mb-3">

                                <label for="example-text-input" class="col-sm-2 col-form-label">Harita</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="harita" type="text" placeholder="Harita Giriniz..." id="example-text-input" value="{{$seo->harita}}">
                                </div>
                            </div>
                            <!-- Harita -->


                            <!-- Logo -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2">Logo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="logo" id="resim">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ (!empty($seo->logo)) ? url($seo->logo): url('upload/görseli_hazrilaniyor.png')}}" alt="" id="resimGoster">
                                </div>
                            </div>
                            <!-- Logo -->

                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Seo Güncelle">
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#resim').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#resimGoster').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
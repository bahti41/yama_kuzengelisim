@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banner Düzenle</h4>

                        <form method="post" action="{{ route('banner.guncelle') }}" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{$homebanner->id}}">
                            <input type="hidden" name="onceki_resim" value="{{$homebanner->resim}}">



                            <!-- Başlık -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="baslik" type="text" placeholder="Başlık Giriniz..." id="example-text-input" value="{{$homebanner->baslik}}">
                                </div>
                            </div>
                            <!-- Başlık -->

                            <!-- Alt_Başlık -->
                            <div class="row mb-3">

                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt Başlık</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="alt_baslik" type="text" placeholder="Alt Başlık Giriniz..." id="example-text-input" value="{{$homebanner->alt_baslik}}">
                                </div>
                            </div>
                            <!-- Alt_Başlık -->

                            <!-- URL -->
                            <div class="row mb-3">

                                <label for="example-text-input" class="col-sm-2 col-form-label">URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="url" type="url" placeholder="Url Giriniz..." id="example-text-input" value="{{$homebanner->url}}">
                                </div>
                            </div>
                            <!-- URL -->

                            <!-- Video URL -->
                            <div class="row mb-3">

                                <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="video_url" type="url" placeholder="Video Url Giriniz..." id="example-text-input" value="{{$homebanner->video_url}}">
                                </div>
                            </div>
                            <!-- Video URL -->


                            <!-- Resim -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2">Resim</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="resim" id="resim">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ (!empty($homebanner->resim)) ? url($homebanner->resim): url('upload/görseli_hazrilaniyor.png')}}" alt="" id="resimGoster">
                                </div>
                            </div>

                            <!-- Resim -->

                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Güncelle">
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
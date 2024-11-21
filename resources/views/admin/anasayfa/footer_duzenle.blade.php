@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Footer Düzenle</h4>


                        <form method="post" action="{{ route('footer.guncelle') }}" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{$footer->id}}">

                            <!-- Row Başladı -->
                            <div class="row">

                                <!-- Col-md-4 Başladı 1 -->

                                <div class="col-md-4">

                                    <!-- Başlık -->
                                    <label for="example-text-input" class="col-form-label">Footer Sol</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="baslikbir" type="text" placeholder="Başlık 1 Giriniz..." id="example-text-input" value="{{$footer->baslikbir}}">
                                    </div>
                                    <!-- Başlık -->


                                    <!-- Telefon -->
                                    <label for="example-text-input" class="col-form-label">Telefon</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="telefon" type="text" placeholder="Telefon Giriniz..." id="example-text-input" value="{{$footer->telefon}}">
                                    </div>
                                    <!-- Telefon -->


                                    <!-- Metin -->
                                    <label for="example-text-input" class="col-form-label">Metin</label>
                                    <div class="col-sm-12 ">
                                        <textarea class="form-control" name="metin" type="text" placeholder="Metin Giriniz..." id="example-text-input" rows="4">{{$footer->metin}}</textarea>
                                    </div>
                                    <!-- Metin -->

                                </div>
                                <!-- Col-md-4 Bitti -->


                                <!-- Col-md-4 Başladı 2 -->

                                <div class="col-md-4">

                                    <!-- Başlık -->
                                    <label for="example-text-input" class="col-form-label">Footer Orta</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="baslikiki" type="text" placeholder="Başlık 2 Giriniz..." id="example-text-input" value="{{$footer->baslikiki}}">
                                    </div>
                                    <!-- Başlık -->


                                    <!-- Şehir -->
                                    <label for="example-text-input" class="col-form-label">Şehir</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="sehir" type="text" placeholder="Şehir Giriniz..." id="example-text-input" value="{{$footer->sehir}}">
                                    </div>
                                    <!-- Şehir -->


                                    <!-- Adress -->
                                    <label for="example-text-input" class="col-form-label">Adres</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="adres" type="text" placeholder="Adress Giriniz..." id="example-text-input" value="{{$footer->adres}}">
                                    </div>
                                    <!-- Adress -->


                                    <!-- Mail -->
                                    <label for="example-text-input" class="col-form-label">Mail</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="mail" type="text" placeholder="Mail Giriniz..." id="example-text-input" value="{{$footer->mail}}">
                                    </div>
                                    <!-- Mail -->


                                    <!-- CopyRight -->
                                    <label for="example-text-input" class="col-form-label">CopyRight</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="copy_right" type="text" placeholder="CopyRight Giriniz..." id="example-text-input" value="{{$footer->copy_right}}">
                                    </div>
                                    <!-- CopyRight -->


                                </div>
                                <!-- Col-md-4 Bitti -->


                                <!-- Col-md-4 Başladı 3 -->

                                <div class="col-md-4">

                                    <!-- Başlık -->
                                    <label for="example-text-input" class="col-form-label">Footer Sag</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="baslikuc" type="text" placeholder="Başlık 3 Giriniz..." id="example-text-input" value="{{$footer->baslikuc}}">
                                    </div>
                                    <!-- Başlık -->


                                    <!-- Sosyal Başlık -->
                                    <label for="example-text-input" class="col-form-label">Sosyal Başlık</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="sosyal_baslik" type="text" placeholder="Sosyal Başlık Giriniz..." id="example-text-input" value="{{$footer->sosyal_baslik}}">
                                    </div>
                                    <!-- Sosyal Başlık -->


                                    <!-- Acıklama -->
                                    <label for="example-text-input" class="col-form-label">Acıklama</label>
                                    <div class="col-sm-12 ">
                                        <textarea class="form-control" name="aciklama" type="text" placeholder="Acıklama Giriniz..." id="example-text-input" rows="4">{{$footer->aciklama}}</textarea>
                                    </div>
                                    <!-- Acıklama -->





                                    <!-- Facebook -->
                                    <label for="example-text-input" class="col-form-label">Facebook</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="facebook" type="text" placeholder="Facebook Giriniz..." id="example-text-input" value="{{$footer->facebook}}">
                                    </div>
                                    <!-- Facebook -->


                                    <!-- Tiwitter -->
                                    <label for="example-text-input" class="col-form-label">Tiwitter</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="tiwitter" type="text" placeholder="Tiwitter Giriniz..." id="example-text-input" value="{{$footer->tiwitter}}">
                                    </div>
                                    <!-- Tiwitter -->


                                    <!-- Linkedin -->
                                    <label for="example-text-input" class="col-form-label">Linkedin</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="linkedin" type="text" placeholder="Linkedin Giriniz..." id="example-text-input" value="{{$footer->linkedin}}">
                                    </div>
                                    <!-- Linkedin -->


                                    <!-- İnstagram -->
                                    <label for="example-text-input" class="col-form-label">İnstagram</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="instagram" type="text" placeholder="İnstagram Giriniz..." id="example-text-input" value="{{$footer->instagram}}">
                                    </div>
                                    <!-- İnstagram -->

                                </div>
                                <!-- Col-md-4 Bitti -->

                                <!-- Başlık -->






                            </div>
                            <!-- Row Bitti -->



                            <input type="submit" class="col-8 btn btn-info waves-effect wave-light" value="Footer Güncelle">
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kategori Düzenle</h4>

                        <form method="post" action="{{ route('kategori.guncelle.form') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $kategoriduzenle->id}}">
                            <input type="hidden" name="onceki_resim" value="{{ $kategoriduzenle->resim}}">


                            <!-- Kategori_Adi -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kategori Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="kategori_adi" type="text" placeholder="Kategori Adı..." id="example-text-input" value="{{ $kategoriduzenle->kategori_adi}}">
                                    @error('kategori_adi')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kategori_Adi -->


                            <!-- Kategori_Anahtar -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kategori Anahtar</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="anahtar" type="text" placeholder="Kategori Anahtar..." id="example-text-input" value="{{ $kategoriduzenle->anahtar}}">
                                    @error('anahtar')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kategori_Anahtar -->


                            <!-- Kategori_Acıklama -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kategori Acıklama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="aciklama" type="text" placeholder="Kategori Acıklama..." id="example-text-input" value="{{ $kategoriduzenle->aciklama}}">
                                    @error('aciklama')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kategori_Acıklama -->


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
                                    <img class="rounded avatar-lg" src="{{(!empty($kategoriduzenle->resim))? url($kategoriduzenle->resim): url('upload/görseli_hazrilaniyor.png')}}" alt="" id="resimGoster">
                                </div>
                            </div>

                            <!-- Resim -->

                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Kategori Güncelle">
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
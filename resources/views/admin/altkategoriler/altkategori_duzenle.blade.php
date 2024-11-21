@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Alt Kategori Düzenle</h4>


                        <form method="post" action="{{ route('altkategori.guncelle.form') }}" enctype="multipart/form-data" id="myForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $altkategoriler->id}}">
                            <input type="hidden" name="onceki_resim" value="{{ $altkategoriler->resim}}">



                            <!-- Select Kategori -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori Sec</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                                        <option selected="">Kategori Sec</option>
                                        @foreach($kategoriler as $kategori)
                                        <option value="{{ $kategori->id }} " {{ $kategori->id == $altkategoriler->kategori_id ? 'selected' : '' }}>{{$kategori->kategori_adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Select Kategori -->


                            <!-- Kategori_Adi -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt Kategori Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="altkategori_adi" type="text" placeholder="Alt Kategori Adı..." value="{{ $altkategoriler->altkategori_adi }}">
                                    @error('altkategori_adi')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kategori_Adi -->


                            <!-- Kategori_Anahtar -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kategori Anahtar</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="anahtar" type="text" placeholder="Kategori Anahtar..." value="{{ $altkategoriler->anahtar }}">
                                    @error('anahtar')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kategori_Anahtar -->


                            <!-- Kategori_Acıklama -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kategori Acıklama</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="aciklama" type="text" placeholder="Kategori Acıklama..." value="{{ $altkategoriler->aciklama }}">
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
                                    <img class="rounded avatar-lg" src="{{(!empty($altkategoriler->resim))? url($altkategoriler->resim): url('upload/görseli_hazrilaniyor.png')}}" alt="" id="resimGoster">
                                </div>
                            </div>

                            <!-- Resim -->

                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Alt Kategori Güncelle">
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

<!-- boş olamaz no refresh -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                altkategori_adi: {
                    required: true,
                },

                anahtar: {
                    required: true,
                },

                aciklama: {
                    required: true,
                },


            }, // end rules

            messages: {
                altkategori_adi: {
                    required: 'Alt Kategori adı giriniz',
                },

                anahtar: {
                    required: 'Anahtar giriniz',
                },

                aciklama: {
                    required: 'Açıklama giriniz',
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
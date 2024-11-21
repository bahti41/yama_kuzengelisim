@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag {
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
                        <h4 class="card-title">Yorum Düzenle</h4>

                        <form method="post" action="{{ route('yorum.guncelle.form') }}" enctype="multipart/form-data" id="myForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $yorumduzenle->id}}">
                            <!-- <input type="hidden" name="onceki_resim" value="{{ $yorumduzenle->resim}}"> -->



                            <div class="col-md-12">

                                <!-- Row Başlangıx -->

                                <div class="row">
                                    <!-- col 8 başlama -->
                                    <div class="col-md-12">


                                        <!-- Başlık -->
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Sürec</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="adi" type="text" placeholder="surec..." value="{{$yorumduzenle->adi}}">
                                                @error('adi')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Başlık -->


                                        <!-- Sıra No -->
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Sıra No</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="sirano" type="number" placeholder=" Sıra No..." value="{{$yorumduzenle->sirano}}">
                                            </div>
                                        </div>
                                        <!-- Sıra No -->


                                        <!-- Metin -->
                                        <div class=" row mb-3">
                                            <label for="example-text-input" class="col-form-label">Metin</label>
                                            <div class="col-sm-12 form-group">
                                                <textarea class="form-control" name="metin" id="example-text-input">{{$yorumduzenle->metin}}</textarea>
                                                @error('metin')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Metin -->


                                    </div>

                                    <!-- col 8 bitiş -->

                                    <!-- ***************************************************************************************************************************** -->

                                    <!-- col 4 Başladı -->


                                    <!-- col 4 Bitti -->


                                    <input type="submit" class="btn btn-info waves-effect wave-light" value="Yorum Güncelle">
                                </div>
                                <!-- Row Bitiş -->


                            </div>
                            <!-- col 12 bitti -->


                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Yüklü Resim -->
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
<!-- Yüklü Resim -->


<!-- boş olamaz no refresh -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                adi: {
                    required: true,
                },
                metin: {
                    required: true,
                },
            }, // end rules

            messages: {

                adi: {
                    required: 'Adi giriniz...',
                },
                metin: {
                    required: 'Metin giriniz...',
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
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
                        <h4 class="card-title">Sürec Düzenle</h4>

                        <form method="post" action="{{ route('surec.guncelle.form') }}" enctype="multipart/form-data" id="myForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $surecler->id}}">
                            <!-- <input type="hidden" name="onceki_resim" value="{{ $surecler->resim}}"> -->



                            <div class="col-md-12">

                                <!-- Row Başlangıx -->

                                <div class="row">
                                    <!-- col 8 başlama -->
                                    <div class="col-md-12">


                                        <!-- Başlık -->
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Sürec</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="surec" type="text" placeholder="surec..." value="{{$surecler->surec}}">
                                                @error('baslik')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Başlık -->


                                        <!-- Baslik -->
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Baslik</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="baslik" type="text" placeholder="Başlık..." value="{{$surecler->baslik}}">
                                            </div>
                                        </div>
                                        <!-- Baslik -->


                                        <!-- Sıra No -->
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Sıra No</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="sirano" type="number" placeholder=" Sıra No..." value="{{$surecler->sirano}}">
                                            </div>
                                        </div>
                                        <!-- Sıra No -->


                                        <!-- Acıklama -->
                                        <div class=" row mb-3">
                                            <label for="example-text-input" class="col-form-label">Acıklama</label>
                                            <div class="col-sm-12 form-group">
                                                <textarea name="aciklama" id="elm1" type="text">{{$surecler->aciklama}}</textarea>
                                            </div>
                                        </div>
                                        <!-- Acıklama -->


                                    </div>

                                    <!-- col 8 bitiş -->

                                    <!-- ***************************************************************************************************************************** -->

                                    <!-- col 4 Başladı -->


                                    <!-- col 4 Bitti -->


                                    <input type="submit" class="btn btn-info waves-effect wave-light" value="Sürec İcerik Güncelle">
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
                kategori_id: {
                    required: true,
                },
                sirano: {
                    required: true,
                },
            }, // end rules

            messages: {

                kategori_id: {
                    required: 'Kategori giriniz...',
                },
                sirano: {
                    required: 'Sıra Numarası giriniz...',
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
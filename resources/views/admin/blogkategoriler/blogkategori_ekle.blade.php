@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Kayegori Ekle</h4>

                        <form method="post" action="{{ route('blog.kategori.form') }}">
                            @csrf

                            <!-- kategori_adi -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-form-label">Kategori Adı</label>
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" name="kategori_adi" type="text" placeholder="Başlık...">
                                    @error('kategori_adi')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- kategori_adi -->


                            <!-- Sıra No -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-form-label">Sıra No</label>
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" name="sirano" type="number" placeholder=" Sıra No..." value="1">
                                </div>
                            </div>
                            <!-- Sıra No -->


                            <!-- Anahtar -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-form-label">Anahtar</label>
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" name="anahtar" type="text" placeholder="Blog Anahtar...">
                                </div>
                            </div>
                            <!-- Anahtar -->


                            <!-- Acıklama -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-form-label">Acıklama</label>
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" name="aciklama" type="text" placeholder="Blog Acıklama...">
                                </div>
                            </div>
                            <!-- Acıklama -->




                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Blog Kategori Ekle">

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
                kayegori_adi: {
                    required: true,
                },
                sirano: {
                    required: true,
                },
            }, // end rules

            messages: {
                kayegori_adi: {
                    required: 'Kategori adı giriniz...',
                },
                sirano: {
                    required: 'Sıra numarası giriniz...',
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
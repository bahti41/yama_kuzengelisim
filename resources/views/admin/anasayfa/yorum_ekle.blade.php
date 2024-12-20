@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Yorum Ekle</h4>

                        <form method="post" action="{{ route('yorum.ekle.form') }}" enctype="multipart/form-data" id="myForm">
                            @csrf



                            <div class="col-md-12">

                                <!-- Row Başlangıx -->

                                <div class="row">
                                    <!-- col 8 başlama -->
                                    <div class="col-md-12">


                                        <!-- Sürec -->
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Adi</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="adi" type="text" placeholder="Sürec...">
                                                @error('adi')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Sürec -->


                                        <!-- Sıra No -->
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Sıra No</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="sirano" type="number" placeholder=" Sıra No..." value="1">
                                            </div>
                                        </div>
                                        <!-- Sıra No -->


                                        <!-- Metin -->
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Metin</label>
                                            <div class="col-sm-12 form-group">
                                                <textarea class="form-control" name="metin" placeholder="Yorum..." id="example-text-input"></textarea>
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
                                    <!-- <div class="col-md-4">

                                    Burası colon

                                    </div> -->
                                    <!-- col 4 Bitti -->


                                    <input type="submit" class="btn btn-info waves-effect wave-light" value="Blog İcerik Ekle">
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
                surec: {
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
@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5 col-md-12">
                <div class="card" style="height: 600px;">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Kullanıcı Ekle</h4>

                        <form method="post" action="{{ route('kullanici.ekle.form') }}" id="myForm">
                            @csrf




                            <!-- Kullanici Adı -->
                            <div class="row mb-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kullanici Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="name" type="text" placeholder="Kullanıcı Adı...">
                                </div>
                            </div>
                            <!-- Kullanici Adı -->


                            <!-- Kullanici Email -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Kullanıcı Email...">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kullanici Email  -->


                            <!-- Kullanici ADI -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">İsmi</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="username" type="text" placeholder="Kullanıcı İsmi...">
                                    @error('username')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kullanici ADI  -->


                            <!-- Kullanici TELEFOn -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Telefon</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="telefon" type="text" placeholder="Kullanıcı Telefonu...">
                                    @error('telefon')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kullanici TELEFOn  -->


                            <!-- Kullanici Şifre   -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Şifre</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="password" type="password" placeholder="Kullanıcı Şifre...">
                                </div>
                            </div>
                            <!-- Kullanici Şifre  -->


                            <!-- Rol Adi -->
                            <div class="row mb-5">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Rol Adı</label>
                                <div class="col-sm-10 form-group">
                                    <select class="form-select" aria-label="default select example" name="rol">
                                        <option selected="">Lütfen Bir Rol Seçiniz</option>
                                        @foreach($roller as $rol)
                                        <option value="{{$rol->id}}">{{$rol->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <!-- Rol Adi -->


                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Kullanıcı Ekle">
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
                name: {
                    required: true,
                },

                email: {
                    required: true,
                },

                password: {
                    required: true,
                },

            }, // end rules

            messages: {
                name: {
                    required: 'Kullanıcı adı giriniz',
                },

                email: {
                    required: 'Kullanıcı Email giriniz',
                },

                password: {
                    required: 'Kullanıcı Şifre giriniz',
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
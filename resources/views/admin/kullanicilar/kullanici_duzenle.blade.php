@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5 col-md-12">
                <div class="card">
                    <div class="card-body" style=" height: 600px;">
                        <h4 class="card-title mb-5">Kullanıcı Düzenle</h4>

                        <form method="post" action="{{ route('kullanici.guncelle.form', $user->id) }}" id="myForm">
                            @csrf

                            <!-- Kulllanıcı Adı -->
                            <div class="row mb-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kullanıcı Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="name" type="text" placeholder="Kullanıcı Adı..." id="example-text-input" value="{{ $user->name}}">

                                </div>
                            </div>
                            <!-- Kulllanıcı Adı -->


                            <!-- Kulllanıcı Email -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kullanıcı Email</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Email Adı..." id="example-text-input" value="{{ $user->email}}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kulllanıcı Email -->


                            <!-- Kulllanıcı İsim -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kullanıcı İsim</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="username" type="text" placeholder="Email Adı..." id="example-text-input" value="{{ $user->username}}">
                                    @error('username')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kulllanıcı İsim -->



                            <!-- Kulllanıcı Telefon -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kullanıcı Telefon</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="telefon" type="text" placeholder="Telefon Gir..." id="example-text-input" value="{{ $user->telefon}}">
                                    @error('telefon')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kulllanıcı Telefon -->




                            <!-- Rol Adi -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Rol Adı</label>
                                <div class="col-sm-10 form-group">
                                    <select class="form-select" aria-label="default select example" name="rol">
                                        <option selected="">Lütfen Bir Rol Seçiniz</option>
                                        @foreach($roller as $rol)
                                        <option value="{{$rol->id}}" {{ $user->HasRole($rol->name) ? 'selected' : '' }}>{{$rol->name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- HasRole bir Rolu Secili olarak getirme fonksiyonu -->
                                </div>
                            </div>
                            <!-- Rol Adi -->


                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Kullanıcı Güncelle">
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
            }, // end rules

            messages: {
                name: {
                    required: 'Kullanıcı Adı giriniz...',
                },

                email: {
                    required: 'Kullanıcı Email giriniz...',
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
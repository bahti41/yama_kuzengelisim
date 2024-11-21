@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Rol Düzenle</h4>

                        <form method="post" action="{{ route('rol.guncelle.form') }}" id="myForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $roller->id}}">


                            <!-- Roller Adı -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">İzin Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="name" type="text" placeholder="İzin Adı..." id="example-text-input" value="{{ $roller->name}}">

                                </div>
                            </div>
                            <!-- Roller Adı -->




                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Rol Güncelle">
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
            }, // end rules

            messages: {
                name: {
                    required: 'Rol Adı giriniz...',
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
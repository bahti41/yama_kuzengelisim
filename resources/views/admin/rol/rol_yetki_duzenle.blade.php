@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .form-check-label {
        text-transform: capitalize;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Role Yetki Düznle</h4>

                        <form method="post" action="{{ route('rol.yetki.guncelle.form', $rol->id) }}" id="myForm">
                            @csrf



                            <!-- Rol Adi -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Rol Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" type="text" name="name" value="{{$rol->name}}">
                                </div>
                            </div>
                            <!-- Rol Adi -->


                            <!-- Tam Yetki -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="formCheck1hepsi">
                                <label class="form-check-label" for="formCheck1hepsi">
                                    Tam Yetki
                                </label>
                            </div>
                            <!-- Tam Yetki -->


                            <hr>
                            <br>


                            <!-- Grup İşlemleri -->
                            @foreach($izin_gruplari as $grup)
                            <div class="row mb-3">
                                <div class="col-3">

                                    @php
                                    $yetkigrup = App\Models\User::YetkiGruplari($grup->grup_adi);
                                    @endphp

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheck1" {{App\Models\User::RolYetkileri($rol,$yetkigrup) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="formCheck1">
                                            <h5> {{$grup->grup_adi}} </h5>
                                        </label>
                                    </div>
                                </div>




                                <div class="col-9 mb-4">
                                    @foreach($yetkigrup as $izin)
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" name="yetki[]" type="checkbox" id="formCheck1{{$izin->id}}" {{$rol->hasPermissionTo($izin->name) ? 'checked' : '' }} value="{{$izin->id}} ">
                                        <label class="form-check-label" for="formCheck1{{$izin->id}}">
                                            {{$izin->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            @endforeach
                            <!-- Grup İşlemleri -->



                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Role Yetki Düzünle">
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tam Yetki checkbox Kullanımı -->
<script type="text/javascript">
    $('#formCheck1hepsi').click(function() {
        if ($(this).is(':checked')) {
            $('input[type = checkbox]').prop('checked', true);
        } else {
            $('input[type = checkbox]').prop('checked', false);
        }
    });
</script>
<!-- Tam Yetki checkbox Kullanımı -->




@endsection

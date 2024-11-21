@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Coklu Resim Ekle</h4>


                        <form method="post" action="{{ route('coklu.resim.from') }}" enctype="multipart/form-data" id="myForm">
                            @csrf

                            <!-- Resim -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2">Resim</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" type="file" name="resim[]" id="resim" multiple=''>
                                    @error('resim')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ url('upload/görseli_hazrilaniyor.png')}}" alt="" id="resimGoster">
                                </div>
                            </div>

                            <!-- Resim -->

                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Çoklu Resim Ekle">
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


@endsection
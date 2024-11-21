@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4 ">Blog Kategori Düzenle</h4>

                        <form method="post" action="{{ route('blog.kategori.guncelle') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $Blogkategoriduzenle->id}}">


                            <!-- Kategori_Adi -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kategori Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="kategori_adi" type="text" placeholder="Kategori Adı..." id="example-text-input" value="{{ $Blogkategoriduzenle->kategori_adi}}">
                                    @error('kategori_adi')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kategori_Adi -->


                            <!-- Sıra Numarası -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Sıra No</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="sirano" type="number" placeholder="Sıra Numarası Giriniz..." id="example-text-input" value="{{ $Blogkategoriduzenle->sirano}}">
                                    @error('sirano')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Sıra Numarası -->


                            <!-- Anahtar -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="anahtar" type="text" placeholder="Kategori Anahtar..." value="{{$Blogkategoriduzenle->anahtar}}">
                                </div>
                            </div>
                            <!-- Anahtar -->


                            <!-- Acıklama -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Acıklama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="aciklama" type="text" placeholder="Kategori Acıklama..." value="{{$Blogkategoriduzenle->aciklama}}">
                                </div>
                            </div>
                            <!-- Acıklama -->



                            <input type="submit" class="btn btn-info waves-effect wave-light" value="Blog Kategori Güncelle">
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
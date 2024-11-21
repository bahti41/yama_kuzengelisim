@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Ürünler</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Ürün Listesi</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Başlık</th>
                                    <th>Kategori Adı</th>
                                    <th>Alt Kategori Adı</th>
                                    <th>Resim</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>


                            <tbody>


                                <tr>
                                    @foreach($urunliste as $urunler)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $urunler->baslik }}</td>
                                    <td>{{$urunler['kategori']['kategori_adi']}}</td>
                                    <td>{{$urunler['Altkategori']['altkategori_adi']}}</td>
                                    <td><img src="{{(!empty($urunler->resim))? url($urunler->resim): url('upload/görseli_hazrilaniyor.png')}}" style="height: 50px; width:50px;" alt=""></td>
                                    <td>
                                        <input type="checkbox" class="urunler" data-id="{{ $urunler->id }}" id="{{ $urunler->id }}" switch="success" {{$urunler->durum ? 'checked' : ''}}>
                                        <label for="{{ $urunler->id }}" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        @if(Auth::user()->can('Ürünler.Düzenle'))
                                        <a href="{{route('urun.duzenle',$urunler->id)}}" class="btn btn-info sm m-2" title="Düzenle"><i class="fas fa-edit"></i></a>
                                        @endif

                                        @if(Auth::user()->can('Ürünler.Sil'))
                                        <a href="{{route('urun.sil',$urunler->id)}}" class="btn btn-danger sm m-2" title="Sil" id="sil"><i class="fas fa-trash-alt"></i></a>
                                        @endif

                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>


@endsection

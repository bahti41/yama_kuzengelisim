@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Alt Kategoriler</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Alt Kategoriler</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Kategori Adı</th>
                                    <th>Alt Kategori Adı</th>
                                    <th>Resim</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>


                            <tbody>

                                @php
                                ($s=1)
                                @endphp

                                <tr>
                                    @foreach($altkategoriler as $altkategori)
                                    <td>{{ $s++ }}</td>
                                    <td>{{ $altkategori['iliskikategori']['kategori_adi'] }}</td>
                                    <td>{{ $altkategori->altkategori_adi }}</td>
                                    <td><img src="{{(!empty($altkategori->resim))? url($altkategori->resim): url('upload/görseli_hazrilaniyor.png')}}" style="height: 50px; width:50px;" alt=""></td>
                                    <td>

                                        @if(Auth::user()->can('Altkategoriler.Duzunle'))
                                        <a href="{{route('altkategori.duzenle',$altkategori->id)}}" class="btn btn-info sm m-2" title="Düzenle"><i class="fas fa-edit"></i></a>
                                        @endif

                                        @if(Auth::user()->can('Altkategoriler.Sil'))
                                        <a href="{{route('altkategori.sil',$altkategori->id)}}" class="btn btn-danger sm m-2" title="Sil" id="sil"><i class="fas fa-trash-alt"></i></a>
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

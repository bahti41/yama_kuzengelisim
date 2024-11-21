@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blog İcerik</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">İcerik Liste</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Başlık</th>
                                    <th>Kategori Adı</th>
                                    <th>Resim</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>


                            <tbody>


                                <tr>
                                    @foreach($icerikliste as $icerik)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $icerik->baslik }}</td>
                                    <td>{{ $icerik['kategoriler']['kategori_adi']}}</td>
                                    <td><img src="{{(!empty($icerik->resim))? url($icerik->resim): url('upload/görseli_hazrilaniyor.png')}}" style="height: 50px; width:50px;" alt=""></td>
                                    <td>
                                        <input type="checkbox" class="metinler" data-id="{{ $icerik->id }}" id="{{ $icerik->id }}" switch="success" {{$icerik->durum ? 'checked' : ''}}>
                                        <label for="{{ $icerik->id }}" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        @if(Auth::user()->can('Blogicerik.Düzenle'))
                                        <a href="{{route('blog.icerik.duzenle',$icerik->id)}}" class="btn btn-info sm m-2" title="Düzenle"><i class="fas fa-edit"></i></a>
                                        @endif

                                        @if(Auth::user()->can('Blogicerik.Sil'))
                                        <a href="{{route('blog.icerik.sil',$icerik->id)}}" class="btn btn-danger sm m-2" title="Sil" id="sil"><i class="fas fa-trash-alt"></i></a>
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
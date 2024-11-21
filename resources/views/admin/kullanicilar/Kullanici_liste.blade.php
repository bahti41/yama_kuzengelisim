@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kullanıcı Liste</h4>

                    @if(Auth::user()->can('Kullanici.ekle'))
                    <a href="{{route('kullanici.ekle')}}">
                        <button type="button" class="btn btn-primary waves-effect waves-light" style="float:right;">Kullanıcı Ekle</button>
                    </a>
                    @endif


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Kullanıcılar</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Resim</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>Kullanıcı Email</th>
                                    <th>Kullanıcı Rolü</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>


                            <tbody>

                                @php
                                ($s=1)
                                @endphp

                                <tr>
                                    @foreach($kullanici_liste as $kullaniciler)
                                    <td>{{ $s++ }}</td>
                                    <td><img src="{{(!empty($kullaniciler->resim))? url('upload/admin/'.$kullaniciler->resim): url('upload/görseli_hazrilaniyor.png')}}" style="height: 50px; width:50px;" alt=""></td>
                                    <td>{{ $kullaniciler->name }}</td>
                                    <td>{{ $kullaniciler->email }}</td>
                                    <td>
                                        @foreach($kullaniciler->roles as $rol)
                                        <span class="badge badge-pill bg-primary" style="font-size: 15px;"> {{$rol->name}} </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if(Auth::user()->can('Kullanici.düzenle'))
                                        <a href="{{route('kullanici.duzenle',$kullaniciler->id)}}" class="btn btn-info sm m-2" title="Düzenle"><i class="fas fa-edit"></i></a>
                                        @endif

                                        @if(Auth::user()->can('Kullanici.sil'))
                                        <a href="{{route('kullanici.sil',$kullaniciler->id)}}" class="btn btn-danger sm m-2" title="Sil" id="sil"><i class="fas fa-trash-alt"></i></a>
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

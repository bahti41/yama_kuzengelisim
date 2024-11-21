@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">İzinler Liste</h4>


                    <a href="{{route('izin.ekle')}}">
                        <button type="button" class="btn btn-primary waves-effect waves-light" style="float:right;">İzin Ekle</button>
                    </a>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">İzinler</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>İzin Adı</th>
                                    <th>Grup Adı</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>


                            <tbody>

                                @php
                                ($s=1)
                                @endphp

                                <tr>
                                    @foreach($izinler as $izin)
                                    <td>{{ $s++ }}</td>
                                    <td>{{ $izin->name }}</td>
                                    <td>{{ $izin->grup_adi }}</td>
                                    <td>
                                        <a href="{{route('izin.duzenle',$izin->id)}}" class="btn btn-info sm m-2" title="Düzenle"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('izin.sil',$izin->id)}}" class="btn btn-danger sm m-2" title="Sil" id="sil"><i class="fas fa-trash-alt"></i></a>
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
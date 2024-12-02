@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Mesajlar</h4>

                    <a href="{{ route('export.excel') }}" class="btn btn-primary waves-effect waves-light" style="float:right;">Excel'e Aktar</a>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Mesaj Liste</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Adı</th>
                                    <th>email</th>
                                    <th>telefon</th>
                                    <th>konu</th>
                                    <th>mesaj</th>
                                </tr>
                            </thead>


                            <tbody>


                                <tr>
                                    @foreach($mesajliste as $mesaj)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mesaj->adi }}</td>
                                    <td>{{ $mesaj->email }}</td>
                                    <td>{{ $mesaj->telefon }}</td>
                                    <td>{{ $mesaj->konu }}</td>
                                    <td>{{ $mesaj->mesaj }}</td>


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
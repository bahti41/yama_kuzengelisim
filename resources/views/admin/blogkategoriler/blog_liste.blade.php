@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blog Kategoriler</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Blog Liste</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Kategori Adı</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>


                            <tbody>


                                <tr>
                                    @foreach($blogliste as $bloglar)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bloglar->kategori_adi }}</td>
                                    <td>
                                        <input type="checkbox" class="icerikler" data-id="{{ $bloglar->id }}" id="{{ $bloglar->id }}" switch="success" {{$bloglar->durum ? 'checked' : ''}}>
                                        <label for="{{ $bloglar->id }}" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
                                        @if(Auth::user()->can('Blog.Duzenle'))
                                        <a href="{{route('blog.kategori.duzenle',$bloglar->id)}}" class="btn btn-info sm m-2" title="Düzenle"><i class="fas fa-edit"></i></a>
                                        @endif

                                        @if(Auth::user()->can('Blog.Sil'))
                                        <a href="{{route('blog.kategori.sil',$bloglar->id)}}" class="btn btn-danger sm m-2" title="Sil" id="sil"><i class="fas fa-trash-alt"></i></a>
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
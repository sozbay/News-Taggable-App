@extends('include.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resimler /</span> Liste</h4>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-xxl flex-grow-1 container-p-y">
             <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tüm Resimler</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Resim ile ilgili işlemler yapabilirsiniz.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Resim No</th>
                                    <th>Resim Başlık</th>
                                    <th>Resim</th>
                                     <th>Resim Tarihi</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                    <tr>
                                        <td>
                                            {{$image->id}}
                                        </td>
                                        <td>
                                            {{$image->title}}
                                        </td>

                                        <td>
                                           <img src="{{ asset('/assets/img/'.$image->image)  }}" height="50">
                                        </td>
                                        <td>
                                            {{$image->created_at}}
                                        </td>

                                        <td width="200">

                                            <a class="btn btn-xs btn-primary"
                                               href="{{route('imageEdit',$image->id)}}">
                                                <i data-feather="pencil" class="me-50 ti ti-pencil"></i>

                                            </a>
                                            <a class="btn btn-xs btn-danger" href="{{route('imageDelete',$image->id)}}">
                                                <i data-feather="eye" class="me-10 ti ti-trash"></i>

                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection
@section('script')
@endsection

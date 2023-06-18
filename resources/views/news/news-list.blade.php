@extends('include.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Haberler /</span> Liste</h4>
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
                            <h4 class="card-title">Tüm Haberler</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Haber ile ilgili işlemler yapabilirsiniz.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Haber No</th>
                                    <th>Haber Başlık</th>
                                    <th>Haber Açıklama</th>
                                     <th>Haber Tarihi</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $new)
                                    <tr>
                                        <td>
                                            {{$new->id}}
                                        </td>
                                        <td>
                                            {{$new->title}}
                                        </td>

                                        <td>
                                            {{ Str::limit($new->description, 100) }}
                                        </td>
                                        <td>
                                            {{$new->created_at}}
                                        </td>

                                        <td width="200">

                                            <a class="btn btn-xs btn-primary"
                                               href="{{route('newsEdit',$new->id)}}">
                                                <i data-feather="pencil" class="me-50 ti ti-pencil"></i>

                                            </a>
                                            <a class="btn btn-xs btn-danger" href="{{route('newsDelete',$new->id)}}">
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
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.print.js"></script>
    <script src="../../assets/js/tables-datatables-basic.js"></script>
@endsection

@extends('include.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Etiketler /</span> Liste</h4>
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
                            <h4 class="card-title">Tüm Etiketler</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Etiketler ile ilgili işlemler yapabilirsiniz.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Etiket No</th>
                                    <th>Etiket</th>

                                     <th>Etiket Tarihi</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>
                                            {{$tag->id}}
                                        </td>
                                        <td>
                                            {{$tag->name}}
                                        </td>

                                        <td>
                                            {{$tag->created_at}}
                                        </td>

                                        <td width="200">

                                            <a class="btn btn-xs btn-primary"
                                               href="{{route('tagEdit',$tag->id)}}">
                                                <i data-feather="pencil" class="me-50 ti ti-pencil"></i>

                                            </a>
                                            <a class="btn btn-xs btn-danger" href="{{route('tagDelete',$tag->id)}}">
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

@extends('include.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Videolar /</span> Liste</h4>
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
                            <h4 class="card-title">Tüm Videolar</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Video ile ilgili işlemler yapabilirsiniz.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Video No</th>
                                    <th>Video Başlık</th>
                                    <th>Video Tarihi</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td>
                                            {{$video->id}}
                                        </td>
                                        <td>
                                            {{$video->title}}
                                        </td>

                                        <td>
                                            {{$video->created_at}}
                                        </td>
                                        <td width="200">
                                            <a class="btn btn-xs btn-primary"
                                               href="{{route('videoEdit',$video->id)}}">
                                                <i data-feather="pencil" class="me-50 ti ti-pencil"></i>
                                            </a>
                                            <a class="btn btn-xs btn-danger" href="{{route('videoDelete',$video->id)}}">
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

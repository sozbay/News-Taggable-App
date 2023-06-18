@extends('include.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form class="source-item pt-4 px-0 px-sm-4 " action="{{route('tagUpdate')}}" method="post">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @csrf
                <h3 class="card-header">Etiket Detay</h3>
                <hr>
                    <input type="hidden" name="tagId" value="{{$tag->id}}">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Etiket Adı</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" value="{{$tag->name}}" name="name"
                                           id="html5-text-input">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Düzenle</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
@endsection

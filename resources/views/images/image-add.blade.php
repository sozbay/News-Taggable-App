@extends('include.master')
@section('content')
         <form class="source-item pt-4 px-0 px-sm-4 " action="{{route('imageStore')}}" method="post"
              enctype="multipart/form-data">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3 class="card-header">Resim Ekle</h3>
                <hr>
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-4 col-form-label">Resim Adı</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" value="" name="title"
                                           id="html5-text-input">
                                </div>
                            </div>
                            <label for="html5-text-input" class="col-md-4 col-form-label">Resim</label>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="select2Primary" class="form-label">Etiketler</label>
                                <div class="select2-primary">
                                    <select id="select2Primary" class="select2 form-select" name="tags[]" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
 @endsection
@section('script')
@endsection

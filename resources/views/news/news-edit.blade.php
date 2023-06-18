@extends('include.master')
@section('content')
         <form class="source-item pt-4 px-0 px-sm-4 " action="{{route('newsUpdate')}}" method="post">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @csrf
                <h3 class="card-header">Haber Detay</h3>
                <hr>
                    <input type="hidden" name="newsId" value="{{$news->id}}">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Başlık</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" value="{{$news->title}}" name="title"
                                           id="html5-text-input">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> İçerik</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                                          rows="8">{{$news->description}}</textarea>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="select2Primary" class="form-label">Etiketler</label>
                                <div class="select2-primary">
                                    <select id="select2Primary" class="select2 form-select" name="tags[]" multiple
                                            placeholder="Etiket Seçiniz">
                                        @foreach($tags as $tag)
                                            <option
                                                @if(in_array($tag->id,$news->taggable->pluck('tag_name_id')->toArray(),false)) selected
                                                @endif value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Düzenle</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
 @endsection
@section('script')
@endsection

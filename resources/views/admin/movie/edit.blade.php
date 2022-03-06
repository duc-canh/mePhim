@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Movie
                            <small>Edit</small>
                        </h1>
                        @if(count($errors))
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{ $err}} <br>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('admin.movie.update',$movie->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label >Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id}}" @if($movie->category_id == $category->id) selected @endif > {{ $category->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Genre</label>
                                <select class="form-control" name="genre_id">
                                    @foreach($genres as $genre)
                                    <option value="{{ $genre->id}}" @if($movie->genre_id == $genre->id) selected @endif>{{ $genre->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Country</label>
                                <select class="form-control" name="country_id">
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id}}" @if($movie->country_id == $country->id) selected @endif>{{ $country->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="{{ $movie->title }}" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" />
                                <img src="{{ $movie->urlImage() }}" width="50px" height="auto">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="demo" name="description" class="ckeditor">{{ $movie->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Release year</label>
                                <input class="form-control" name="release_year" value="{{ $movie->release_year }}" />
                            </div>
                            <div class="form-group">
                                <label>Movie Status</label>
                                <label class="radio-inline">
                                    <input name="status" @if($movie->status == 1) checked @endif type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="status" @if($movie->status == 0) checked @endif type="radio">Invisible
                                </label>
                            </div>
                            <div class="form-group">
                                <label>New Movie</label>
                                <label class="radio-inline">
                                    <input name="movie_new" @if($movie->movie_new == 1) checked @endif type="radio">New
                                </label>
                                <label class="radio-inline">
                                    <input name="movie_new"  @if($movie->movie_new == 0) checked @endif type="radio">Old
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Highlight Movie</label>
                                <label class="radio-inline">
                                    <input name="movie_highlight"  @if($movie->movie_highlight == 1) checked @endif type="radio">Highlight
                                </label>
                                <label class="radio-inline">
                                    <input name="movie_highlight"  @if($movie->movie_highlight == 0) checked @endif type="radio">Normal
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Update</button>
                            
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
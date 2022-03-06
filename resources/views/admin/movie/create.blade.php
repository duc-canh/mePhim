@extends('admin.layout.master')
@section('title')
Movie Create
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Movie
                            <small>Add</small>
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
                        <form action="{{ route('admin.movie.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id}}">{{ $category->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Genre</label>
                                <select class="form-control" name="genre_id">
                                    @foreach($genres as $genre)
                                    <option value="{{ $genre->id}}">{{ $genre->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Country</label>
                                <select class="form-control" name="country_id">
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id}}">{{ $country->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="demo" name="description" class="ckeditor"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Release year</label>
                                <input class="form-control" name="release_year" placeholder="Please Enter release year" />
                            </div>
                            <div class="form-group">
                                <label>Movie Status</label>
                                <label class="radio-inline">
                                    <input name="status" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="0" type="radio">Invisible
                                </label>
                            </div>
                            <div class="form-group">
                                <label>New Movie</label>
                                <label class="radio-inline">
                                    <input name="movie_new" value="1" checked="" type="radio">New
                                </label>
                                <label class="radio-inline">
                                    <input name="movie_new" value="0" type="radio">Old
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Highlight Movie</label>
                                <label class="radio-inline">
                                    <input name="movie_highlight" value="1" checked="" type="radio">Highlight
                                </label>
                                <label class="radio-inline">
                                    <input name="movie_highlight" value="0" type="radio">Normal
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Country Add</button>
                            
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Episode
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
                        <form action="{{ route('admin.episode.update',$episode->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Movie</label>
                                <select class="form-control" name="movie_id">
                                    @foreach($movies as $movie)
                                    <option value="{{ $movie->movie_id }}" @if($episode->movie_id == $movie->id) selected @endif>{{ $movie->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Link Movie</label>
                                <input required class="form-control" name="link_movie" value="{{ $episode->link_movie}}" />
                            </div>
                            <div class="form-group">
                                <label>Episodes</label>
                                <input required class="form-control" name="episodes" value="{{ $episode->episodes}}" />
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
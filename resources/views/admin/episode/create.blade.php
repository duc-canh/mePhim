@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Episode
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
                        <form action="{{ route('admin.episode.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Movie</label>
                                <select class="form-control" name="movie_id">
                                    @foreach($movies as $movie)
                                    <option value="{{ $movie->id}}">{{ $movie->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Link Movie</label>
                                <input class="form-control" name="link_movie" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Episodes</label>
                                <input class="form-control" name="episodes" placeholder="Please Enter Password" />
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
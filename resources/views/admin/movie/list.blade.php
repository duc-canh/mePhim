@extends('admin.layout.master')
@section('title')
Movie List
@endsection

@section('content')
<div id="page-wrapper" >
   
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Movie
                            <small>List</small>
                        </h1>
                      
                    @if(session('success'))
                        <p class="alert alert-success">
                            {{ session('success')}}
                        </p>
                    @endif
                    </div>
                   
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>title</th>
                                <th>image</th>
                                <th>Category</th>
                                <th>Genre</th>
                                <th>Country</th>
                                <th>status</th>
                                <th>views count</th>
                                <th>New/Old</th>
                                <th>Normal/Highlight</th>
                                <th>release_year</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $movie->id}}</td>
                                <td>{{ $movie->title}}</td>
                                <td><img src="{{ $movie->urlImage() }}" width="50px" height="auto"></td>
                                <td>{{ $movie->category->title}}</td>
                                <td>{{ $movie->genre->title}}</td>
                                <td>{{ $movie->country->title}}</td>
                                <td>{{ $movie->status == 0 ? "invisible" : "visible" }}</td>
                                <td>{{ $movie->views_count}}</td>
                                <td>{{ $movie->movie_new == 0 ? "old" : "new" }}</td>
                                <td>{{ $movie->movie_highlight == 0 ? "normal" : "highlight" }}</td>
                                <td>{{ $movie->release_year }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.movie.delete',$movie->id)}}"> Delete</a></td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.movie.edit',$movie->id)}}">Edit</a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {!! $movies->links() !!}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
           
        </div>
       
@endsection
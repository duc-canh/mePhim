@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper" >
   
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Episode
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
                                <th>Movie</th>
                                <th>Link Movie</th>
                                <th>Episode</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($episodes as $episode)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $episode->id}}</td>
                                <td>{{ $episode->movie->title}}</td>
                                <td>{{ $episode->link_movie }}</td>
                                <td>{{ $episode->episodes }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.episode.delete',$episode->id)}}"> Delete</a></td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.episode.edit',$episode->id)}}">Edit</a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
           
        </div>
@endsection
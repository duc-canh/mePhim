@extends('admin.layout.master')
@section('title')
List Genre
@endsection

@section('content')
<div id="page-wrapper" >
   
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Genre
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
                                
                                <th>description</th>
                                <th>slug</th>
                                <th>status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($genres as $genre)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $genre->id}}</td>
                                <td>{{ $genre->title}}</td>
                                <td>{{ $genre->description }}</td>
                                <td>{{ $genre->slug }}</td>
                                <td>{{ $genre->status == 0 ? "invisible" : "visible" }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.genre.delete',$genre->id)}}"> Delete</a></td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.genre.edit',$genre->id)}}">Edit</a></td>
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
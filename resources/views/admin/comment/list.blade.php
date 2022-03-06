@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper" >
   
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comment
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
                                <th>Name</th>
                                <th>Content</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $commnet)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $commnet->id}}</td>
                                <td>{{ $commnet->movie->title }}</td>
                                <td>{{ $commnet->name}}</td>
                                <td>{{ $commnet->content }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.comment.delete',$comment->id)}}"> Delete</a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {!! $comments->links() !!}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
           
        </div>
@endsection
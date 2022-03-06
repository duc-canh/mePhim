
@extends('admin.layout.master')
@section('title')
List Catagory
@endsection

@section('content')

<div id="page-wrapper" >
   
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                        @if(session('success'))
                        <p class="alert alert-success">
                            {{ session('success')}}
                        </p>
                   
                    @endif
                    </div>
                   
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
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
                        <tbody class="order_position">
                            @foreach($categories as $category)
                            <tr id="{{ $category->id }}" class="odd gradeX" align="center">
                                <td>{{ $category->id}}</td>
                                <td>{{ $category->title}}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->status == 0 ? "invisible" : "visible" }}</td>
                                <!-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.category.delete',$category->id)}}"> Delete</a></td> -->
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><button class="DeleteListCartItem" data-id="{{ $category->id }}">Delete</button>  </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.category.edit',$category->id)}}">Edit</a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
           
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
     $(document).ready(function() {
        $('.DeleteListCartItem').click(function(e) {
        $.ajax({
            type: "get",
            url: "/admin/category/delete/"+$(this).data("id"),
            data: $(this).serialize(),
            success: function(response)
            {   
                $("body").empty();
                $("body").html(response); 
           }
       });
      });
    });
</script>
@endsection

@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper" >
   
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Contact
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Content</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $contact->id}}</td>
                                <td>{{ $contact->name}}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>{{ $contact->content }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.contact.delete',$contact->id)}}"> Delete</a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {!! $contacts->links() !!}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
           
        </div>
@endsection
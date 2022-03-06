@extends('admin.layout.master')
@section('title')
Edit Country
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Country
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
                        <form action="{{ route('admin.country.update',$country->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Title</label>
                                <input required class="form-control"  name="title" value="{{ $country->title}}" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input required class="form-control" name="description" value="{{ $country->description}}" />
                            </div>
                            <div class="form-group">
                                <label>Product Status</label>
                                <label class="radio-inline">
                                    <input name="status" @if($country->status == 1) checked @endif type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="status" @if($country->status == 0) checked @endif type="radio">Invisible
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
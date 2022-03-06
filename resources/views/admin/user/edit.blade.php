@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
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
                        <form action="{{ route('admin.user.update',$user->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{ $user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" readonly value="{{ $user->email}}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password"  />
                            </div>
                            <div class="form-group">
                                <label>Comfirm Password</label>
                                <input class="form-control" name="comfirm_password" type="password" />
                            </div>
                            <div class="form-group">
                                <label>Is Admin</label>
                                <label class="radio-inline">
                                    <input name="is_admin" value="0" @if($user->is_admin == 0) checked @endif type="radio">User
                                </label>
                                <label class="radio-inline">
                                    <input name="is_admin" value="1" @if($user->is_admin == 1) checked @endif type="radio">Admin
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
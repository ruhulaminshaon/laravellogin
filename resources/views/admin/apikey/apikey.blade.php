@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>
                        <h2>Api Key</h2>
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                    </div>
                <hr>
                <div class="panel-body" style="background: #cfcfcf">
                    <form class="form-horizontal" method="POST" action="{{route('api_save')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="api_name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-6">
                            <button type="submit" class="btn btn-warning">Api Save</button>
                            </div>
                        </div>

                    </form>
                </div>



            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Api Key Show</h2>
        <hr>
           <table class="table">
               <tr>
                   <th>Name</th>
                   <th>Api</th>
                   <th>Action</th>
               </tr>
               @foreach($apikey as $api)
               <tr>
                   <td>{{$api->name}}</td>
                   <td>{{$api->api_token}}</td>
                   <td><a href="#">Edit</a> | <a href="">Delete</a></td>
               </tr>
               @endforeach
           </table>
            
        </div>
    </div>
</div>
@endsection

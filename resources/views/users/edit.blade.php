@extends('layouts.app')

@section('title', 'Edit User')
@section('content')
    <div class="mx-auto">
        <form class="" action="{{route('users.update',$user->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       value="{{$user->email}}" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="usernameInput" class="form-label">Username</label>
                <input type="text" class="form-control" id="usernameInput" value="{{$user->name}}" name="name">
            </div>
            <select class=" form-select mb-3" aria-label="Default select example" multiple name="roleIds[]">
                @foreach($roles as $role)
                    <option value="{{$role->id}}"
                            @if(in_array($role->id,$user->roles->pluck('id')->toArray())) selected @endif>{{$role->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


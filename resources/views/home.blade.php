@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="text-center h1">
        Welcome {{Auth::user()->name}} to your dashboard
    </div>
    <div class="float-end">
        <form class="me-3">
            <div class="d-flex">
                <input type="text" class="form-control" placeholder="Search by user name" name="q"
                       value="{{$searchKey}}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($usersPagination as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{implode(',',$user->roles->pluck('alias')->toArray())}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary me-2">Edit</a>
                        <form action="{{route('users.delete',$user->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$usersPagination->links()}}
@endsection


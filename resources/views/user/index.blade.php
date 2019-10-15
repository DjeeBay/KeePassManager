@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-cyan">
            Users list
            <a href="{{route('user.create')}}">
                <button type="button" class="btn btn-sm btn-light rounded float-right"><i class="cui-plus"></i> Create</button>
            </a>
        </div>

        <div class="card-body">
            <table class="table table-hover table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('user.edit', $user)}}">
                                <button type="button" class="btn btn-warning rounded"><i class="cui-pencil"></i></button>
                            </a>
                            <button type="button" class="btn btn-danger rounded"><i class="cui-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

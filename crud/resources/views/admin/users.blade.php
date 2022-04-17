@extends('layouts.layout')
@section('content')


    <div class="container">
        <table class="table table-borderless">
            <tr>
                <th>id</th> <th>username</th> <th>email</th> <th>password</th>
            </tr>
            @foreach(\App\Models\User::all() as $item)
                <tr>
                    <td>{{$item->id}}</td> <td>{{$item->name}}</td> <td>{{$item->email}}</td> <td>{{$item->password}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection

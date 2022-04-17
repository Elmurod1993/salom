@extends('layouts.layout')
@section('content')

    <h1>product page</h1>
    <div class="contanier">
        <a href="{{route('product.create')}}" class="btn btn-primary">add product</a>
        <table class="table table-bordered">
            <tr>
                <th>id</th> <th>name</th> <th>price</th> <th>country</th> <th>image</th>
            </tr>
            @foreach(\App\Models\Product::all() as $item)
                <tr>
                    <td>{{$item->id}}</td> <td>{{$item->name}}</td><td>{{$item->price}}</td>
                    <td>{{$item->country}}</td>
                    <td><img src="{{asset('storage/'.$item->image)}}" width="100"></td>
<td>
                    <form style="display: inline-block" action="{{route('product.delete')}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" value="{{$item->id}}" name="id">
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form>

    <form action="{{route('product.edit')}}" method="post" style="display: inline-block">

        @csrf

        <input type="hidden" value="{{$item->id}}" name="id">
        <input type="submit" value="edit" class="btn btn-info">
    </form>
</td>



                </tr>
            @endforeach
        </table>
    </div>

@endsection

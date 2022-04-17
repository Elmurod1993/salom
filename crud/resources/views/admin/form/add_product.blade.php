@extends("layouts.layout")
@section('content')

    <div class="container">
        @if(session()->has('insert'))


            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{session('insert')}}</strong>

            </div>
        @endif

        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="w-50">
            @csrf

            <div class="form-group">
                <label for="">name</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">price</label>
                <input type="text" name="price" class="form-control">
                @error('price')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">country</label>
                <input type="text" name="country" class="form-control">
                @error('country')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">image</label>
                <input type="file" name="image" class="form-control">

            </div>
            <input type="submit" class="btn btn-primary" value="add product">
        </form>


    </div>


@endsection



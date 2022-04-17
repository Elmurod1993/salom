@extends("layouts.layout")
@section('content')

    <div class="container">
        @csrf
        <form action="" method="post" enctype="multipart/form-data" class="w-50">
            <div class="form-control">
                <label for="">name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-control">
                <label for="">price</label>
                <input type="text" name="price" class="form-control">
            </div><div class="form-control">
                <label for="">country</label>
                <input type="text" name="country" class="form-control">
            </div>
            <div class="form-control">
                <label for="">image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <input type="submit" class="btn btn-circle" value="add category">
        </form>
    </div>

@endsection



@include('CRUD.header')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                created successfully
            </div>
        @endif
        <form method="post" action="{!! url('product')!!}">
            @csrf
            <div class="mb-3">
                <label for="exampleInpproductNameutEmail1" class="form-label">productName</label>
                <input type="text" name="productName" class="form-control" id="productName" aria-describedby="emailHelp">
                @error('productName')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="number"  name="price"class="form-control" id="price">
                @error('price')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>


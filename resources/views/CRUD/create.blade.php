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
                {{Session::get('success')}}
            </div>
        @endif
        <form method="post" action="{!! url('product')!!}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
{{--                ar--}}
                <label for="exampleInpproductNameutEmail1" class="form-label">{{__('messages.product_name_ar')}}</label>
                <input type="text" name="product_name_ar" class="form-control" id="productName" aria-describedby="emailHelp">
{{--                            en--}}
                <label for="exampleInpproductNameutEmail1" class="form-label">{{__('messages.product_name_en')}}</label>
                <input type="text" name="product_name_en" class="form-control" id="productName" aria-describedby="emailHelp">
                @error('productName')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">{{__('messages.price')}}</label>
                <input type="number"  name="price"class="form-control" id="price">
                @error('price')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                {{--ar--}}
                <label for="description" class="form-label">{{__('messages.description_ar')}}</label>
                <textarea class="form-control" name="product_description_ar" id="description"></textarea>
                {{--en--}}
                <label for="description" class="form-label">{{__('messages.description_en')}}</label>
                <textarea class="form-control" name="product_description_en" id="description"></textarea>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="file" name="product_image">
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{__('submit')}}</button>
        </form>
    </div>
</body>
</html>


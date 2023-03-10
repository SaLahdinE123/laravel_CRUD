<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>
<body>
<style>

    @if(LaravelLocalization::getCurrentLocale() == "ar")
       .section{
            direction: rtl !important;
        }
    @else
        .section{
        direction: ltr !important;
    }
    @endif
</style>
<div class="container section" >
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
        </div>
    @endif
    <a class="btn btn-primary text-white mb-4 mt-4"  href="{{url('product/create')}}">{{__('messages.add_product')}}</a>
    <table class="table text-center">
        <thead>
        <tr class="bg-black text-white ">
            <th scope="col">id</th>
            <th scope="col">{{__("messages.product_name")}}</th>
            <th scope="col">{{__("messages.price")}}</th>
            <th scope="col">{{__("messages.product_description")}}</th>
            <th scope="col">{{__("messages.product_image")}}</th>
            <th scope="col">{{__("messages.product_action")}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr class="align-middle">
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->product_name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->product_description}}</td>
                <td><img style="width: 50px ; height: 50px"  src="/images/products_images/{{$product->product_image}}" alt="" srcset=""></td>
                <td style="display: flex ; gap: 10px ; margin-top:20px ; justify-content: center ; align-items: cen" >
                    <a href="product\{{$product->id}}\edit" class="btn btn-primary">{{__("messages.product_update")}}</a>
                    <form action="{{url('product/'.$product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">{{__("messages.product_delete")}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

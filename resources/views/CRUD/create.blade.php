@include('CRUD.header')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<style>
    .upload-image-container{
    }
</style>
    <div class="container">
        <h1 class="title_test">test css</h1>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <form method="post" action="{!! url('product')!!}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                {{--ar--}}
                <label for="exampleInpproductNameutEmail1" class="form-label">{{__('messages.product_name_ar')}}</label>
                <input type="text" name="product_name_ar" class="form-control" id="productName" aria-describedby="emailHelp">
                {{--en--}}
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
                <div >
                    <label for="image_file" class="btn border-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                        </svg> upload image </label>
                    <span id="image_name"></span>
                </div>

                <input type="file" name="product_image" id="image_file" style="display: none">
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{__('submit')}}</button>
        </form>

    </div>
    <script >
        let image_file = document.getElementById('image_file') ;
        let image_name = document.getElementById('image_name') ;
        image_file.addEventListener(('change') , ()=>{
            console.log(image_file.files[0])
            image_name.innerHTML = image_file.files[0].name
        })
    </script>
</body>
</html>


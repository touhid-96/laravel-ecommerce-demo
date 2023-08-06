<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        .title {
            color: white;
            padding-top: 25px;
            font-size: 25px;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>
<body>
@include('admin.sidebar')
@include('admin.navbar')

<div class="container-fluid page-body-wrapper">
    <div class="container" align="center">
        <h1 class="title">
            Update Product
        </h1>

        @if(session()->has('message'))
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ url('update_product', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding: 15px; margin-top: 2em">
                <label>Product Title</label>
                <input style="color: black" type="text" name="title" value="{{ $data->title }}" required></input>
            </div>

            <div style="padding: 15px">
                <label>Price</label>
                <input style="color: black" type="number" name="price" value="{{ $data->price }}" required></input>
            </div>

            <div style="padding: 15px">
                <label>Description</label>
                <input style="color: black" type="text" name="description" value="{{ $data->description }}" required></input>
            </div>

            <div style="padding: 15px">
                <label>Product Quantity</label>
                <input style="color: black" type="text" name="quantity" value="{{ $data->quantity }}" required></input>
            </div>

            <div style="padding: 15px">
                <label>Old Image</label>
                <img width="100" height="100" src="/product_image/{{ $data->image }}">
            </div>

            <div style="padding: 15px; margin-left: 9em">
                <label>Change Image</label>
                <input type="file" name="file"></input>
            </div>

            <div style="padding: 15px">
                <input class="btn btn-success" type="submit"></input>
            </div>
        </form>
    </div>
</div>

@include('admin.script')
</body>
</html>

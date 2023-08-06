<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
@include('admin.sidebar')
@include('admin.navbar')

<div style="padding-bottom: 30px" class="container-fluid page-body-wrapper">
    <div class="container" align="center">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('message') }}
            </div>
        @endif
        <table>
            <tr align="center" style="background-color: gray; align-items: center">
                <td style="padding: 20px">Title</td>
                <td style="padding: 20px">Description</td>
                <td style="padding: 20px">Quantity</td>
                <td style="padding: 20px">Price</td>
                <td style="padding: 20px">Image</td>
                <td style="padding: 20px">Action</td>
            </tr>

            @foreach($data as $product)
                <tr align="center" style="background-color: black; align-items: center">
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td><img width="100" height="100" src="/product_image/{{ $product->image }}"></td>
                    <td style="display: flex; flex-direction: column">
                        <a style="margin-top: 25px" class="btn btn-primary" href="{{ url('update_product_show', $product->id) }}">Update</a>
                        <a style="margin-top: 5px" class="btn btn-danger" href="{{ url('delete_product', $product->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@include('admin.script')
</body>
</html>

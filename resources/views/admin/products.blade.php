<!DOCTYPE html>
<html lang="en">
<head>
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
<!-- partial -->
@include('admin.navbar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title">
                Add Product
            </h1>

            <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px; margin-top: 2em">
                    <label>Product Title</label>
                    <input type="text" name="title" placeholder="Give a product title" required></input>
                </div>

                <div style="padding: 15px">
                    <label>Price</label>
                    <input type="number" name="price" placeholder="Give a price" required></input>
                </div>

                <div style="padding: 15px">
                    <label>Description</label>
                    <input type="text" name="description" placeholder="Give a description" required></input>
                </div>

                <div style="padding: 15px">
                    <label>Product Quantity</label>
                    <input type="text" name="Quantity" placeholder="Give a product Quantity" required></input>
                </div>

                <div style="padding: 15px; margin-left: 9em">
                    <label>Photo</label>
                    <input type="file" name="file"></input>
                </div>

                <div style="padding: 15px">
                    <input class="btn btn-success" type="submit"></input>
                </div>
            </form>
        </div>
    </div>
<!-- partial -->
@include('admin.script')
</body>
</html>

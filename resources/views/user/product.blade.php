<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>

                    <form class="form-inline" style="float: right; padding: 10px" action="{{ url('search') }}" method="GET">
                        <input class="form-control" type="search" name="search" placeholder="search">
                        <input class="btn btn-success" type="submit" value="search">
                    </form>
                </div>
            </div>

            @foreach($data as $product)
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img width="100" height="240" src="/product_image/{{ $product->image }}" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4>{{ $product->title }}</h4></a>
                            <h6>${{ $product->price }}</h6>
                            <p>{{ $product->description }}</p>

                            <form action="{{ url('add_cart', $product->id) }}" method="POST">
                                @csrf
                                <input class="form-control" type="number" name="quantity" value="1" min="1" style="width: 100px">
                                <br>
                                <input class="btn btn-primary" type="submit" value="Add To Cart">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            {{--for pagination : page 1, 2--}}
            @if(method_exists($data, 'links'))
                <div class="d-flex justify-content-center">
                    {!! $data->links() !!}
                </div>
            @endif

        </div>
    </div>
</div>

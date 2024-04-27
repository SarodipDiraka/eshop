<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>

              <form class="form-inline" style="float: right; padding: 10px;" action="{{url('search')}}" method="get">
                <input type="search" class="form-control" name="search" placeholder="search">
                <input type="sumbit" value="Search" class="btn btn-success">
              </form>

            </div>
          </div>
          
          @foreach ($data as $product)
              
          <div class="col-md-4">
            <div class="product-item">
              <div style="width: 300px;
              height: 300px;">
              <a href="#"><img src="/productimage/{{$product->image}}" alt="" style="height: 100%;
                width: auto;"></a>
              </div>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>${{$product->price}}</h6>
                <p>{{$product->description}}</p>

                <form method="POST" action="{{url('addcart', $product->id)}}">
                  @csrf
                  <input class="form-control" value="1" type="number" min="1" style="width: 100px; max-width" name="quantity">
                  <br>
                  <input class="btn btn-primary" value="Add Cart" type="submit">
                </form>

                <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (32)</span>
              </div>
            </div>
          </div>


          @endforeach

          @if (method_exists($data, 'links'))
              
          <div class="d-flex justify-content-center">

            {!! $data->links() !!}
          </div>
          @endif
        </div>
      </div>
    </div>
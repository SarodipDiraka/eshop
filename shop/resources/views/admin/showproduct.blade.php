<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    
        @include('admin.sidebar')
      
        @include('admin.navbar')

        <div class="row" style="padding-top: 100px" align="center">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    
                    {{session()->get('message')}}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right"></button>
                
                </div>
            @endif
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Products</h4>
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> Title </th>
                          <th> Description </th>
                          <th> Quantity </th>
                          <th> Price </th>
                          <th> Image </th>
                          <th> Update </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <img src="/productimage/{{$product->image}}" alt="">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{url('updateview', $product->id)}}">Update</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{url('deleteproduct', $product->id)}}" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.script')
  </body>
</html>
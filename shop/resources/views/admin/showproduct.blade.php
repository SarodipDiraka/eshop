<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    
        @include('admin.sidebar')
      
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper" style="padding-bottom: 30px">
            <div class="container" align="center">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        
                        {{session()->get('message')}}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right"></button>
                    
                    </div>
                @endif

                <table>
                    <tr style="background-color: gray">
                        <td style="padding: 20px">Title</td>
                        <td style="padding: 20px">Description</td>
                        <td style="padding: 20px">Quantity</td>
                        <td style="padding: 20px">Price</td>
                        <td style="padding: 20px">Image</td>
                        <td style="padding: 20px">Update</td>
                        <td style="padding: 20px">Delete</td>
                    </tr>

                    @foreach ($data as $product)
                        
                    <tr style="background-color: black;" align="center">
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <img src="/productimage/{{$product->image}}" alt="" height="100px" width="100px">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{url('updateview', $product->id)}}">Update</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{url('deleteproduct', $product->id)}}" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>

        @include('admin.script')
  </body>
</html>
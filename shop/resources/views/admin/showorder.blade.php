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
                    <h4 class="card-title">All Orders</h4>
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th> Customer name </th>
                            <th> Phone </th>
                            <th> Address </th>
                            <th> Product title </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($order as $orders)
                        <tr>
                            <td>{{$orders->name}}</td>
                            <td>{{$orders->phone}}</td>
                            <td>{{$orders->address}}</td>
                            <td>{{$orders->product_title}}</td>
                            <td>{{$orders->quantity}}</td>
                            <td>{{$orders->price}}</td>
                            <td>{{$orders->status}}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('updatestatus', $orders->id)}}">Deliver</a>
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
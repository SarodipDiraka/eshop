<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style>
        .title
        {
            color:white; padding-top: 25px; font-size: 25px;
        }
        label
        {
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
                <h1 class="title">Add product</h1>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        
                        {{session()->get('message')}}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right"></button>
                    
                    </div>
                @endif

                <form action="{{url('updateproduct', $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding-top: 15px">
                        <label>Product title</label>
                        <input type="text" name="title" placeholder="{{$data->title}}" required style="color: black;">
                    <div>

                    <div style="padding-top: 15px">
                        <label>Price</label>
                        <input type="number" name="price" placeholder="{{$data->price}}" required style="color: black;">
                    <div>


                    <div style="padding-top: 15px">
                        <label>Description</label>
                        <input type="text" name="des" placeholder="{{$data->description}}" required style="color: black;">
                    <div>

                    <div style="padding-top: 15px">
                        <label>Quantity</label>
                        <input type="text" name="quantity" placeholder="{{$data->quantity}}" required style="color: black;">
                    <div>

                    <div style="padding-top: 15px">
                        <label>Old Image</label>
                        <img src="/productimage/{{$data->image}}" alt="" height="100px" width="100px">
                    <div>

                    <div style="padding-top: 15px">
                        <label>Change the Image</label>
                        <input type="file" name="file">
                    <div>

                    <div style="padding-top: 15px">
                        <input type="submit" class="btn btn-success">
                    <div>
                </form>

            <div>
        </div>

        @include('admin.script')
  </body>
</html>
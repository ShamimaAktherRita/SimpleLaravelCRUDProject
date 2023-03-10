@extends('front.master')

@section('title')

    Manage Product

@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Manage Products</h3>
                            <div class="card-body">
                                <p class="text-center text-success">{{Session::get('message')}}</p>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td><img src="{{asset($product->image)}}" alt="" height="50" width="70"></td>
                                        <td>
                                            <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{route('delete-product',['id'=>$product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection



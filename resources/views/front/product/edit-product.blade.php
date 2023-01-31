@extends('front.master')

@section('title')

    Edit Product

@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit Products</h3>
                            <div class="card-body">
                                <p class="text-center text-success">{{Session::get('message')}}</p>
                                <form action="{{route('update-product',['id'=> $product->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Product Name</label>
                                        <div class="col-md-8">
                                            <input id="" type="text" name="name" value="{{$product->name}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Product Price</label>
                                        <div class="col-md-8">
                                            <input id="" type="number" value="{{$product->price}}" name="price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Product Description</label>
                                        <div class="col-md-8">
                                            <textarea name="description" id="" rows="5" class="form-control">{{$product->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Product Image</label>
                                        <div class="col-md-8">
                                            <input id="" type="file" name="image" class="form-control" accept="image/*">
                                            <img src="{{asset($product->image)}}" alt="" height="100" width="130"/>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="" class="col-md-4"></label>
                                        <div class="col-md-8">
                                            <input id="" type="submit" class="btn btn-outline-success px-5" value="Update Product Info">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection




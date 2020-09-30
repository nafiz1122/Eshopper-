@extends('layouts.admin_master')

@section('title')

@endsection

@section('content')

<div class="container">
    <div class="row">
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Dashboard</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Dashboard</a></li>
                                        <li class="active">Add Product</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-head">
                        <h3>Add Product</h3>
                        <!-- --------error message------------ -->
                            <div class="col-md-12">
                                    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        <!-- --------error message------------ -->
                        {{--  --------NOTIFICATION------  --}}
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}</p>
                        @endif

                    </div>
                    <br>
                    <form action="{{URL::to('/storeProduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="width:300px;">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" placeholder="Product Name" class="form-control">
                        </div>
                        <div class="form-group" style="width:300px;">
                            
                            <label for="exampleFormControlSelect1">Select Category</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($Categories as $category)
                                <option value="{{$category->id}}" >{{ $category->category_name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="width:300px;">
                            <label for="exampleFormControlSelect1">Select Brand</label>
                            <select name="brand_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($Brands as $Brand)
                                <option value="{{$Brand->id}}" >{{ $Brand->brand_name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Product Short Description</label>
                            <textarea name="product_short_des" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Product Long Description</label>
                            <textarea name="product_long_des" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group" style="width:300px;">
                            <label for="">Product Price</label>
                            <input type="text" name="product_price" placeholder="Product Price" class="form-control">
                        </div>
                        <div class="form-group" style="width:300px;">
                            <label for="exampleFormControlFile1">Product Image</label>
                            <input name="product_image"  type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <div class="form-group" style="width:300px;">
                            <label for="">Product Size</label>
                            <input type="text" name="product_size" placeholder="Product Size" class="form-control">
                        </div>
                        <div class="form-group" style="width:300px;">
                            <label for="">Product Color</label>
                            <input type="text" name="product_color" placeholder="Product Color" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Publication Status</label>
                            <input type="checkbox" name="product_status" value="1">
                        </div>
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

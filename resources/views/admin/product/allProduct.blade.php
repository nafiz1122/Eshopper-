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
                                        <li class="active">All Product</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-head">
                        <h3>Add Category</h3>
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
                            <p class="alert alert-info mt-2">{{ Session::get('message') }}</p>
                        @endif

                    </div>
                    <br>
                {{--  if want to use Datatable id="mydatatable"  --}}
                <table id="mydatatable"  class="table table-striped table-bordered table-sm" style="width:100%;display:inline-block">
                <thead>
                    <tr>
                        {{-- <th>Product ID</th> --}}
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        
                        {{-- <th>Product Short Description</th>
                        <th>Product Long Description</th> --}}
                        
                        <th>Price</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        {{-- <td>{{ $product->id }}</td> --}}
                        <td>{{ $product->product_name}}</td>
                        <td >
                            <div class="pro" style="width:80px;">
                                <img src="Client_images/Product_images/{{ $product->product_image}}" alt="">
                            </div>
                        </td>
                        <td>{{ $product->category->category_name}}</td>
                        <td>{{ $product->brand->brand_name}}</td>
                        {{-- <td>{{ $product->product_short_des}}</td>
                        <td>{{ $product->product_long_des}}</td> --}}
                        <td>{{ $product->product_price}}</td>
                        <td>{{ $product->product_size}}</td>
                        <td>{{ $product->product_color}}</td>
                        <td>
                            @if ($product->product_status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            @if ($product->product_status == 1)
                             <a href="{{URL::to('/inactive_product/'.$product->id) }}" class="btn btn-danger btn-sm" ><i class="fa fa-thumbs-down"></i></a>
                            @else
                             <a href="{{URL::to('/active_product/'.$product->id) }}" class="btn btn-success btn-sm" ><i class="fa fa-thumbs-up"></i></a>
                            @endif


                             <a href="#" class="btn btn-info btn-sm" >Edit</a>
                             <a href="{{URL::to('/deleteProduct/'.$product->id) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

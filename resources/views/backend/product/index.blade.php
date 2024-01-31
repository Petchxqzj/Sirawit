@extends('layouts.master_backend')
@section('conten')
            <div class="container">
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h1 class="title-1">Product</h1>

                                    <a href="{{route('p.create')}}" class="btn btn-success mx-3"><i class='bx bxs-plus-circl'></i>Add Product </a>

                                </div>
                            </div>
                        </div>
                         </div>
                            </div>
                            <div class="row justify-content-center">
				                <div class="col-md-6 text-center mb-5">

				                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>

                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th class="text-right">Price</th>
                                                <th class="text-right">Quantity</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product as $pro)
                                            <tr>
                                                <td>{{ $product->firstItem()+ $loop->index}}</td>
                                                <td>{{ $pro->name}}</td>
                                                <td>{{ $pro->category->name}}</td>
                                                <td>
                                                    <img src="{{asset('backend/product/resize/'.$pro->image)}}">
                                                </td>
                                                <td>{{$pro->price}}</td>
                                                <td>{{$pro->description}}</td>
                                                <td>{{$pro->created_at}}</td>
                                                <td>{{$pro->updated_at}}</td>
                                                <td>
                                                    <a href="{{ route('p.edit',$pro->product_id)}}"><i class='bx bxs-edit'></i></a>
                                                    <a href="{{ url('admin/product/delete/'.$pro->product_id)}}"><i class='bx bxs-trash'></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/product/edit/'.$pro->product_id) }}"><i>แก้ไข</i></a>
                                                    <a href="{{ url('admin/product/delete/'.$pro->product_id) }}"><i>ลบ</i></a>
                                                 </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
             </div>
            </div>
 @endsection

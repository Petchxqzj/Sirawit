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
                                                <th>date</th>
                                                <th>order ID</th>
                                                <th>name</th>
                                                <th class="text-right">price</th>
                                                <th class="text-right">quantity</th>
                                                <th class="text-right">total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product as $pro)
                                            <tr>
                                                <td>{{ $product->firstItem()+ $loop->index}}</td>
                                                <td>{{ $pro->name}}</td>
                                                <td>
                                                    <img src="{{asset('backend/product/resize/'.$pro->image)}}">
                                                </td>
                                                <td>{{$pro->price}}</td>
                                                <td>{{$pro->description}}</td>
                                                <td>{{$pro->created_at}}</td>
                                                <td>{{$pro->updated_at}}</td>
                                                <td>
                                                    <a href="#"><i class='bx bxs-edit'></i></a>
                                                    <a href="#"><i class='bx bxs-trash'></i></a>
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

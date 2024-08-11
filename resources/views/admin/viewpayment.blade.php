@extends('layout.template')
@section('content') 
 <!-- Start Content-->
 <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Prime</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Property</a></li>
                                            <li class="breadcrumb-item active">Payments</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Payments</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                                         
                        @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif


                                    @if(session('error'))
                                                <span class="error-message">{{ session('error') }}</span>
                                    @endif
           

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <!-- Product image -->
                                                <a href="javascript: void(0);" class="text-center d-block mb-4">
                                                <img src="{{ asset('public/attachment/Property/' . $property->property_no.'/'.$property->image1) }}" class="img-fluid" style="max-width: 280px;" alt="Product-img">
                                            
                                                </a>

                                                <div class="d-lg-flex d-none justify-content-center">
                                                    <a href="javascript: void(0);">
                                                    <img src="{{ asset('public/attachment/Property/' . $property->property_no.'/'.$property->image2) }}" class="img-fluid" style="max-width: 280px;" alt="Product-img">
                                                    </a>
                                                    <a href="javascript: void(0);" class="ms-2">
                                                    <img src="{{ asset('public/attachment/Property/' . $property->property_no.'/'.$property->image3) }}" class="img-fluid" style="max-width: 280px;" alt="Product-img">
                                                    </a>
                                                
                                                </div>
                                                
                                            </div> <!-- end col -->
                                            <div class="col-lg-7">
                                                <form action= "{{route('store.payment')}}" method = "POST" class="ps-lg-4">
                                                    @csrf
                                                    <!-- Product title -->
                                                    <h3 class="mt-0">Customer: {{$customer->name}} <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a> </h3>
                                                  
                                                    <h3 class="mt-0">Property: {{$property->property_name}} <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a> </h3>
                                                    <p class="mb-1">Type: {{$property->type}}</p>
                                                   
                                                    <!-- Product stock -->
                                                    <div class="mt-3">
                                                        <h4><span class="badge badge-success-lighten">{{$property->status}}</span></h4>
                                                    </div>

                                                    <!-- Product description -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14"> Price:</h6>
                                                        <h3>{{$property->price}}</h3>
                                                    </div>

                                                    <!-- Quantity -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">No of Days</h6>
                                                        <div class="d-flex">
                                                        <input hidden type="number" name="property_id" min="1" value="{{$property->id}}" class="form-control" placeholder="Qty" style="width: 90px;">
                                                          
                                                        <input hidden type="number" name="customer_id" min="1" value="{{$customer->id}}" class="form-control" placeholder="Qty" style="width: 90px;">
                                                          
                                                            <input type="number" name="days" min="1" value="1" class="form-control" placeholder="Qty" style="width: 90px;">
                                                            <button type="submit" class="btn btn-danger ms-2"><i class="mdi mdi-cart me-1"></i> Pay</button>
                                                        </div>
                                                        <h6 class="font-14">Enter Amount</h6>
                                                        <div class="d-flex">
                                                        <input type="number" name="amount" value="1" class="form-control" placeholder="Qty" style="width: 90px;">
</div>
                                                    </div>
                                        
                                                  

                                                
                                                </form>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->

                                                              </div>
                        <!-- end row-->
@endsection                         
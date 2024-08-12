@extends('layout.template')
@section('content')

<div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Prime Property Partners</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Property</a></li>
                                            <li class="breadcrumb-item active">Create Property</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Create Property</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                   @endif

                                                                    
                                   @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif


                                    <form action="{{ route('store_property_form') }}" method="POST" enctype="multipart/form-data">
                                        @csrf   
                                        <div class="row">
                                            <div class="col-xl-6">
                                            <div class="mb-3">
                                                    <label for="projectname" class="form-label">Property Type</label>
                                                    <select class="form-control" name="property_type_id">
                                                        @foreach($type as $data)
                                                        <option value="{{$data->id}}">{{$data->property_type_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="projectname" class="form-label">Property Name</label>
                                                    <input type="text"  class="form-control" name="property_name" placeholder="Enter Property Name">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="project-overview" class="form-label">Property Address</label>
                                                    <textarea class="form-control" id="project-overview" name="property_address" rows="5" placeholder="Enter Property Address"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="project-overview" class="form-label">Quality</label>
                                                    <input type="text"  name="quality" class="form-control" placeholder="Enter Property Quality">
                                                 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="projectname" class="form-label">Square Meter</label>
                                                    <input type="text"  name="square_meter" class="form-control" placeholder="Enter Square meter">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="projectname" class="form-label">Bedrooms</label>
                                                    <input type="text"  name="bedrooms" class="form-control" placeholder="Enter # of Bedrooms">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="projectname" class="form-label">Toilet</label>
                                                    <input type="text" name="toilet"  class="form-control" placeholder="Enter # of Toilet">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="projectname" class="form-label">Price</label>
                                                    <input type="text" name="price"  class="form-control" placeholder="Enter Price of the Property">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="projectname" class="form-label">Type</label>
                                                    <select class="form-control" name="type">
                                                        <option value="For Sale">For Sale</option>
                                                        <option value="For Rent">For Rent</option>
                                                    </select>
                                                </div>
                                             


                                                

                                            </div> <!-- end col-->

                                            <div class="col-xl-6">
                                                <div class="mb-3 mt-3 mt-xl-0">
                                                    <label for="projectname" class="mb-0">Upload Images of the Property (4 Attachment Only)</label>
                                                    <p class="text-muted font-14">Recommended thumbnail size 800x400 (px). <label style="color:red">Only (.png and jpeg allowed)</label></p>
                                                    <div class="fallback">
                                                       
                                                        <div class="mb-3">
                                                            <label for="projectname" class="form-label">Image 1</label>
                                                            <input type="file" name="image1" class="form-control" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="projectname" class="form-label">Image 2</label>
                                                            <input type="file"  name="image2"  class="form-control" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="projectname" class="form-label">Image 3</label>
                                                            <input type="file" name="image3" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="projectname" class="form-label">Image 4</label>
                                                            <input type="file" name="image4" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="projectname" class="form-label">Image 5</label>
                                                            <input type="file" name="image5" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="projectname" class="form-label">Image 6</label>
                                                            <input type="file" name="image6" class="form-control">
                                                        </div>
                                             
                                                    </div>
                                                  
                                                </div>

                                            
                                                <div class="mb-3 position-relative" id="datepicker2">
                                                  
                                                    <button type="submit" class="btn btn-info">Submit</button>
                                                </div>
                                            </div> <!-- end col-->
                                        </div>
                                    </form>  
                                        <!-- end row -->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                        
                    </div> <!-- container -->

@endsection
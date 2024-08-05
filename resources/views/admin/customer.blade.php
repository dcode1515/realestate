@extends('layout.template')
@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Prime Property Partners</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Property Type</a></li>
                                         
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Customer List</h4>
                                    @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif


                                    @if(session('error'))
                                                <span class="error-message">{{ session('error') }}</span>
                                    @endif

                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <!-- <a href="{{route('add.property')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Property</a> -->
                                            </div>
                                            <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{route('storetype')}}" method="POST">
                                                            @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h4 class="modal-title" id="standard-modalLabel">Add Property Type</h4> -->
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <label> Property Type Name</label>
                                                              <input type="text" name="property_type_name" class="form-control" required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                    </form>
                                                </div><!-- /.modal -->
                                            <!-- <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                                </div>
                                            </div> -->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table  id="propertyTable" class="table table-centered w-100 dt-responsive nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                       
                                                        <th >#</th>
                                                        <th >Property </th>
                                                        <th >Customer Name</th>
                                                        <th >Customer Address</th>
                                                        <th >Customer No</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($customer as $key=>$data)
                                                    <tr>
                                                        
                                                        <td>{{$key++}}  </td>
                                                        <td> {{$data->property_name}}  </td>
                                                        <td> {{$data->name}} </td>
                                                        <td> {{$data->email}} </td>
                                                        <td> {{$data->contact_no}} </td>
                                                        <td> {{$data->created_at}} </td>
                                                     
                                                        <td class="table-action">
                                                        <a href="/realestate/edit/property/{{ $data->id }}" class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i>
                                                        </a>
                                                        <form action="{{ route('property.delete', ['id' => $data->id]) }}" method="POST" id="delete-form-{{ $data->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="action-icon delete-property" onclick="return confirm('Are you sure you want to delete this property?');">
                                                                    <i class="mdi mdi-delete"></i>
                                                                </button>
                                                            </form>



                                                        </td>
                                                    </tr>

                                                    <div id="standard-modal1{{$data->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                       
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                              
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <label> Property Type Name</label>
                                                              <input type="text" name="id" value="{{$data->id}}" class="form-control" hidden>
                                                              <input type="text" name="property_type_name" value="{{$data->property_type_name}}" class="form-control" required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                   
                                                </div><!-- /.modal -->
                                          
                                        </div>

                                                    @endforeach
                                                    
                                                    
                                                   
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>

                        

@endsection


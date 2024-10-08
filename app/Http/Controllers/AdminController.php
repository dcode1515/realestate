<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class AdminController extends Controller
{
    //

    public function index(){
        return view('admin.index');
    }
    public function customer_list(){
        $customer = Customer::with('property')->where('status','=','Aprroved Property')->get();
        return view('admin.customer',compact('customer'));
    }
    public function get_payment_list(){
        $customer = Payment::with('property')->with('customer')->where('status','=','Aprroved Property')->orderBy('name','desc')->get();
        return view('admin.payment',compact('customer'));

    }


    public function store_payment(Request $request){
      

        $payment = new Payment();
        $payment->property_id = $request->property_id;
        $payment->customer_id = $request->customer_id;
        $payment->amount = $request->amount;
        $payment->days = $request->days;
        $payment->status = "PAID";
         // Save the payment
            if ($payment->save()) {
                // Update the customer's status to "Unavailable"
                $customer = Customer::find($request->customer_id);
                if ($customer) {
                    $customer->status = "Unavailable";
                    $customer->save();
                }

                return redirect()->back()->with('success', 'Payment saved and customer status updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to save Payment.');
            }

        
    }


    public function view_payment($id){
        $customer = Customer::find($id);
        $property = Property::where('id','=',$customer->id)->first();
       
        return view('admin.viewpayment',compact('customer','property'));
    

    }


    public function approve_property($id){
        $customer = Customer::find($id);
        $customer->status = "Aprroved Property";
        $customer->save();
        if ($customer->property) {
            $customer->property->status = "Not Available";
            $customer->property->save();
        }
        if($customer){
            return redirect()->back()->with('success', 'Customer Approved successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }

        


    }

    public function property_type_list(){
        $property_type = PropertyType::orderBy('created_at','desc')->get();
        return view('admin.propertytype',compact('property_type'));
    }
    public function store_property_type(Request $request){

        $property_type = new PropertyType;
        $property_type->property_type_name  = $request->property_type_name;
        $property_type->save();
        if($property_type){
            return redirect()->back()->with('success', 'Property type added successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }

    }

    public function update_property_type(Request $request){

        $property_type =  PropertyType::find($request->id);
        $property_type->property_type_name  = $request->property_type_name;
        $property_type->save();
        if($property_type){
            return redirect()->back()->with('success', 'Property type Updated successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }

    }

    public function customer_delete($id){
        $customer = Customer::find($id);
            
        if ($customer) {
            $customer->delete();
            return redirect()->back()->with('success', 'Customer deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'customer not found.');
        }

    }
    public function delete_property_type(Request $request,$id){
        {
            $property = PropertyType::find($id);
            
            if ($property) {
                $property->delete();
                return redirect()->back()->with('success', 'Property Type deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Property not found.');
            }
}

    }



    
    public function property(){
        $property = Property::with('property_type')->orderBy('created_at','desc')->get();
        return view('admin.property',compact('property'));
    }
    public function add_property(){
        $type = PropertyType::orderBy('created_at','desc')->get();
        return view('admin.add',compact('type'));
    }

    public function store_property(Request $request){
        $rules = [
            'property_type_id' => 'required',
            'property_name' => 'required',
            'square_meter' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'toilet' => 'required|integer',
            'type' => 'required',
            'price' => 'required|numeric',
            'image1' => 'required|image|mimes:jpeg,png',
            'image2' => 'image|mimes:jpeg,png',
            'image3' => 'image|mimes:jpeg,png',
            'image4' => 'image|mimes:jpeg,png',
            'image5' => 'image|mimes:jpeg,png',
            'image6' => 'image|mimes:jpeg,png',
        ];

        $messages = [
            'square_meter.numeric' => 'The square meter must be a number.',
            'bedrooms.integer' => 'The number of bedrooms must be an integer.',
            'toilet.integer' => 'The number of toilets must be an integer.',
            'price.numeric' => 'The price must be a number.',
            'image1.required' => 'The first image is required.',
            'image1.image' => 'The first image must be an image file.',
            'image1.mimes' => 'The first image must be a JPEG or PNG file.',
        ];

        

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $property = new Property();

        // Assign values from request
        $property->property_type_id = $request->property_type_id;
        $property->property_name = $request->property_name;
        $property->property_address = $request->property_address;
        $property->square_meter = $request->square_meter;
        $property->bedrooms = $request->bedrooms;
        $property->toilet = $request->toilet;
        $property->type = $request->type;
        $property->price = $request->price;
        $property->status = "Available";
        $property->quality = $request->quality;

        // Generate property_no
        $now = Carbon::now()->format('Y-m-d');
        $text = "PN";
        $property_no = Property::generatePropertyNo($text, $now);
        $property->property_no = $property_no;

        // Save the property
       
        // Upload images
        $images = ['image1', 'image2', 'image3', 'image4','image5','image6'];
        foreach ($images as $imageField) {
            if ($request->hasFile($imageField)) {
                $now = Carbon::now();
                $ext = $request->file($imageField)->extension();
                $rootName = str_replace(' ', '_', strtoupper($imageField));
                $track = str_replace(' ', '_', $property_no);
                $name = str_replace(' ', '_', $request->property_name);
                $imageName = $now->year . '-' . $rootName . '.' . $name . '.' . $track . '.' . $ext;
                $request->$imageField->move(public_path('attachment/Property/' . $property_no), $imageName);
                
                // Save image path to database
                $property->$imageField = $imageName;
            }
        }
        $property->save();

    
        return redirect()->back()->with('success', 'Property Saved successfully.');
  
    }
    public function update_property(Request $request){
        $rules = [
            'property_type_id' => 'required',
            'property_name' => 'required',
            'square_meter' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'toilet' => 'required|integer',
            'price' => 'required|numeric',
            'image1' => 'image|mimes:jpeg,png',
            'image2' => 'image|mimes:jpeg,png',
            'image3' => 'image|mimes:jpeg,png',
            'image4' => 'image|mimes:jpeg,png',
        ];

        $messages = [
            'square_meter.numeric' => 'The square meter must be a number.',
            'bedrooms.integer' => 'The number of bedrooms must be an integer.',
            'toilet.integer' => 'The number of toilets must be an integer.',
            'price.numeric' => 'The price must be a number.',
            'image1.image' => 'The first image must be an image file.',
            'image1.mimes' => 'The first image must be a JPEG or PNG file.',
        ];

        

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $property =  Property::find($request->id);

        // Assign values from request
        $property->property_type_id = $request->property_type_id;
        $property->property_name = $request->property_name;
        $property->property_address = $request->property_address;
        $property->square_meter = $request->square_meter;
        $property->bedrooms = $request->bedrooms;
        $property->toilet = $request->toilet;
        $property->type = $request->type;
        $property->price = $request->price;
        $property->status = "Available";
        $property->quality = $request->quality;

        // Generate property_no
        $now = Carbon::now()->format('Y-m-d');
        $text = "PN";
        $property_no = Property::generatePropertyNo($text, $now);
        $property->property_no = $property_no;

        // Save the property
       
        // Upload images
        $images = ['image1', 'image2', 'image3', 'image4'];
        foreach ($images as $imageField) {
            if ($request->hasFile($imageField)) {
                $now = Carbon::now();
                $ext = $request->file($imageField)->extension();
                $rootName = str_replace(' ', '_', strtoupper($imageField));
                $track = str_replace(' ', '_', $property->property_no);
                $name = str_replace(' ', '_', $request->property_name);
                $imageName = $now->year . '-' . $rootName . '.' . $name . '.' . $track . '.' . $ext;
                $request->$imageField->move(public_path('attachment/Property/' . $property->property_no), $imageName);
                
                // Save image path to database
                $property->$imageField = $imageName;
            }
        }
        $property->save();

    
        return redirect()->back()->with('success', 'Property updated successfully.');
  
    }

    public function edit_property($id){
        $property = Property::find($id);
        $type = PropertyType::get();
        return view('admin.edit', compact('property','type'));
    }
    public function delete_property($id, Request $request)
                    {
                        $property = Property::find($id);
                        
                        if ($property) {
                            $property->delete();
                            return redirect()->back()->with('success', 'Property deleted successfully.');
                        } else {
                            return redirect()->back()->with('error', 'Property not found.');
                        }
        }
}

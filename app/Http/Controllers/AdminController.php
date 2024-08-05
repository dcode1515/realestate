<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class AdminController extends Controller
{
    //

    public function index(){
        return view('admin.index');
    }
    public function customer_list(){
        $customer = Customer::get();
        return view('admin.customer',compact('customer'));
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
        $images = ['image1', 'image2', 'image3', 'image4'];
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

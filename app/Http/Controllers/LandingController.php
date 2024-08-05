<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Customer;

class LandingController extends Controller
{
    //

    public function index(){
        return view('landing.index');
    }

    public function for_sale(){
        $for_sale = Property::where('type','=',"For Sale")->where('status','=','Available')->orderBy('created_at','desc')->get();
        return view('landing.forsale',compact('for_sale'));
    }

    public function view_property($id){
        $view = Property::find($id);
        return view('landing.view',compact('view'));
    }
    public function store_customer(Request $request){
            // $property = Property::find($request->id);
            // if(!$property) {
            //     return redirect()->back()->with('error', 'Property not found.');
            // }
            
            // $property->status = "Sold";
            // $property->save();
    
            $customer = new Customer;
            $customer->customer_name = $request->customer_name;
            $customer->customer_address = $request->customer_address;
            $customer->customer_no = $request->customer_no;
            $customer->property_id = $request->property_id;
            $customer->status = "Active";
            $customer->save();
    
            if ($customer) {
                return redirect()->back()->with('success', 'Customer saved successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to save customer.');
            }
        }
}

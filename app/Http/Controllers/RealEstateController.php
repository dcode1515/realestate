<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Customer;


class RealEstateController extends Controller
{
    //

    public function index(){
        $realestate = Property::get();
        return view('realstate.index',compact('realestate'));
    }
    public function property_view($id){
        $realestate = Property::find($id);
        return view('realstate.property',compact('realestate'));
    }

    public function forrent(){
        $forrent = Property::where('type','=','For Rent')->get();
        return view('realstate.forrent',compact('forrent'));
    }
    public function forsale(){
        $forsale = Property::where('type','=','For Sale')->get();
        return view('realstate.forsale',compact('forsale'));
    }
    public function store_customer(Request $request){
        
        $customer = new Customer;
        $customer->name = $request->customer;
        $customer->email = $request->email;
        $customer->contact_no = $request->contact_no;
        $customer->save();
        if ($customer) {
            return redirect()->back()->with('success', 'Customer saved successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to save customer.');
        }


    }
   

    

    }



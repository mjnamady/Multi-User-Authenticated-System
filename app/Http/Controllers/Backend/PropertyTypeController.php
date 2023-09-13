<?php

namespace App\Http\Controllers\Backend;

use App\Models\Amenities;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class PropertyTypeController extends Controller
{
    public function allTypes(){
        $allTypes = PropertyType::latest()->get();
        return view('backend.type.all_types', compact('allTypes'));
    } // End method

    public function AddTypes(){
        return view('backend.type.add_type');
    } // End method

    public function StoreType(Request $request){
        // Validate
        $request ->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property Type Created Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    } // End method

    public function EditType($id){
        $type = PropertyType::findOrFail($id);
        return view('backend.type.adit_type', compact('type'));
    } // End method


    public function UpdateType(Request $request){

        PropertyType::findOrFail($request->id)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property Type with ID number '.$request->id.' is Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    } // End method

    public function DeleteType($id){
        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Type Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method


    //////////////// Amenities all types ///////////////////////

    public function AllAmenities(){

        $allAmenities = Amenities::latest()->get();
        return view('backend.amenity.all_amenities', compact('allAmenities'));

    } // End method

    public function AddAmenity(){
        return view('backend.amenity.add_amenity');
    } // End method

    public function StoreAmenity(Request $request){

        Amenities::insert([
            'amenity_name' => $request->amenity_name,
        ]);

        $notification = array(
            'message' => 'Amenity Type Created Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    } // End method

    public function EditAmenity($id){
       $amenity = Amenities::findOrFail($id);
       return view('backend.amenity.edit_amenity', compact('amenity'));
    } // End method

    public function UpdateAmenity(Request $request){
        Amenities::findOrFail($request->id)->update([
            'amenity_name' => $request->amenity_name
        ]);

        $notification = array(
            'message' => 'Amenity is Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    } // End method

    public function DeleteAmenity($id){
        Amenities::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Amenity is Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method

}

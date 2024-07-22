<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use App\Models\Amenities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function AllType() {
        $types = PropertyType::latest()->get();
        return view('backend.type.all-type', compact('types'));
    }
    public function AddType() {
        return view('backend.type.add-type');
    }

    public function StoreType(Request $request) {
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);
        return redirect()->route('all.type')->with('success', 'Property Type Create Successfully!');
    }
    public function EditType($id) {
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit-type', compact('types'));
    }

    public function UpdateType(Request $request) {

        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);
        return redirect()->route('all.type')->with('success', 'Property Type Update Successfully!');
    }

    public function DeleteType($id) {
        PropertyType::findOrFail($id)->delete();
        return redirect()->route('all.type');
    }

    // -------- ALL AMENITIES ------- //
    public function AllAmenitie() {
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all-amenities', compact('amenities'));
    }

    public function AddAmenitie() {
        return view('backend.amenities.add-amenities');
    }

    public function StoreAmenitie(Request $request) {
        Amenities::insert([
            'amenities_name' => $request->amenities_name
        ]);
        return redirect()->route('all.amenitie')->with('success', 'Amenities Create Successfully!');
    }

    public function EditAmenitie($id) {
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit-amenities', compact('amenities'));
    }

    public function UpdateAmenitie(Request $request) {

        $ame_id = $request->id;

        Amenities::findOrFail($ame_id)->update([
            'amenities_name' => $request->amenities_name
        ]);
        return redirect()->route('all.amenitie')->with('success', 'Amenities Update Successfully!');
    }

    public function DeleteAmenitie($id) {
        Amenities::findOrFail($id)->delete();
        return redirect()->route('all.amenitie');
    }
}

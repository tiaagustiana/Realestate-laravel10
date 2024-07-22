<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\PackagePlan;
use App\Models\PropertyMessage;
use App\Models\PropertyType;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PropertyController extends Controller
{
    public function AllProperty()
    {
        $property = Property::latest()->get();
        return view('backend.property.all-property', compact('property'));
    }

    public function AddProperty()
    {
        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status', 'active')->where('role', 'agent')->latest()->get();

        return view('backend.property.add-property', compact('propertyType', 'amenities', 'activeAgent'));
    }

    public function StoreProperty(Request $request)
    {
        $amen = $request->amenities_id;
        $amenities = implode(",", $amen);

        $pcode = IdGenerator::generate(['table' => 'properties', 'field' => 'property_code', 'length' => 5, 'prefix' => 'PC']);

        $image = $request->file('property_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 250)->save('upload/property/thumbnail/' . $name_gen);
        $save_url = 'upload/property/thumbnail/' . $name_gen;

        $property_id = Property::insertGetId([
            'ptype_id'          => $request->ptype_id,
            'amenities_id'      => $amenities,
            'property_name'     => $request->property_name,
            'property_slug'     => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_code'     => $pcode,
            'property_status'   => $request->property_status,

            'lowest_price'  => $request->lowest_price,
            'max_price'     => $request->max_price,
            'short_descp'   => $request->short_descp,
            'long_descp'    => $request->long_descp,
            'bedrooms'      => $request->bedrooms,
            'bathrooms'     => $request->bathrooms,
            'garage'        => $request->garage,
            'garage_size'   => $request->garage_size,

            'property_size'     => $request->property_size,
            'property_video'    => $request->property_video,
            'address'           => $request->address,
            'city'              => $request->city,
            'state'             => $request->state,
            'postal_code'       => $request->postal_code,

            'neighborhood'          => $request->neighborhood,
            'latitude'              => $request->latitude,
            'longitude'             => $request->longitude,
            'featured'              => $request->featured,
            'hot'                   => $request->hot,
            'agent_id'              => $request->agent_id,
            'status'                => 1,
            'property_thumbnail'    => $save_url,
            'created_at'            => Carbon::now(),
        ]);

        // Multiple ImagE Upload From Here
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(770, 520)->save('upload/property/multi-image/' . $make_name);
            $uploadPath = 'upload/property/multi-image/' . $make_name;

            MultiImage::insert([
                'property_id'   => $property_id,
                'photo_name'    => $uploadPath,
                'created_at'   => Carbon::now(),
            ]);
        }
        // End Multiple ImagE Upload From Here

        // Facilities Add from here
        $facilities = Count($request->facility_name);

        if ($facilities != NULL) {
            for ($i = 0; $i < $facilities; $i++) {
                $fcount = new Facility();
                $fcount->property_id = $property_id;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->distance = $request->distance[$i];
                $fcount->save();
            }
        }
        // End Facilities

        return redirect()->route('all.property')->with('success', 'Property Insert Successfully');
    }

    public function EditProperty($id)
    {
        $facilities = Facility::where('property_id', $id)->get();
        $property = Property::findOrFail($id);

        $type = $property->amenities_id;
        $property_ami = explode(',', $type);

        $multiImage = MultiImage::where('property_id', $id)->get();

        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status', 'active')->where('role', 'agent')->latest()->get();

        return view('backend.property.edit-property', compact('property', 'propertyType', 'amenities', 'activeAgent', 'property_ami', 'multiImage', 'facilities'));
    }

    public function UpdateProperty(Request $request)
    {
        // memastikan amenities_id adalah array
        $amen = is_array($request->amenities_id) ? $request->amenities_id : explode(',', $request->amenities_id);
        $amenities = implode(",", $amen);

        $property_id = $request->id;

        Property::findOrFail($property_id)->update([
            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenities,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_status' => $request->property_status,

            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,

            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,

            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'agent_id' => $request->agent_id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('all.property')->with('success', 'Property Updated Successfully');
    }

    public function UpdatePropertyThumbnail(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;

        if ($request->hasFile('property_thumbnail')) {
            $image = $request->file('property_thumbnail');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 250)->save('upload/property/thumbnail/' . $name_gen);
            $save_url = 'upload/property/thumbnail/' . $name_gen;

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            Property::findOrFail($pro_id)->update([
                'property_thumbnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('success', 'Property Image Thumbnail Updated Successfully');
        } else {
            return redirect()->back()->with('nothing', 'No image file selected!');
        }
    }

    public function UpdatePropertyMultiimage(Request $request)
    {

        $imgs = $request->multi_img;

        //pengecekan img ada apa tidak saat di klik save
        if(!is_null($imgs) && is_array($imgs)) {
            foreach ($imgs as $id => $img) {
                $imgDel = MultiImage::findOrFail($id);
                unlink($imgDel->photo_name);

                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(770, 520)->save('upload/property/multi-image/' . $make_name);
                $uploadPath = 'upload/property/multi-image/' . $make_name;

                MultiImage::where('id', $id)->update([

                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),

                ]);
            } // End Foreach

            return redirect()->back()->with('success','Property Multi Image Updated Successfully');
        } else {
            return redirect()->back()->with('nothing','No images selected for update!');
        }
    }

    public function PropertyMultiImageDelete($id)
    {
        $oldImg = MultiImage::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImage::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Property Multi Image Deleted Successfully');
    }

    public function StoreNewMultiimage(Request $request)
    {
        $new_multi = $request->imageid;
        $image = $request->file('multi_img');

        if ($image) {
            $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 520)->save('upload/property/multi-image/' . $make_name);
            $uploadPath = 'upload/property/multi-image/' . $make_name;

            MultiImage::insert([
                'property_id' => $new_multi,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('success', 'Property Multi Image Added Successfully');
        } else {
            return redirect()->back()->with('nothing', 'No image selected');
        }

    }

    public function UpdatePropertyFacilities(Request $request)
    {
        $pid = $request->id;

        if ($request->facility_name == NULL) {
            return redirect()->back();
        } else {
            Facility::where('property_id', $pid)->delete();

            $facilities = Count($request->facility_name);

            for ($i = 0; $i < $facilities; $i++) {
                $fcount = new Facility();
                $fcount->property_id = $pid;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->distance = $request->distance[$i];
                $fcount->save();
            } // end for
        }

        return redirect()->back()->with('success', 'Property Facility Updated Successfully');
    }

    public function DeleteProperty($id)
    {
        $property = Property::findOrFail($id);
        unlink($property->property_thumbnail);

        Property::findOrFail($id)->delete();

        $image = MultiImage::where('property_id', $id)->get();

        foreach ($image as $img) {
            unlink($img->photo_name);
            MultiImage::where('property_id', $id)->delete();
        }

        $facilitiesData = Facility::where('property_id', $id)->get();
        foreach ($facilitiesData as $item) {
            $item->facility_name;
            Facility::where('property_id', $id)->delete();
        }

        return redirect()->back()->with('success', 'Property Deleted Successfully');
    }

    public function DetailsProperty($id) {
        $facilities = Facility::where('property_id', $id)->get();
        $property = Property::findOrFail($id);

        $type = $property->amenities_id;
        $property_ami = explode(',', $type);

        $multiImage = MultiImage::where('property_id', $id)->get();

        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status', 'active')->where('role', 'agent')->latest()->get();

        return view('backend.property.details-property', compact('property', 'propertyType', 'amenities', 'activeAgent', 'property_ami', 'multiImage', 'facilities'));
    }

    public function InActiveProperty(Request $request) {
        $pid = $request->id;
        Property::findOrFail($pid)->update([
            'status' => 0,
        ]);

        return redirect()->route('all.property')->with('success', 'Property InActive Successfully');
    }
    public function ActiveProperty(Request $request) {
        $pid = $request->id;
        Property::findOrFail($pid)->update([
            'status' => 1,
        ]);

        return redirect()->route('all.property')->with('success', 'Property Active Successfully');
    }

    public function AdminPackageHistory() {
        $packagehistory = PackagePlan::latest()->get();

        return view('backend.package.package-history', compact('packagehistory'));
    }

    public function PackageInvoice($id) {
        $packagehistory = PackagePlan::where('id', $id)->first();

        $pdf = Pdf::loadView('backend.package.package-history-invoice', compact('packagehistory'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);

        return $pdf->download('invoice.pdf');
    }

    public function AdminPropertyMessage() {
        $usermsg = PropertyMessage::latest()->get();

        return view('backend.message.all-message', compact('usermsg'));
    }
}

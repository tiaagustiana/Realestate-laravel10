<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\PackagePlan;
use App\Models\Property;
use App\Models\PropertyMessage;
use App\Models\PropertyType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public function PropertyDetails($id,$slug) {
        $property = Property::findOrFail($id);
        $multiImage = MultiImage::where('property_id', $id)->get();
        $amenities = $property->amenities_id;
        $facility = Facility::where('property_id',$id)->get();
        $type_id = $property->ptype_id;
        $relatedProperty = Property::where('ptype_id',$type_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(3)->get();
        $property_amen = explode(',', $amenities);

        return view('frontend.property.property-details', compact('property', 'multiImage', 'amenities', 'property_amen', 'facility', 'relatedProperty'));
    }

    public function PropertyMessage(Request $request) {
        // validasi input
        $request->validate([
            'message' => 'required|string',
        ]);

        $aid = $request->agent_id;
        $pid = $request->property_id;

        // cek apakah user telah login dan memasukkan data ke database
        if (Auth::check()) {
            PropertyMessage::insert([
                'user_id'       => Auth::user()->id,
                'agent_id'      => $aid,
                'property_id'   => $pid,
                'msg_name'      => $request->msg_name,
                'msg_email'     => $request->msg_email,
                'msg_phone'     => $request->msg_phone,
                'message'       => $request->message,
                'created_at'    => Carbon::now(),
            ]);

            return redirect()->back()->with('success', 'Send Message Successfully');
        }else{
            return redirect()->back()->with('error', 'Please Login Your Account First');
        }
    }

    public function AgentDetails($id) {
        $agent = User::findOrFail($id);
        $property = Property::where('agent_id', $id)->get();
        $featured = Property::where('featured', '1')->limit('3')->get();
        $rentproperty = Property::where('property_status', 'rent')->get();
        $buyproperty = Property::where('property_status', 'buy')->get();

        return view('frontend.agent.agent-details', compact('agent', 'property', 'featured', 'rentproperty', 'buyproperty'));
    }

    public function AgentDetailsMessage(Request $request) {
        //ini validasi dengan mengubah teks
        // $messages = ['Messages must be filled in first!'];

        // $this->validate($request, [
        //     'message' => 'required|string',
        // ], $messages);

        // validasi input
        $request->validate([
            'message' => 'required|string',
        ]);

        $aid = $request->agent_id;

        if (Auth::check()) {
            PropertyMessage::insert([
                'user_id'       => Auth::user()->id,
                'agent_id'      => $aid,
                'msg_name'      => $request->msg_name,
                'msg_email'     => $request->msg_email,
                'msg_phone'     => $request->msg_phone,
                'message'       => $request->message,
                'created_at'    => Carbon::now(),
            ]);

            return redirect()->back()->with('success', 'Send Message Successfully');
        }else{
            return redirect()->back()->with('error', 'Please Login Your Account First');
        }
    }

    public function RentProperty() {
        $property = Property::where('status', '1')->where('property_status', 'rent')->paginate(3);

        return view('frontend.property.rent-property', compact('property'));
    }

    public function BuyProperty() {
        $property = Property::where('status', '1')->where('property_status', 'buy')->get();

        return view('frontend.property.buy-property', compact('property'));
    }

    public function PropertyType($id) {
        $property = Property::where('status', '1')->where('ptype_id', $id)->get();
        $pbread = PropertyType::where('id', $id)->first();

        return view('frontend.property.property-type', compact('property', 'pbread'));
    }
}

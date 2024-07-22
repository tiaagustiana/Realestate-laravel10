<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\PackagePlan;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function AddToWishList(Request $request, $property_id) {
        if (Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('property_id',$property_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added  On Your Wishlist']);
            } else {
                return response()->json(['error' => 'This Property Has Already on Your Wishlist']);
            }

        } else {
            return response()->json(['error' => 'At First Login Your Account']);
        }

    }

    public function UserWishlist() {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('frontend.dashboard.wishlist', compact('userData'));
    }

    public function GetWishlistProperty() {
        $wishlist = Wishlist::with('property')->where('user_id', Auth::id())->latest()->get();
        $wishQty = wishlist::count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' =>$wishQty]);
    }

    public function WishlistRemove($id) {
        // Menghapus wishlist berdasarkan ID user dan ID wishlist
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();

        // Mengembalikan respons JSON
        return response()->json(['success' => 'Successfully Property Removed']);
    }
}

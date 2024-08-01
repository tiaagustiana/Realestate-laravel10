<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\State;
use Intervention\Image\Facades\Image;

class StateController extends Controller
{
    public function AllState() {
        $state = State::latest()->get();

        return view('backend.state.all-state', compact('state'));
    }

    public function AddState() {
        return view('backend.state.add-state');
    }

    public function StoreState(Request $request) {
        $image = $request->file('state_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370,275)->save('upload/state/'.$name_gen);
        $save_url = 'upload/state/'.$name_gen;

        State::insert([
            'state_name'    => $request->state_name,
            'state_image'   => $save_url,
        ]);

        return redirect()->route('all.state')->with('success', 'State Inserted Successfully');
    }

    public function EditState($id) {
        $state = State::findOrFail($id);
        return view('backend.state.edit-state', compact('state'));
    }

    public function UpdateState(Request $request) {
        $state_id = $request->id;

        if ($request->file('state_image')) {
            $image = $request->file('state_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370,275)->save('upload/state/'.$name_gen);
            $save_url = 'upload/state/'.$name_gen;

            State::findOrFail($state_id)->update([
                'state_name'    => $request->state_name,
                'state_image'   => $save_url,
            ]);

            return redirect()->route('all.state')->with('success', 'State Updated with Image Successfully');
        } else {
            State::findOrFail($state_id)->update([
                'state_name' => $request->state_name,
            ]);

            return redirect()->route('all.state')->with('success', 'State Updated without Image Successfully');
        }

    }

    public function DeleteState($id) {
        $state = State::findOrFail($id);
        $img = $state->state_image;
        unlink($img);

        State::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'State Deleted Successfully');
    }
}

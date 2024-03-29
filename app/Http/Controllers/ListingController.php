<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
 
Storage::disk('local')->put('example.txt', 'Contents');

class ListingController extends Controller
{
    // show all listing
    public function index() {

        // dd(Listing::latest()->simplepaginate(6));
        // dd(request()->tag);
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplepaginate(6)
        ]);
    }

    // show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    // show create form
    public function create() {
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);


        if($request->file('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            Storage::disk('local')->put('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);


        return redirect('/')->with('message', 'Listing Created Successfully!');
    }


    // show edit form

    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

        // store listing data
    public function update(Request $request, Listing $listing) {

        // make sure logged in user is owner

        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorizes Action');
        };
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);


        if($request->file('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);


        return back()->with('message', 'Listing Updated Successfully!');
    }
    

    // Delete listing
    public function destroy(Listing $listing) {
         // make sure logged in user is owner

         if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorizes Action');
        };
        
        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // manage listing
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}

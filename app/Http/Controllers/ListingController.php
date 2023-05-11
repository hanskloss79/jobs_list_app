<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;



class ListingController extends Controller
{
    // show all listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // show one single listing 
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form
    public function create() {
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request) {
        $formFields = $request->validate([
            'company' => ['required', Rule::unique('listings', 'company')],
            'title' => 'required',
            'location' => 'required',
            'email' => ['required','email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        $formFields['user_id'] = auth()->id();

        // uploading file and inserting the path and the file name to DB
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        
        // this creates record in listings table
        Listing::create($formFields); 
        // flash message
        //Session::flash('message','Tworzenie ogłoszenia zakończyło się sukcesem!!!');

        return redirect('/')->with('message','Tworzenie ogłoszenia zakończyło się sukcesem!!!');
    }

    // show edit form
    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    // update listing data
    public function update(Request $request, Listing $listing) {

        // make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Nieuprawnione działanie');
        }

        $formFields = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => ['required','email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]); 
        // uploading file and inserting the path and the file name to DB
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        // updating record in listings table
        $listing->update($formFields); 
        // flash message
        //Session::flash('message','Tworzenie ogłoszenia zakończyło się sukcesem!!!');

        return back()->with('message','Uaktualnienie ogłoszenia zakończyło się sukcesem!!!');
    }

    // remove listing from database
    public function destroy(Listing $listing) {
        
        // make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Nieuprawnione działanie');
        }
        
        $listing->delete();
        return redirect('/')->with('message','Usuwanie ogłoszenia zakończyło się sukcesem!!!');
    }

    // manage listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

}

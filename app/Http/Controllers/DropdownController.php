<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $countries = \DB::table('countries')
            ->get();
        
        return view('dropdown', compact('countries'));
    }

    /**
     * return states list.
     *
     * @return json
     */
    public function getStates(Request $request)
    {
        $states = \DB::table('cities')
            ->where('countryid', $request->country_id)
            ->get();
        
        if (count($states) > 0) {
            return response()->json($states);
        }
    }

    /**
     * return cities list
     *
     * @return json
     */
    public function getCities(Request $request)
    {
       
        $cities = \DB::table('cities')
            ->where('country_id', $request->country_id)
            ->get();
        
        if (count($cities) > 0) {
            return response()->json($cities);
        }
    }
}
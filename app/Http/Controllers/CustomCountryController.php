<?php

namespace App\Http\Controllers;

use App\Models\CustomCountry;
use Illuminate\Http\Request;

class CustomCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customCountries =  CustomCountry::all();
        return $customCountries;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $customCountry = new CustomCountry($request->all());
        $customCountry->save();
        return $customCountry;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomCountry  $customCountry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customCountry =  CustomCountry::find($id);
        return $customCountry;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomCountry  $customCountry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customCountry =  CustomCountry::find($id);
        if ($customCountry) {
            $customCountry->fill($request->all());
            $customCountry->save();
        }
        return $customCountry;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomCountry  $customCountry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customCountry =  CustomCountry::find($id);
        $customCountry->delete();
        if ($customCountry) {
            return $customCountry;
        }
    }
}

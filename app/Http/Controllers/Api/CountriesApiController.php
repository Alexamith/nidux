<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CountriesController;
use Illuminate\Http\Request;

class CountriesApiController extends Controller
{
    public $countriesController;

    public function __construct() {

        $this->countriesController   = new CountriesController;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = $this->countriesController->getAllCountries();
        $countriesArray = $countries->json();
        return response()->json(['countries'=>$countriesArray], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $countries = $this->countriesController->getCountry($request);
        $countriesArray = $countries->json();
        return response()->json(['countries'=>$countriesArray], 200);
    }

    
}

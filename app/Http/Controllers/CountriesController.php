<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCountries()
    {
        $countries = Http::get('https://restcountries.com/v2/all');
        return $countries;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCountry(Request $request)
    {
        
        $countryName = $request->name;
        if ($countryName) {
            $countryName = strtolower($countryName);
            $country = Http::get('https://restcountries.com/v2/name/'.$countryName);
            return $country;
        }
    }
}

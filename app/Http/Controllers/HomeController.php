<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    public $countriesController;
    public $customCountryController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->countriesController = new CountriesController;
        $this->customCountryController = new CustomCountryController;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = $this->countriesController->getAllCountries();
        $countriesArray = $countries->json();
        return view('home', compact('countriesArray'));
    }

    public function getCountry(Request $request)
    {
        
        $countriesArray = $this->getCountryByName($request);
        return view('home', compact('countriesArray'));
    }
    public function createCountryDescription(Request $request)
    {
        $country = $this->getCountryByName($request);
        return view('countries.register', compact('country'));
    }
    public function getCountryByName(Request $request)
    {
        $country = $this->countriesController->getCountry($request);
        $countriesArray = $country->json();
        return $countriesArray;
    }



    public function registerCustomCountry(Request $request)
    {
        $customCountryController = $this->customCountryController->store($request);
        if ($customCountryController) {
            $message = "Se registró con éxito";
            $customCountry = $this->customCountryController->index();
            return view('countries.index', compact('message','customCountry'));

        }
    }
    public function getAllCustomCountries()
    {
        $customCountry = $this->customCountryController->index();
        return view('countries.index', compact('customCountry'));
    }
    public function getCustomCountriesId($id)
    {
        $customCountry = $this->customCountryController->edit($id);
        return view('countries.edit', compact('customCountry'));
    }

    public function editCustomCountry(Request $request, $id)
    {
        $customCountry = $this->customCountryController->update($request,$id);
        if ($customCountry) {
            # code...
            $customCountry = $this->customCountryController->index();
            $message = "Se editó con éxito";
            return view('countries.index', compact('customCountry', 'message'));
        }
    }
    public function deleteCustomCountry($id)
    {
        $customCountry = $this->customCountryController->destroy($id);
        if ($customCountry) {
            # code...
            $customCountry = $this->customCountryController->index();
            $message = "Se eliminó con éxito";
            return view('countries.index', compact('customCountry', 'message'));
        }
    }
}
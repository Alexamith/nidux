<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomCountryController;
use Illuminate\Http\Request;

class CustomApiCountryController extends Controller
{
    public $customCountryController;

    public function __construct() {
        $this->customCountryController = new CustomCountryController;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customCountries = $this->customCountryController->index();
        return response()->json(['customCountries'=>$customCountries], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customCountry = $this->customCountryController->store($request);
        return response()->json(['customCountry'=>$customCountry], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customCountry = $this->customCountryController->edit($id);
        return response()->json(['customCountry'=>$customCountry], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customCountry = $this->customCountryController->update($request, $id);
        if ($customCountry) {
            # code...
            return response()->json(['message'=>"Se editó con éxito"], 201);
        }
        return response()->json(['error'=>"No se pudo editar"], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customCountry = $this->customCountryController->destroy($id);
        if ($customCountry) {
            # code...
            return response()->json(['message'=>"Se eliminó con éxito"], 201);
        }
        return response()->json(['error'=>"No se pudo eliminar"], 500);
    }
}

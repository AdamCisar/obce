<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('pages.home', compact('cities'));
    }

    public function show(City $city)
    {
        return view('pages.city_detail', compact('city'));
    }
}
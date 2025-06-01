<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    public function index(): View
    {
        $cities = City::all();
        return view('pages.home', compact('cities'));
    }

    public function show(City $city): View
    {
        return view('pages.city_detail', compact('city'));
    }

    public function autocomplete(Request $request): JsonResponse
    {
        $q = $request->input('q');
        if (!$q) {
            return response()->json([]);
        }

       $cities = City::where('name', 'like', '%' . $q . '%')
        ->get(['id', 'name'])
        ->each(function ($city) {
            $city->url = route('cities.show', ['city' => $city->id]);
        });

        return response()->json($cities);
    }
}
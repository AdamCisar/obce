<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\CitySearchService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct(private readonly CitySearchService $search) {}
    
    public function index(): View
    {
        return view('pages.home');
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

        return response()->json($this->search->search($q));
    }
}
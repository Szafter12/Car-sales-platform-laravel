<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('published_at', '<=', now())
            ->with(['primaryImage', 'city', 'maker', 'model', 'carType', 'fuelType', 'favouredUsers'])
            ->orderBy('published_at', 'desc')
            ->limit(30)
            ->get();

        return view('home.index', ['cars' => $cars]);
    }
}

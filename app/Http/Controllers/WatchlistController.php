<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function index()
    {
        $cars = Auth::user()
            ->favouriteCars()
            ->with('primaryImage', 'city', 'maker', 'model', 'carType', 'fuelType')
            ->paginate(15);

        return view('car.watchlist', ['cars' => $cars]);
    }
}

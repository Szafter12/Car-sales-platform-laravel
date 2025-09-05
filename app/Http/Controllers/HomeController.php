<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Cache::remember('home-cars', Carbon::now()->addMinute(), function () {
            return Car::where('published_at', '<=', now())
                ->with(['primaryImage', 'city', 'maker', 'model', 'carType', 'fuelType', 'favouredUsers'])
                ->orderBy('published_at', 'desc')
                ->limit(30)
                ->get();
        });

        return view('home.index', ['cars' => $cars]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index()
    {
        $cars = Auth::user()
            ->favouriteCars()
            ->with(['primaryImage', 'city', 'maker', 'model', 'carType', 'fuelType'])
            ->paginate(15);

        return view('watchlist.index', ['cars' => $cars]);
    }

    public function storeDestroy(Car $car) {
        $user = Auth::user();

        $isCarExistsInFav = $user->favouriteCars()->where('car_id', $car->id)->exists();

        if ($isCarExistsInFav) {
            $user->favouriteCars()->detach($car);

            return back()->with('success', 'Car was removed from watchlist');
        }

        $user->favouriteCars()->attach($car);

        return back()->with('success', 'Car was added to watchlist');
    }
}

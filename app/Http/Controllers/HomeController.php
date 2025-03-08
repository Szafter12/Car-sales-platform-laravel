<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\FuelType;
use App\Models\Maker;

class HomeController extends Controller
{
    public function index()
    {
        $car = Car::find(1);

        dd($car->features);

        return view('home.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {

        $car = new Car();
        $car->maker_id = 1;
        $car->model_id = 1;
        $car->year = 2024;
        $car->price = 20000;
        $car->vin = '999';
        $car->mileage = 5000;
        $car->car_type_id = 1;
        $car->fuel_type_id = 1;
        $car->user_id = 1;
        $car->city_id = 1;
        $car->address = 'Something';
        $car->phone = '999';
        $car->description = null;
        $car->published_at = now();
        $car->save();

        return view('home.index');
    }
}

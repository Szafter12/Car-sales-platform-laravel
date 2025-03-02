<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\FuelType;
use App\Models\Maker;

class HomeController extends Controller
{
    public function index()
    {

        return view('home.index');
    }
}

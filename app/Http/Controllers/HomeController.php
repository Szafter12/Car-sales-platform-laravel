<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\Maker;
use App\Models\Model;

class HomeController extends Controller
{
    public function index()
    {
        $maker = Maker::factory()->create();

        Model::factory()
            ->count(5)
            // ->forMaker(['name' => 'lexus'])
            ->for($maker)
            ->create();


        return view('home.index');
    }
}

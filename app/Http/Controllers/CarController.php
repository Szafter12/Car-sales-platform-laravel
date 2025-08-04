<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = $request->user()
            ->cars()
            ->with('primaryImage', 'maker', 'model')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('car.index', ['cars' => $cars]);
    }
    public function create()
    {
        Gate::authorize('create', Car::class);

        return view('car.create');
    }
    public function store(StoreCarRequest $request)
    {

        Gate::authorize('create', Car::class);

        $data = $request->validated();

        $featuresData = $data['features'] ?? [];
        $images = $request->file('images') ?: [];

        $data['user_id'] = $request->user()->id;
        $car = Car::create($data);

        $car->features()->create($featuresData);

        foreach ($images as $i => $image) {
            $path = $image->store('images', 'public');
            $car->images()->create(['image_path' => $path, 'position' => $i + 1]);
        }

        return redirect()->route('car.index')->with('success', 'Car was created');
    }
    public function show(Car $car)
    {
        if (!$car->published_at) {
            abort(404);
        }

        return view('car.show', ['car' => $car]);
    }
    public function edit(Car $car)
    {
        Gate::authorize('update', $car);

        return view('car.edit', ['car' => $car]);
    }
    public function update(StoreCarRequest $request, Car $car)
    {
        Gate::authorize('update', $car);

        $data = $request->validated();

        $features = array_merge([
            'abs' => 0,
            'air_conditioning' => 0,
            'power_windows' => 0,
            'power_door_locks' => 0,
            'cruise_control' => 0,
            'bluetooth_connectivity' => 0,
            'remote_start' => 0,
            'gps_navigation' => 0,
            'heated_seats' => 0,
            'climate_control' => 0,
            'rear_parking_sensors' => 0,
            'leather_seats' => 0,
        ], $data['features'] ?? []);

        $car->update($data);
        $car->features()->update($features);

        return redirect()->route('car.index')->with('success', 'Car was updated');
    }
    public function destroy(Car $car)
    {
        Gate::authorize('delete', $car);

        $car->delete();

        return redirect()->route('car.index')->with('success', 'Car was deleted');
    }

    public function search(Request $request)
    {
        $maker = $request->integer('maker_id');
        $model = $request->integer('model_id');
        $state = $request->integer('state_id');
        $city = $request->integer('city_id');
        $carType = $request->integer('car_type_id');
        $yearFrom = $request->integer('year_from');
        $yearTo = $request->integer('year_to');
        $priceFrom = $request->integer('price_from');
        $priceTo = $request->integer('price_to');
        $fuelType = $request->integer('fuel_type_id');
        $mileage = $request->integer('mileage');
        $sort = $request->input('sort', '-published_at');

        $query = Car::with(['primaryImage', 'city', 'maker', 'model', 'carType', 'fuelType', 'favouredUsers'])->where('published_at', '<', now());

        if ($maker) {
            $query->where('maker_id', $maker);
        }
        if ($model) {
            $query->where('model_id', $model);
        }
        if ($state) {
            $query->join('cities', 'cars.city_id', '=', 'cities.id')->where('state_id', $state);
        }
        if ($city) {
            $query->where('city_id', $city);
        }
        if ($carType) {
            $query->where('car_type_id', $carType);
        }
        if ($yearFrom) {
            $query->where('year', '>=', $yearFrom);
        }
        if ($yearTo) {
            $query->where('year', '<=', $yearTo);
        }
        if ($priceFrom) {
            $query->where('price', '>=', $priceFrom);
        }
        if ($priceTo) {
            $query->where('price', '<=', $priceTo);
        }
        if ($fuelType) {
            $query->where('fuel_type_id', $fuelType);
        }
        if ($mileage) {
            $query->where('mileage', '<=', $mileage);
        }
        if (str_starts_with($sort, '-')) {
            $sort = substr($sort, 1);
            $query->orderBy($sort, 'desc');
        } else {
            $query->orderBy($sort);
        }

        $cars = $query->paginate(15)->withQueryString();

        return view('car.search', ['cars' => $cars]);
    }
    public function carImages(Car $car)
    {
        Gate::authorize('update', $car);

        return view('car.images', ['car' => $car]);
    }

    public function updateImages(Request $request, Car $car)
    {

        Gate::authorize('update', $car);

        $data = $request->validate([
            'delete_images' => 'array',
            'delete_images.*' => 'integer',
            'positions' => 'array',
            'positions.*' => 'integer'
        ]);

        $deleteImages = $data['delete_images'] ?? [];
        $positions = $data['positions'] ?? [];

        $imagesToDelete = $car->images()->whereIn('id', $deleteImages)->get();

        foreach ($imagesToDelete as $img) {
            if (Storage::exists($img->image_path)) {
                Storage::delete($img->image_path);
            }
        }

        $car->images()->whereIn('id', $deleteImages)->delete();

        foreach ($positions as $id => $pos) {
            $car->images()->where('id', $id)->update(['position' => $pos]);
        }

        return redirect()->back()->with('success', 'Car images were updated');
    }

    public function addImages(Request $request, Car $car)
    {

        Gate::authorize('update', $car);

        $images = $request->file('images') ?? [];

        $position = $car->images()->max('position') ?? 1;

        foreach ($images as $img) {
            $path = $img->store('images', 'public');
            $car->images()->create([
                'image_path' => $path,
                'position' => $position
            ]);

            $position++;
        }

        return redirect()->back()->with('success', 'New images were added');
    }
}

<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $states = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego', 'San Jose', 'Sacramento'],
            'Texas' => ['Houston', 'San Antonio', 'Dallas', 'Austin', 'Fort Worth'],
            'Florida' => ['Miami', 'Orlando', 'Tampa', 'Jacksonville', 'St. Petersburg'],
            'New York' => ['New York City', 'Buffalo', 'Rochester', 'Yonkers', 'Syracuse'],
            'Illinois' => ['Chicago', 'Aurora', 'Naperville', 'Joliet', 'Rockford'],
            'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown', 'Erie', 'Reading'],
            'Ohio' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo', 'Akron'],
            'Georgia' => ['Atlanta', 'Augusta', 'Columbus', 'Savannah', 'Athens'],
            'North Carolina' => ['Charlotte', 'Raleigh', 'Greensboro', 'Durham', 'Winston-Salem'],
            'Michigan' => ['Detroit', 'Grand Rapids', 'Warren', 'Sterling Heights', 'Ann Arbor'],
        ];

        $makers = [
            'Toyota' => ['Camry', 'Corolla', 'Highlander', 'RAV4', 'Prius', '4Runner', 'Sienna', 'Yaris', 'Tundra', 'Sequoia'],
            'Ford' => ['F-150', 'Escape', 'Explorer', 'Mustang', 'Fusion', 'Ranger', 'Edge', 'Expedition', 'Taurus', 'Flex'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Odyssey', 'HR-V', 'Ridgeline', 'Fit', 'Insight', 'Passport'],
            'Chevrolet' => ['Silverado', 'Equinox', 'Malibu', 'Impala', 'Cruze', 'Colorado', 'Camaro', 'Traverse', 'Tahoe', 'Suburban'],
            'Nissan' => ['Altima', 'Sentra', 'Rogue', 'Maxima', 'Murano', 'Pathfinder', 'Frontier', 'Titan', 'Versa', '370Z'],
            'Lexus' => ['RX400', 'RX450', 'RX350', 'ES350', 'LS500', 'IS300', 'GX460', 'GS350', 'NX300', 'LX570', 'UX200', 'RC350']
        ];

        CarType::factory()
            ->sequence(
                ['name' => 'Sedan'],
                ['name' => 'Hatchback'],
                ['name' => 'SUV'],
                ['name' => 'Pickup Truck'],
                ['name' => 'Minivan'],
                ['name' => 'Jeep'],
                ['name' => 'Coupe'],
                ['name' => 'Crossover'],
                ['name' => 'Sports Car'],
            )
            ->count(9)
            ->create();

        FuelType::factory()
            ->count(4)
            ->sequence(
                ['name' => 'Gasoline'],
                ['name' => 'Diesel'],
                ['name' => 'Electric'],
                ['name' => 'Hybrid']
            )
            ->create();

        foreach ($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(...array_map(fn($city) => ['name' => $city], $cities))
                )
                ->create();
        }

        foreach ($makers as $maker => $models) {
            Maker::factory()
                ->state(['name' => $maker])
                ->has(
                    Model::factory()
                        ->count(count($models))
                        ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                )
                ->create();
        }

        User::factory()
            ->count(3)
            ->create();

        // Create 2 more users and 50 new cars, each added to their favouriteCars. Each Car will have 5 images
        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(
                        CarImage::factory()
                            ->count(5)
                            ->sequence(fn(Sequence $sequence) => ['position' => ($sequence->index) % 5 + 1]),
                        'images'
                    )
                    ->hasFeatures(),
                'favouriteCars'
            )
            ->create();
    }
}

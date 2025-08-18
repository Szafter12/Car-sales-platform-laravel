<?php

namespace App\View\Components;

use App\Models\FuelType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class RadioListFuelType extends Component
{
    public Collection $fuels;

    public function __construct()
    {
        $this->fuels = Cache::rememberForever('fuel-type', function () {
            return FuelType::orderBy('name')->get();
        }); 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-list-fuel-type');
    }
}

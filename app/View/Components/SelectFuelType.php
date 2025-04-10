<?php

namespace App\View\Components;

use App\Models\FuelType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class SelectFuelType extends Component
{
    public Collection $fuels;

    public function __construct()
    {
        $this->fuels = FuelType::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-fuel-type');
    }
}

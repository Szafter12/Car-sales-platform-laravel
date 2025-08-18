<?php

namespace App\View\Components;

use App\Models\CarType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class RadioListCarType extends Component
{
    public Collection $carTypes;

    public function __construct()
    {
        $this->carTypes = Cache::rememberForever('car-type-radio', function () {
            return CarType::orderBy('name')->get();
        }); 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-list-car-type');
    }
}

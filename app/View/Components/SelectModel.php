<?php

namespace App\View\Components;

use App\Models\Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class SelectModel extends Component
{

    public Collection $models;

    public function __construct()
    {
        $this->models = Cache::rememberForever('model', function () {
            return Model::orderBy('name')->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-model');
    }
}

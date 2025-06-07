<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{
    public string $icon;
    public string $label;
    public string $value;
    public string $color;

    /**
     * Create a new component instance.
     */
    public function __construct(string $icon, string $label, string $value, string $color)
    {
        $this->icon = $icon;
        $this->label = $label;
        $this->value = $value;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.stat-card');
    }
}

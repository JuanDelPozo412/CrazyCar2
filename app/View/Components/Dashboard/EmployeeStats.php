<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;
use Illuminate\View\View;

class EmployeeStats extends Component
{
    public $stats;

    public function __construct($stats)
    {
        $this->stats = $stats;
    }

    public function render(): View
    {
        return view('components.dashboard.employee-stats');
    }
}

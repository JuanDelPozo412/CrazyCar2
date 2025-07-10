<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class AdminStats extends Component
{
    public $stats;

    public function __construct(array $stats)
    {
        $this->stats = $stats;
    }

    public function render()
    {
        return view('components.dashboard.admin-stats');
    }
}

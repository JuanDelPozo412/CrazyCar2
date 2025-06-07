<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VehicleTable extends Component
{
    public $title;
    public $searchPlaceholder;
    public $tableId;
    public $columns;
    public $vehicles;
    public $maintenance;

    public function __construct(
        $title,
        $searchPlaceholder,
        $tableId,
        $columns,
        $vehicles,
        $maintenance = false
    ) {
        $this->title = $title;
        $this->searchPlaceholder = $searchPlaceholder;
        $this->tableId = $tableId;
        $this->columns = $columns;
        $this->vehicles = $vehicles;
        $this->maintenance = $maintenance;
    }

    public function render(): View|Closure|string
    {
        return view('components.dashboard.vehicle-table');
    }
}

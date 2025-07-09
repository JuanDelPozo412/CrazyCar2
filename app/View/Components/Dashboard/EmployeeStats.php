<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmployeeStats extends Component
{
    public int $misConsultasEnProcesoCount;
    public int $misConsultasFinalizadasTotalCount;
    public array $misFinalizadasMensuales;
    public array $misEnProcesoMensuales;

    public function __construct(
        int $misConsultasEnProcesoCount,
        int $misConsultasFinalizadasTotalCount,
        array $misFinalizadasMensuales,
        array $misEnProcesoMensuales
    ) {
        $this->misConsultasEnProcesoCount = $misConsultasEnProcesoCount;
        $this->misConsultasFinalizadasTotalCount = $misConsultasFinalizadasTotalCount;
        $this->misFinalizadasMensuales = $misFinalizadasMensuales;
        $this->misEnProcesoMensuales = $misEnProcesoMensuales;
    }

    public function render(): View|Closure|string
    {
        return view('components.dashboard.employee-stats');
    }
}

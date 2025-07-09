<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminStats extends Component
{
    public $clientesCount;
    public $consultasCount;
    public $inquiriesEnProcesoCount;
    public $empleadosCount;
    public $mantenimientosCount;
    public $vehiclesForSaleCount;
    public $reservasAprobadasCount;
    public $reservasRechazadasCount;
    public $reservasPendientesCount;
    public $consultasFinalizadasCount;
    public $finalizadasMensuales;
    public $enProcesoMensuales;



    public function __construct(
        $clientesCount,
        $consultasCount,
        $inquiriesEnProcesoCount,
        $empleadosCount,
        $mantenimientosCount,
        $vehiclesForSaleCount,
        $reservasAprobadasCount,
        $reservasRechazadasCount,
        $reservasPendientesCount,
        $consultasFinalizadasCount,
        $finalizadasMensuales,
        $enProcesoMensuales
    ) {
        $this->clientesCount = $clientesCount;
        $this->consultasCount = $consultasCount;
        $this->inquiriesEnProcesoCount = $inquiriesEnProcesoCount;
        $this->empleadosCount = $empleadosCount;
        $this->mantenimientosCount = $mantenimientosCount;
        $this->vehiclesForSaleCount = $vehiclesForSaleCount;
        $this->reservasAprobadasCount = $reservasAprobadasCount;
        $this->reservasRechazadasCount = $reservasRechazadasCount;
        $this->reservasPendientesCount = $reservasPendientesCount;
        $this->consultasFinalizadasCount = $consultasFinalizadasCount;
        $this->finalizadasMensuales = $finalizadasMensuales;
        $this->enProcesoMensuales = $enProcesoMensuales;
    }

    public function render(): View|Closure|string
    {
        return view('components.dashboard.admin-stats');
    }
}

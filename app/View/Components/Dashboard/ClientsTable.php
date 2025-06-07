<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientsTable extends Component
{
    public $clients;

    public function __construct($clients)
    {
        $this->clients = $clients;
    }

    public function render()
    {
        return view('components.dashboard.client-table');
    }
}

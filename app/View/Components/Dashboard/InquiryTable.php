<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InquiryTable extends Component
{
    public $inquiries;

    public function __construct($inquiries)
    {
        $this->inquiries = $inquiries;
    }

    public function render(): View|Closure|string
    {
        return view('components.dashboard.inquiry-table');
    }
}

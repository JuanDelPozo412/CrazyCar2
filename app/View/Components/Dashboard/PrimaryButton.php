<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class PrimaryButton extends Component
{
    public $text;
    public $color;
    public $icon;

    public function __construct($text, $color = null, $icon = null)
    {
        $this->text = $text;
        $this->color = $color;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.dashboard.primary-button');
    }
}

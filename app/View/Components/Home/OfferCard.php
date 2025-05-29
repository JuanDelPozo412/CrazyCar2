<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OfferCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $image;
    public $alt;
    public $title;
    public $description;
    public $priceOld;
    public $priceNew;
    public $link;

    public function __construct($image, $alt, $title, $description, $priceOld, $priceNew, $link = '#')
    {
        $this->image       = $image;
        $this->alt         = $alt;
        $this->title       = $title;
        $this->description = $description;
        $this->priceOld    = $priceOld;
        $this->priceNew    = $priceNew;
        $this->link        = $link;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.offer-card');
    }
}

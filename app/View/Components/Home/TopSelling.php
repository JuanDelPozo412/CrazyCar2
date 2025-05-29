<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopSelling extends Component
{
    public string $title;
    public string $subtitle;
    public string $description;
    public string $image;
    public string $alt;
    public string $link;
    public string $imagePosition;

    public function __construct(
        string $title,
        string $subtitle,
        string $description,
        string $image,
        string $alt,
        string $link = '#',
        string $imagePosition = 'right'
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->image = $image;
        $this->alt = $alt;
        $this->link = $link;
        $this->imagePosition = $imagePosition;
    }

    public function render(): View|Closure|string
    {
        return view('components.home.top-selling');
    }
}

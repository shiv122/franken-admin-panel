<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DefaultLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = "Laravel",
        public string $meta = "",
        public string $style = "",
        public string $script = "",
        public bool $sidebar = true,
        public array $bodyAttr = []
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.default-layout');
    }
}

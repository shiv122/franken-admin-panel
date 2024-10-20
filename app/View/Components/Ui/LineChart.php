<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LineChart extends Component
{
    /**
     * Create a new component instance.
     */


    public function __construct(public $chartId = 'chart', public $chartData = [], public $chartOptions = [], public $makeGlobal = false) {}
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.line-chart');
    }
}

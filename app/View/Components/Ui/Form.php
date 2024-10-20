<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $route,
        public string $method = 'POST',
        public string $class = '',
        public bool $notification = true,
        public string $asyncType = 'notification', // 'notification', 'block', or 'none'
        public bool $reset = true,
        public ?string $onReject = null,
        public ?string $onResolve = null,
        public ?array $submitButton = null,

    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.form');
    }
}

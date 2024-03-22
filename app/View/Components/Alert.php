<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public const SESSION_KEY = 'ALERT_COMPONENT_MESSAGE';
    /**
     * Create a new component instance.
     */
    public string $alertMessage = '';

    public function __construct()
    {
        if (session()->exists(self::SESSION_KEY)) {
            $this->alertMessage = session(self::SESSION_KEY);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->alertMessage) {
            return view('components.alert');
        }
        return '';
    }
}

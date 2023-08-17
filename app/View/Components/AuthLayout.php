<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title = '')
    {
        /// Init layout file
        app(config('settings.THEME_BOOTSTRAP.auth'))->init();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(config('settings.THEME_LAYOUT_DIR') . '._auth');
    }
}

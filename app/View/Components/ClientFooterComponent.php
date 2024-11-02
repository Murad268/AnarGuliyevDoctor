<?php

namespace App\View\Components;

use App\Models\Service;
use App\Repositories\MenuRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientFooterComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $servicesFooter = Service::orderBy('order')->where('status', 1)->paginate(5);
        return view('components.client-footer-component', compact('servicesFooter'));
    }
}

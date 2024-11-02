<?php

namespace App\View\Components;


use App\Repositories\LangRepository;
use App\Repositories\MenuRepository;


use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientHeaderComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public MenuRepository $menuRepository)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menus = $this->menuRepository->all();
        return view('components.client-header-component', compact('menus'));
    }
}

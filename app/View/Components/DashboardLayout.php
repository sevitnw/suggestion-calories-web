<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardLayout extends Component
{
    public $userCalories;
    
    public function __construct($userCalories) {
        $this->userCalories = $userCalories;
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('custom.dashboard');
    }
}

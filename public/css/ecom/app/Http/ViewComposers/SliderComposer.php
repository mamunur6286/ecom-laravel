<?php

namespace App\Http\ViewComposers;


use App\Slider;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SliderComposer
{
    public $categories = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->categories = Category::orderBy('id','desc')->get();

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
            $view->with('sliders',Slider::orderBy('id','desc')->get());

    }
}
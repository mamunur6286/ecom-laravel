<?php

namespace App\Http\ViewComposers;

use App\Category;
use App\User;
use Cart;
use Illuminate\View\View;

class CategoryComposer
{
    public $categories = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Category::orderBy('id','desc')->get();

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
            $view->with('categories',$this->categories);

    }
}
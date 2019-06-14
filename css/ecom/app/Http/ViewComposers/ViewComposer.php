<?php

namespace App\Http\ViewComposers;

use App\Category;
use App\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ViewComposer
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
        if(Auth::check()){
            $view->with('cart',Cart::count())->with('profile',User::findOrFail(Auth::user()->id));
        }else{
            $view->with('cart',Cart::count());

        }
    }
}
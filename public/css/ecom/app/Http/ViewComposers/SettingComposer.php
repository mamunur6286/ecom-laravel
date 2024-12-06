<?php

namespace App\Http\ViewComposers;

use App\Category;
use App\Setting;
use App\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SettingComposer
{
    public $setting = [];
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

            $view->with('setting',Setting::first());

    }
}
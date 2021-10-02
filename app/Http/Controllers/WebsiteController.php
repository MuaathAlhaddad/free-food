<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function website()
    {
        return view('website');
    }
}

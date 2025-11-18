<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function chooseCategory()
    {
        return Inertia::render('products/ChooseCategory');
    }
}
